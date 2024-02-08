<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Trick;
use App\Service\TrickService;
use App\Repository\TrickRepository;
use App\Mapper\TrickMapper;
use App\Form\TrickFormType;
use App\Entity\Comment;
use App\Service\CommentService;
use App\Repository\CommentRepository;
use App\Mapper\CommentMapper;
use App\Form\CommentFormType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private TrickRepository $trickRepository,
        private TrickFormType $trickFormType,
        private CommentService $commentService,
        private CommentFormType $commentFormType,
        private CommentMapper $commentMapper,
        private CommentRepository $commentRepository,
        private TrickMapper $trickMapper,
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

        $options = [
            //'require_title' => 'Le titre est requit',
        ];
        $form = $this->createForm(TrickFormType::class, $trick, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$trick = $form->getData();
            $this->trickFormType->saveForm($trick, $manager);
            return $this->redirectToRoute('show_trick', ['slug' => $trick->getSlug()]);
        }

        return $this->render('home/editTrick.html.twig', [
            'formTrick' => $form->createView(),
            'edit_mode' => $trick->getId() ? true : false,
        ]);
    }

    //#[Route('/trick/{id}', name: 'show_trick')]
    #[Route('/trick/{slug}', name: 'show_trick')]
    #[Route('/trick/{slug}/{commentId}', name: 'show_trick2')]
    public function show(Trick $trick, string $slug, int $commentId = null, Request $request, EntityManagerInterface $manager): Response
    {
        //$userConnected = $this->getUser();
        //$trickModel = $this->trickService->getById($id);
        $trickModel = $this->trickService->getBySlug($slug);
        $id = $trick->getId();
        //$slugger = new AsciiSlugger();
        //$slug = $this->slugger->slug($trick->getTitle());

        $comment = new Comment();
        $options = [
            //'require_content' => 'Ce champ est obligatoire',
        ];
        $form = $this->createForm(CommentFormType::class, $comment, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commentFormType->saveForm($comment, $manager, $id);
            //return $this->redirectToRoute('show_trick', ['id' => $id, 'commentId' => $comment->getId()]);
            return $this->redirect($this->generateUrl('show_trick2', ['slug' => $trick->getSlug(), 'commentId' => $comment->getId()]));
        }

        return $this->render(
            'home/trick.html.twig',
            [
                'trick' => $trickModel,
                'formComment' => $form->createView(),
                'justCommented' => $commentId ? true : false,
            ]
        );
    }

}
