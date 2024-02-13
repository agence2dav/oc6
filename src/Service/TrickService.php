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
use App\Service\MediaService;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Trick;
use App\Entity\User;

class TrickService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private readonly TrickRepository $repo,
        //private readonly TrickModel $model,
        private readonly SluggerInterface $slugger,
        private readonly TrickMapper $mapper,
        private readonly EntityManagerInterface $manager,
        private readonly MediaService $mediaService,
    ) {

    }

    public function getAll(): Trick|array
    {
        return $this->repo->findAll();
    }

    public function getAllPublic(): array
    {
        $trickEntities = $this->repo->findByStatus();
        return $this->mapper->EntitiesToModels($trickEntities);
    }

    public function getById(int $id): TrickModel
    {
        $trickEntity = $this->repo->findOneById($id);
        return $this->mapper->EntityToModel($trickEntity);
    }

    public function getBySlug(string $slug): TrickModel
    {
        $trickEntity = $this->repo->findOneBySlug($slug);
        return $this->mapper->EntityToModel($trickEntity);
    }

    /*
    public function getByTitleOne(string $title): Trick|array
    {
        return $this->repo->findOneByTitle($title);
    }

    public function getByTitle(string $title): Trick|array
    {
        return $this->repo->findByTitle($title);
    }*/

    public function saveTrick(Trick $trick, User $user): void
    {
        if (!$trick->getId()) {
            //$user = $this->userRepository->findById(1);
            $trick->setUser($user);
            $trick->setCreatedAt(new \DateTime());
            $trick->setStatus(1);
        }
        $slug = $this->slugger->slug($trick->getTitle());
        $trick->setSlug($slug->toString());
        $trick->setUpdatedAt(new \DateTime());
        $trick->setImage($this->mediaService->importImage($trick->getImage()));
        //$manager->persist($trick);
        //$manager->flush();
        $this->repo->saveTrick($trick);
    }

    public function deleteTrick(Trick $trick): bool
    {
        if ($this->repo->findOneById($trick->getId()) === null) {
            return false;
        }
        $this->repo->delete($trick);
        return true;
    }

}
