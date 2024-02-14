<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Trick;
use App\Service\TrickService;
use App\Service\CommentService;
use App\Model\TrickModel;
use App\Model\CommentModel;
use App\Repository\TrickRepository;
use App\Repository\CommentRepository;
use App\Mapper\TrickMapper;
use App\Mapper\CommentMapper;
use App\Form\TrickFormType;
use App\Form\CommentFormType;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private TrickMapper $trickMapper,
        private TrickRepository $trickRepository,
        private TrickFormType $trickFormType,
        private CommentService $commentService,
        private CommentFormType $commentFormType,
        private CommentMapper $commentMapper,
        private CommentRepository $commentRepository,
        private SluggerInterface $slugger,
        //private AsciiSlugger $asciiSlugger,
    ) {

    }

    #[Route('/trick/new', name: 'new_trick')]
    #[Route('/trick/{id}/edit', name: 'edit_trick')]
    public function form(Trick $trick = null, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$trick) {
            $trick = new Trick();
        }

        $options = [];
        $form = $this->createForm(TrickFormType::class, $trick, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->trickService->saveTrick(
                $trick,
                $this->getUser(),
                $form->get("title")->getData(),
                $form->get("content")->getData(),
                $form->get("image")->getData(),
            );
            return $this->redirectToRoute('show_trick', ['slug' => $trick->getSlug()]);
        }

        return $this->render('home/editTrick.html.twig', [
            'formTrick' => $form->createView(),
            'edit_mode' => $trick->getId() ? true : false,
        ]);
    }

    #[Route('/trick/{slug}', name: 'show_trick')]
    #[Route('/trick/{slug}/{commented}', name: 'show_trick2')]
    public function show(Trick $trick, string $slug, int $commented = null, Request $request, EntityManagerInterface $manager): Response
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
            //return $this->redirectToRoute('show_trick', ['id' => $id, 'commentId' => $comment->getId()]);
            return $this->redirect($this->generateUrl('show_trick2', ['slug' => $trick->getSlug(), 'commented' => 1]));
        }

        return $this->render(
            'home/trick.html.twig',
            [
                'trick' => $trickModel,
                'formComment' => $form->createView(),
                'justCommented' => $commented ? true : false,
            ]
        );
    }

}
