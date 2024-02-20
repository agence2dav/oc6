<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Model\TrickDesignationsModel;
use App\Mapper\DesignationMapper;
use App\Mapper\TrickDesignationsMapper;
use App\Service\TrickService;
use App\Service\DesignationService;
use App\Service\TrickDesignationsService;
use App\Entity\Trick;
use App\Entity\Designation;
use App\Entity\TrickDesignations;

class TrickDesignationsController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        //private DesignationService $designationService,
        private TrickDesignationsService $trickDesignationsService,
        private TrickDesignationsModel $trickDesignationsModel,
        private DesignationMapper $designationMapper,
        private TrickDesignationsMapper $trickDesignationsMapper,
    ) {

    }

    //display tricks by designation
    #[Route('/designation/{id}', name: 'show_designation')]
    public function show(Designation $designation = null, int $id): Response
    {
        $tricks = $this->trickDesignationsService->getTricksByDesignation($id);
        dump($tricks);

        return $this->render('home/home.html.twig', [
            'tricks' => $tricks,
        ]);
    }

    //edit
    #[Route('/designation/{id}/edit', name: 'show_designation')]
    public function form(Designation $designation = null, int $id, Request $request): Response
    {
        $tricks = $this->trickDesignationsService->getTricksByDesignation($id);
        dump($tricks);

        return $this->render('home/home.html.twig', [
            'tricks' => $tricks,
        ]);
    }
}
