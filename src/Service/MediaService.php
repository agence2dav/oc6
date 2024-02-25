<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Repository\MediaTypeRepository;
use App\Repository\MediaRepository;
use App\Repository\TrickRepository;
use App\Service\TrickService;
use App\Service\FileUploader;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Comment;
use App\Entity\CommentService;
use App\Entity\CommentRepository;
use App\Entity\Trick;
use App\Entity\Media;
use App\Entity\MediaType;

class MediaService extends AbstractController
{

    public function __construct(
        //private readonly EntityManagerInterface $manager,
        //private readonly SluggerInterface $slugger,
        //private readonly TrickService $trickService,
        private readonly TrickRepository $trickRepository,
        //private readonly TrickMapper $trickMapper,
        private readonly MediaRepository $mediaRepository,
        private readonly MediaTypeRepository $mediaTypeRepository,
    ) {

    }

    public function saveMedia(
        Trick $trick,
        string $mediaFileName,
        string $mediaType = 'image'
    ): void {
        $media = new Media();
        $media->setFilename($mediaFileName);
        $mediaTypeEntity = $this->getMediaType($mediaType);
        $media->setType($mediaTypeEntity);
        $media->setTrick($trick);
        $this->mediaRepository->saveMedia($media);
        //if first image
        //$catalog = $this->getCatalog($trick);
        //if (count($catalog) == 1) {
        //$this->trickService->setAsFirstImage($trick, $media->getId());
        //}
    }

    public function getMediaType(string $mediaType): MediaType|null
    {
        return $this->mediaTypeRepository->findOneByType($mediaType);
    }

    public function getCatalog(Trick $trick): Collection|null
    {
        return $this->mediaRepository->findByTrick($trick);
    }

    public function image(string $url): string
    {
        if (!str_starts_with($url, 'http')) {
            //$url = getcwd() . DIRECTORY_SEPARATOR . $url;
            $url = 'http://oc6.test/public/uploads/' . $url;
        }
        /* 
        if (!is_link($url)) {
            $url = 'http://oc6.test/assets/img/broken_image.webp';
            return '<img src="' . $url . '" alt="file not exists" width="40px" />';
        }*/
        return '<img src="' . $url . '" alt="' . strrchr($url, '/') . '" />';
    }

    public function youtubeEmbedUrl(string $url): string
    {
        //input: https://youtu.be/hW_RhD0D-Ew
        //input: https://www.youtube.com/watch?v=hW_RhD0D-Ew
        //outpu: https://www.youtube.com/embed/hW_RhD0D-Ew
        $url = str_replace('youtu.be', 'youtube.com', $url);
        $url = str_replace('watch?v=', '', $url);
        $url = str_replace('youtube.com/', 'youtube.com/embed/', $url);
        return $url;
    }

    public function goodUrl(string $url): string
    {
        if (strpos($url, 'youtube.com')) {
            $url = $this->youtubeEmbedUrl($url);
        }
        return $url;
    }

    public function youtubeIframe(string $url): string
    {
        return '<iframe width="560" height="315" src="' . $this->youtubeEmbedUrl($url) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }

}
