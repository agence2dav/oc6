<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Model\TrickTagsModel;
use App\Mapper\TrickTagsMapper;
use App\Service\TrickService;
use App\Service\TrickTagsService;
use App\Entity\Trick;
use App\Entity\Tag;
use App\Entity\TrickTags;

class TrickTagsController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        //private TagService $tagService,
        private TrickTagsService $trickTagsService,
        private TrickTagsModel $trickTagsModel,
        //private TagMapper $tagMapper,
        private TrickTagsMapper $trickTagsMapper,
    ) {

    }

    //display tricks by tag
    #[Route('/tag/{id}', name: 'show_tag')]
    public function show(Tag $tag = null, int $id): Response
    {
        $tricks = $this->trickTagsService->getTricksByTag($id);
        dd($tricks);

        return $this->render('home/home.html.twig', [
            'tricks' => $tricks,
        ]);
    }

    //edit
    #[Route('/tag/{id}/edit', name: 'edit_tag')]
    public function form(Tag $tag = null, int $id, Request $request): Response
    {
        $tricks = $this->trickTagsService->getTricksByTag($id);
        dump($tricks);

        return $this->render('home/home.html.twig', [
            'tricks' => $tricks,
        ]);
    }
}
