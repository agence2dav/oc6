<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Repository\UserRepository;
use App\Mapper\UserMapper;
use App\Model\UserModel;
use App\Entity\Comment;
use App\Entity\CommentService;
use App\Entity\CommentRepository;
use App\Entity\User;

class UserService
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private readonly EntityManagerInterface $manager,
        private UserRepository $repo,
        //private readonly UserModel $model,
        private readonly UserMapper $mapper,
    ) {
    }

    public function getAll(): User|array
    {
        return $this->repo->findAll();
    }

    public function getById(int $id): UserModel
    {
        $userEntity = $this->repo->findOneById($id);
        return $this->mapper->EntityToModel($userEntity);
    }

    public function saveUser(User $user): void
    {
        $this->repo->saveUser($user);
    }

    public function deleteUser(User $user): bool
    {
        if ($this->repo->findOneById($user->getId()) === null) {
            return false;
        }
        $this->repo->delete($user);
        return true;
    }

}
