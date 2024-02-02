<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\TrickRepository;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Comment;
use App\Entity\CommentService;
use App\Entity\CommentRepository;
use App\Entity\Trick;

class TrickService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $repo,
        //private TrickModel $model,
        //private TrickMapper $mapper,
        private EntityManagerInterface $manager
    ) {

    }

    //$repo=$this->getDoctrine()->getRepository(Trick::class);//old1
    //$repo=$em()->getRepository(Trick::class);//old2

    public function getAll(): Trick|array
    {
        return $this->repo->findAll();
    }

    public function getAllPublic(): TrickModel|array
    {
        return $this->repo->findByStatus(1);
    }

    public function getById(int $id): Trick
    {

        //return $this->repo->find($id);
        return $this->repo->findOneById($id);
    }

    public function getByTitleOne(string $title): Trick|array
    {
        return $this->repo->findOneByTitle($title);
    }

    public function getByTitle(string $title): Trick|array
    {
        return $this->repo->findByTitle($title);
    }

    public function getSlug(int $id): string
    {
        return $this->repo->findSlug($id);
    }

    public function saveTrick(Trick $trick): void
    {
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
