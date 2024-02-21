<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Service\TrickService;

class HomeController extends AbstractController
{

    public function __construct(
        private TrickService $trickService
    ) {

    }

    #[Route('', name: 'app_empty')]
    #[Route('/', name: 'app_empty')]
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $tricks = $this->trickService->getAllPublic();
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'tricks' => $tricks,
        ]);
    }

}
