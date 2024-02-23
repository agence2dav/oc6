<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Repository\TrickTagsRepository;
use App\Repository\TrickRepository;
use App\Repository\MediaRepository;
use App\Service\MediaService;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\TrickTags;
use App\Entity\Trick;
use App\Entity\Media;
use App\Entity\User;

class TrickService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private readonly EntityManagerInterface $manager,
        private readonly SluggerInterface $slugger,
        private readonly TrickTagsRepository $trickTagsRepository,
        private readonly TrickRepository $trickRepository,
        private readonly MediaRepository $mediaRepository,
        private readonly MediaService $mediaService,
        private readonly TrickMapper $trickMapper,
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->trickRepository->findAll();
    }

    public function getTricksPaginator(int $offset): array
    {
        $tricks = $this->trickRepository->getTricksPaginator($offset);
        return $this->trickMapper->EntitiesToModels($tricks);
    }

    public function getAllTricks(): array
    {
        $trickModel = $this->trickRepository->findAll();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getAllPublic(): array
    {
        $trickModel = $this->trickRepository->findByStatus();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getLastsricks(): array
    {
        $trickModel = $this->trickRepository->findLastsByStatus();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getMyTricks(int $uid): array
    {
        $trickModel = $this->trickRepository->findMy($uid);
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
        string $title,
        string $content,
        string $video = null,
    ): void {
        if (!$trick->getId()) {
            $trick->setUser($user);
            $trick->setCreatedAt(new \DateTime());
            $trick->setStatus(1);
        }
        //$trick->setTitle($title);
        //$trick->setContent($content);
        $slug = $this->slugger->slug($trick->getTitle());
        $trick->setSlug($slug->toString());
        $trick->setUpdatedAt(new \DateTime());
        $this->trickRepository->saveTrick($trick);
        if ($video) {
            $this->mediaService->saveMedia($trick, $video, 'image');
        }
    }

    public function formatContent($content): string
    {
        $paragraphs = explode("\n", $content);
        $contentArray = [];
        foreach ($paragraphs as $paragraph) {
            $paragraphArray = [];
            $words = explode(' ', $paragraph);
            foreach ($words as $word) {
                $extension = strrchr(trim($word), '.');
                if (in_array($extension, ['.jpg', '.png', '.webp'])) {
                    $paragraphArray[] = $this->mediaService->image($word);
                } elseif (strpos($word, 'youtu')) {
                    $paragraphArray[] = $this->mediaService->youtube($word);
                } else {
                    $paragraphArray[] = $word;
                }
            }
            $contentArray[] = '<p class="card-text">' . implode(' ', $paragraphArray) . '</p>';
        }
        return implode("\n", $contentArray);
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

    /* unused 
    public function deleteTrick(Trick $trickModel): bool
    {
        if ($this->trickRepository->findOneById($trickModel->getId()) === null) {
            return false;
        }
        $this->trickRepository->delete($trickModel);
        return true;
    }
    */
}
