<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TrickService;
use App\Service\TrickTagsService;
use App\Service\CommentService;
use App\Service\MediaService;
use App\Service\FileUploader;
use App\Service\CatService;
use App\Model\CommentModel;
use App\Repository\TrickRepository;
use App\Repository\CommentRepository;
use App\Repository\MediaRepository;
use App\Repository\CatRepository;
use App\Mapper\TrickMapper;
use App\Mapper\CommentMapper;
use App\Form\TrickFormType;
use App\Form\TrickTagsFormType;
use App\Form\CommentFormType;
use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Cat;
use App\Entity\Tag;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickMapper $trickMapper,
        private TrickService $trickService,
        private TrickRepository $trickRepository,
        private TrickFormType $trickFormType,
        private MediaService $mediaService,
        private MediaRepository $mediaRepository,
        private TrickTagsService $trickTagsService,
        private TrickTagsFormType $trickTagsFormType,
        private CatService $catService,
        private CatRepository $catRepository,
        private CommentMapper $commentMapper,
        private CommentService $commentService,
        private CommentFormType $commentFormType,
        private CommentRepository $commentRepository,
        private SluggerInterface $slugger,
        //private AsciiSlugger $asciiSlugger,
        //private UploadedFile $uploadedFile,
    ) {

    }

    //edit
    #[Route('/trick/new', name: 'new_trick')]
    #[Route('/trick/{id}/edit', name: 'edit_trick')]
    public function form(Trick $trick = null, Request $request, FileUploader $fileUploader): Response
    {
        $createNew = 0;
        if (!$trick) {
            $trick = new Trick();
            $createNew = 1;
        }

        $formTrick = $this->createForm(TrickFormType::class, $trick);
        //$formTrick->get('image')->setData('http://placehold.it/600x200');
        $formTrick->handleRequest($request);

        if ($formTrick->isSubmitted() && $formTrick->isValid()) {
            $this->trickService->saveTrick(
                $trick,
                $this->getUser(),
                $formTrick->get('title')->getData(),
                $formTrick->get('content')->getData(),
                //$formTrick->get('image')->getData(),
            );

            $mediaFiles = $formTrick->get('media')->getData();//UploadedFile
            if ($mediaFiles) {
                foreach ($mediaFiles as $mediaFile) {
                    $mediaFileName = $fileUploader->upload($mediaFile);
                    $this->mediaService->saveMedia(
                        $trick,
                        $mediaFileName,
                    );
                }
            }
            if ($createNew) {
                return $this->redirectToRoute('show_trick', ['slug' => $trick->getSlug()]);
            } else {
                $this->addFlash(
                    'ok_edit',
                    'Les modifications ont "été prises en compte.'
                );
            }
        }

        $formTags = $this->createForm(TrickTagsFormType::class);
        $catsModel = $this->catService->getAll();
        $formTags->handleRequest($request);
        if ($formTags->isSubmitted() && $formTags->isValid()) {
            $this->trickTagsService->saveTrickTag(
                $trick,
                $formTags->get('tagId')->getData(),
            );
            return $this->redirectToRoute('edit_trick', ['id' => $trick->getId()]);
        }

        return $this->render('home/editTrick.html.twig', [
            'formTrick' => $formTrick->createView(),
            'formTags' => $formTags->createView(),
            'edit_mode' => $trick->getId() ? true : false,
            'trick' => $trick,
            'cats' => $catsModel,
        ]);
    }

    //delete tag
    #[Route('/trick/{id}/deltag/{tagId}', name: 'del_tag')]
    public function delTag(Trick $trick = null, int $tagId): Response
    {
        $this->trickService->deleteTag($trick, $tagId);
        return $this->redirectToRoute('edit_trick', ['id' => $trick->getId()]);
    }

    //update image
    #[Route('/trick/{id}/edit/{mediaId}', name: 'edit_trick_img')]
    public function setFirstImage(Trick $trick = null, int $mediaId): Response
    {
        $this->trickService->setAsFirstImage($trick, $mediaId);
        return $this->redirectToRoute('show_trick', ['slug' => $trick->getSlug()]);
    }

    //show
    #[Route('/trick/{slug}', name: 'show_trick')]
    public function show(Trick $trick, string $slug, Request $request): Response //EntityManagerInterface $manager
    {
        //$userConnected = $this->getUser();
        $trickModel = $this->trickService->getBySlug($slug);
        $commentModel = new CommentModel();
        $id = $trick->getId();

        $options = [
            //'require_content' => 'Ce champ est obligatoire',
        ];
        $formComment = $this->createForm(CommentFormType::class, $commentModel, $options);
        $formComment->handleRequest($request);

        //save comment
        //$userConnected=$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');//is loged
        $userConnected = $this->getUser();
        if ($formComment->isSubmitted() && $formComment->isValid() && $userConnected) {
            $this->commentService->saveComment($formComment, $trick, $this->getUser());
            $this->addFlash(
                'thanks_comment',
                'Merci pour votre commentaire. Il sera publié après validation.'
            );
            //return $this->redirect($this->generateUrl('show_trick', ['slug' => $trick->getSlug()]));
        }

        //dd($trickModel);
        $root_img = $this->getParameter('trick_medias');
        $trickModel->setContent($this->trickService->formatContent($trickModel->getContent()));

        if ($trick->getStatus() == 1) {
            $template = 'home/trick.html.twig';
        } else {
            $template = 'home/trick-unpublished.html.twig';
        }
        return $this->render(
            $template,
            [
                'trick' => $trickModel,
                'formComment' => $formComment->createView(),
                'root_img' => $root_img,
            ]
        );
    }

    #[Route('/tricks', name: 'app_tricks')]
    public function index(): Response
    {
        $tricks = $this->trickService->getAllPublic();
        //dd($tricks);
        return $this->render('home/tricks.html.twig', [
            'pageTitle' => 'All of Tricks',
            'tricks' => $tricks,
        ]);
    }

}
