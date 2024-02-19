<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\TrickService;
use App\Service\CommentService;
use App\Service\MediaService;
use App\Service\FileUploader;
use App\Model\TrickModel;
use App\Model\CommentModel;
use App\Repository\TrickRepository;
use App\Repository\CommentRepository;
use App\Repository\MediaRepository;
use App\Mapper\TrickMapper;
use App\Mapper\CommentMapper;
use App\Form\TrickFormType;
use App\Form\CommentFormType;
use App\Entity\Trick;
use App\Entity\Media;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private MediaService $mediaService,
        private TrickMapper $trickMapper,
        private TrickRepository $trickRepository,
        private TrickFormType $trickFormType,
        private CommentService $commentService,
        private CommentFormType $commentFormType,
        private CommentMapper $commentMapper,
        private CommentRepository $commentRepository,
        private MediaRepository $mediaRepository,
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

        $options = [];
        $form = $this->createForm(TrickFormType::class, $trick, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->trickService->saveTrick(
                $trick,
                $this->getUser(),
                $form->get('title')->getData(),
                $form->get('content')->getData(),
                //$form->get('image')->getData(),
            );

            $mediaFiles = $form->get('media')->getData();//UploadedFile
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

        return $this->render('home/editTrick.html.twig', [
            'formTrick' => $form->createView(),
            'edit_mode' => $trick->getId() ? true : false,
            'trick' => $trick,
        ]);
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
        $form = $this->createForm(CommentFormType::class, $commentModel, $options);
        $form->handleRequest($request);

        //save comment
        if ($form->isSubmitted() && $form->isValid()) {
            //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');//is loged
            $this->commentService->saveComment($form, $trick, $this->getUser());
            $this->addFlash(
                'thanks_comment',
                'Merci pour votre commentaire. Il sera publié après validation.'
            );
            //return $this->redirect($this->generateUrl('show_trick', ['slug' => $trick->getSlug()]));
        }

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
                'formComment' => $form->createView(),
                'root_img' => $root_img,
            ]
        );
    }

    #[Route('/tricks', name: 'app_tricks')]
    public function index(): Response
    {
        $tricks = $this->trickService->getAllPublic();
        return $this->render('home/tricks.html.twig', [
            'controller_name' => 'HomeController',
            'tricks' => $tricks,
        ]);
    }

}
