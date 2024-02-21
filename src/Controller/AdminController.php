<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use App\Service\TrickService;
use App\Service\CommentService;

class AdminController extends AbstractController
{
    public function __construct(
        private Security $security,
        private TrickService $trickService,
        private CommentService $commentService,
    ) {
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/tricks/', name: 'admin_tricks')]
    #[Route('/admin/tricks/{id}', name: 'admin_tricksId')]
    public function showTricks(int $id = null): Response //, Request $request, EntityManagerInterface $manager
    {
        //$userConnected = $this->getUser();
        if ($id && $this->security->isGranted('ROLE_ADMIN')) {
            $this->trickService->updateStatus($id);
        }
        $tricksModel = $this->trickService->getAllTricks();

        return $this->render(
            'admin/tricks.html.twig',
            [
                'tricks' => $tricksModel,
            ]
        );
    }

    #[Route('/admin/comments', name: 'admin_comments')]
    #[Route('/admin/comments/{id}', name: 'admin_commentsId')]
    public function showComments(int $id = null): Response //, Request $request, EntityManagerInterface $manager
    {
        //$userConnected = $this->getUser();
        if ($id && $this->security->isGranted('ROLE_ADMIN')) {
            $this->commentService->updateStatus($id);
            return $this->redirectToRoute('admin_comments');
        }
        $commentsModel = $this->commentService->getAllComments();

        return $this->render(
            'admin/comments.html.twig',
            [
                'comments' => $commentsModel,
            ]
        );
    }
}
