<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Repository\TrickRepository;
use App\Repository\MediaRepository;
use App\Service\MediaService;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Trick;
use App\Entity\Media;
use App\Entity\User;

class TrickService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private readonly EntityManagerInterface $manager,
        private readonly SluggerInterface $slugger,
        private readonly TrickRepository $trickRepository,
        //private readonly TrickModel $trickModel,
        private readonly TrickMapper $trickMapper,
        private readonly MediaService $mediaService,
        private readonly MediaRepository $mediaRepository,
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->trickRepository->findAll();
    }

    public function getAllPublic(): array
    {
        $trickModel = $this->trickRepository->findByStatus();
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

    /*
    public function getByTitleOne(string $title): Trick|array
    {
        return $this->trickRepository->findOneByTitle($title);
    }

    public function getByTitle(string $title): Trick|array
    {
        return $this->trickRepository->findByTitle($title);
    }*/

    public function saveTrick(
        Trick $trick,
        User $user,
        string $title,
        string $content,
        //string $image,
    ): void {

        //$trickModel = $this->trickM>EntityToModel($trick);
        $trickModel = $trick;
        if (!$trickModel->getId()) {
            $trickModel->setUser($user);
            $trickModel->setCreatedAt(new \DateTime());
            $trickModel->setStatus(1);
        }
        //$trickModel->setTitle($title);
        //$trickModel->setContent($content);
        //$trickModel->setImage($image);
        $slug = $this->slugger->slug($trickModel->getTitle());
        $trickModel->setSlug($slug->toString());
        $trickModel->setUpdatedAt(new \DateTime());
        //$trickModel->setImage($this->mediaService->importImage($trickModel->getImage()));
        $trickModel->setImage('no');
        //$this->trickRepository->saveTrickModel($trickModel);
        $this->trickRepository->saveTrick($trick);

    }

    //admin

    public function getAllTricks(): array
    {
        $trickModel = $this->trickRepository->findAll();
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function getMyTricks(int $uid): array
    {
        $trickModel = $this->trickRepository->findMy($uid);
        return $this->trickMapper->EntitiesToModels($trickModel);
    }

    public function updateStatus(int $id): void
    {
        $trick = $this->trickRepository->findOneById($id);
        //$trickModel = $this->trickMapper->EntityToModel($trick);
        $status = $trick->getStatus();
        $status = $status == 1 ? 0 : 1;
        //$trickModel->setStatus($status);
        $trick->setStatus($status);
        //$this->trickRepository->saveTrickModel($trickModel);
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
