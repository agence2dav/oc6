<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use App\Model\TrickTagsModel;
use App\Mapper\TrickTagsMapper;
use App\Service\TrickService;
use App\Service\TrickTagsService;
use App\Entity\Tag;

class TrickTagsController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private TrickTagsService $trickTagsService,
        private TrickTagsModel $trickTagsModel,
        private TrickTagsMapper $trickTagsMapper,
    ) {

    }

    //display tricks by tag
    #[Route('/tag/{id}', name: 'show_tag')]
    public function show(Tag $tag = null, int $id): Response
    {
        $trickTagsModel = $this->trickTagsService->getTricksByTag($id);
        $tricks = new ArrayCollection;
        if ($trickTagsModel) {
            foreach ($trickTagsModel as $trickTagsModel) {
                $trickId = $trickTagsModel->getTrick()->getId();
                $tricks->add($this->trickService->getById($trickId));
            }
        }
        $currentTag = $trickTagsModel->getTag()->getName();

        return $this->render('home/tagTricks.html.twig', [
            'pageTitle' => 'Tricks avec le tag ' . $currentTag,
            'minRoleToEdit' => 'ROLE_USER',
            'tricks' => $tricks,
            'tag' => $currentTag,
        ]);
    }

    //edit
    #[Route('/tag/{id}/edit', name: 'edit_tag')]
    public function form(Tag $tag = null, int $id, Request $request): Response
    {
        $tricks = $this->trickTagsService->getTricksByTag($id);

        return $this->render('home/tagTrickEdit.html.twig', [
            'tricks' => $tricks,
        ]);
    }
}
