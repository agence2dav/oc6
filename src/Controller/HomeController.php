<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Service\TrickService;

//use App\Entity\Trick;

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
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tricks' => $tricks,
        ]);
    }

}
