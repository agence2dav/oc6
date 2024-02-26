<?php

namespace App\Controller;

use App\Form\AvatarFormType;
use App\Service\UserService;
use App\Service\TrickService;
use App\Service\CommentService;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    private string $minRoleToEdit = 'ROLE_USER';
    //private string $minRoleToEdit = 'ROLE_ADMIN';

    public function __construct(
        private Security $security,
        private UserService $userService,
        private TrickService $trickService,
        private CommentService $commentService,
    ) {
    }

    #[Route('/admin/tricks/', name: 'admin_tricks')]
    #[Route('/admin/tricks/{id}', name: 'admin_tricksId')]
    public function showTricks(int $id = null): Response //, Request $request, EntityManagerInterface $manager
    {
        if ($id && $this->security->isGranted('ROLE_ADMIN')) {
            $this->trickService->updateStatus($id);
        }
        $tricksModel = $this->trickService->getAllTricks();

        return $this->render(
            'admin/tricks.html.twig',
            [
                'tricks' => $tricksModel,
                'currentUser' => $this->getUser(),
                'minRoleToEdit' => $this->minRoleToEdit,
            ]
        );
    }

    #[Route('/admin/comments', name: 'admin_comments')]
    #[Route('/admin/comments/{id}', name: 'admin_commentsId')]
    public function showComments(int $id = null): Response //, Request $request, EntityManagerInterface $manager
    {
        $userConnected = $this->getUser();
        if ($id && $this->security->isGranted('ROLE_ADMIN')) {
            $this->commentService->updateStatus($id);
            return $this->redirectToRoute('admin_comments');
        }
        $commentsModel = $this->commentService->getAllComments();

        return $this->render(
            'admin/comments.html.twig',
            [
                'comments' => $commentsModel,
                'currentUser' => $this->getUser(),
                'minRoleToEdit' => $this->minRoleToEdit,
            ]
        );
    }

    //avatar
    #[Route('/avatar/{avatar}', name: 'admin_avatar_select')]
    public function avatar(int $avatar): Response
    {
        $this->userService->saveAvatar(
            $this->getUser(),
            $avatar,
        );
        return $this->redirectToRoute('app_user');
    }

    #[Route('/avatar', name: 'admin_avatar')]
    public function userAvatar(Request $request): Response
    {
        $formUser = $this->createForm(AvatarFormType::class);
        $avatars = $this->userService->getAvatars();
        $formUser->handleRequest($request);

        //update
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            $this->userService->saveAvatar(
                $this->getUser(),
                $formUser->get('avatar')->getData(),
            );
        }
        return $this->render('admin/avatar.html.twig', [
            'formUser' => $formUser->createView(),
            'avatars' => $avatars,
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'minRoleToEdit' => $this->minRoleToEdit,
        ]);
    }
}
