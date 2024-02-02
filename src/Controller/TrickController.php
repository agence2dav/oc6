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
use App\Form\TrickFormType;
use App\Entity\Comment;
use App\Service\CommentService;
use App\Form\CommentFormType;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private TrickRepository $trickRepository,
        private TrickFormType $trickFormType,
        private CommentService $commentService,
        private CommentFormType $commentFormType,
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
            return $this->redirectToRoute('show_trick', ['id' => $trick->getId()]);
        }

        return $this->render('home/create.html.twig', [
            'formTrick' => $form->createView(),
            'edit_mode' => $trick->getId() ? true : false,
        ]);
    }


    #[Route('/trick/{id}', name: 'show_trick')]
    #[Route('/trick/{id}/{commentId}', name: 'show_trick2')]
    public function show(Trick $trick, int $id, int $commentId = null, Request $request, EntityManagerInterface $manager): Response
    {

        //$userConnected = $this->getUser();
        $trick = $this->trickService->getById($id);
        $comments = $this->commentService->getByTrick($id);

        $comment = new Comment();
        $options = [
            //'require_content' => 'Ce champ est obligatoire',
        ];
        $form = $this->createForm(CommentFormType::class, $comment, $options);
        $form->handleRequest($request);
        //dump($comment);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commentFormType->saveForm($comment, $manager, $id);
            //return $this->redirectToRoute('show_trick', ['id' => $id, 'commentId' => $comment->getId()]);
            return $this->redirect($this->generateUrl('show_trick2', ['id' => $id, 'commentId' => $comment->getId()]));
        }
        //echo $commentId;

        return $this->render(
            'home/trick.html.twig',
            [
                'trick' => $trick,
                'comments' => $comments,
                'formComment' => $form->createView(),
                'justCommented' => $commentId ? true : false,
            ]
        );
    }

}
