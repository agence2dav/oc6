<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Repository\TrickTagsRepository;
use App\Repository\TrickRepository;
use App\Repository\MediaRepository;
use App\Service\MediaService;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Trick;
use App\Entity\User;

class TrickService
{

    public function __construct(
        private readonly EntityManagerInterface $manager,
        private readonly SluggerInterface $slugger,
        private readonly TrickTagsRepository $trickTagsRepository,
        private readonly TrickRepository $trickRepository,
        private readonly MediaRepository $mediaRepository,
        private readonly MediaService $mediaService,
        private readonly TrickMapper $trickMapper,
    ) {

    }
    public const PAGINATOR_PER_PAGE = 10;

    public function getAll(): Trick|array
    {
        return $this->trickRepository->findAll();
    }

    public function getTricksPaginator(int $offset): array
    {
        $tricks = $this->trickRepository->getTricksPaginator($offset, self::PAGINATOR_PER_PAGE)->getQuery()->getResult();
        return $this->trickMapper->EntitiesToModels($tricks);
    }

    public function countTrickPublished(): int
    {
        return $this->trickRepository->countByStatus();
    }

    public function getPaginationArrayButtons(int $nbOfPages): array
    {
        return array_map(fn($i = 0): int => (int) self::PAGINATOR_PER_PAGE * $i++, range(0, $nbOfPages - 1));
    }

    public function getAllTricks(): array
    {
        $trickModel = $this->trickRepository->findAll();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getLastsTricks(): array
    {
        $trickModel = $this->trickRepository->findLastsByStatus();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getById(int $id): TrickModel
    {
        $trickModel = $this->trickRepository->findOneById($id);
        return $this->trickMapper->EntityToModel($trickModel);
    }

    public function getBySlug(string $slug): TrickModel
    {
        $trickModel = $this->trickRepository->findOneBySlug($slug);
        return $this->trickMapper->EntityToModel($trickModel);
    }

    public function saveTrick(
        Trick $trick,
        User $user,
        string $video = null,
    ): void {
        if (!$trick->getId()) {
            $trick->setUser($user);
            $trick->setCreatedAt(new \DateTime());
            $trick->setStatus(1);
        }
        $slug = $this->slugger->slug($trick->getTitle());
        $trick->setSlug($slug->toString());
        $trick->setUpdatedAt(new \DateTime());
        $this->trickRepository->saveTrick($trick);
        if ($video) {
            $this->mediaService->saveMedia($trick, $video, 'image');
        }
    }

    public function setAsFirstImage(Trick $trick, int $mediaId): void
    {
        $medias = $trick->getMedia();
        foreach ($medias as $media) {
            if ($media->getId() == $mediaId) {
                $trick->setImage($media->getFilename());
                $this->trickRepository->saveTrick($trick);
            }
        }
    }

    public function deleteTag(Trick $trick, int $tagId): void
    {
        $trickTags = $trick->getTrickTags();
        foreach ($trickTags as $trickTag) {
            if ($trickTag->getTag()->getId() == $tagId) {
                $trickTag = $this->trickTagsRepository->findOneById($trickTag->getId());
                $this->trickTagsRepository->delete($trickTag);
            }
        }
    }

    public function deleteMedia(Trick $trick, int $tagId): void
    {
        $medias = $trick->getMedia();
        //dd($trickTags);
        foreach ($medias as $media) {
            if ($media->getId() == $tagId) {
                $media = $this->mediaRepository->findOneById($media->getId());
                $this->mediaRepository->delete($media);
            }
        }
    }

    public function updateStatus(int $id): void
    {
        $trick = $this->trickRepository->findOneById($id);
        $status = $trick->getStatus();
        $status = $status == 1 ? 0 : 1;
        $trick->setStatus($status);
        $this->trickRepository->saveTrick($trick);
    }

}
