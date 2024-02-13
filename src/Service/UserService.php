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

    //reset-pswd
    /* 
    public function getUserVerified(int $userId): ?User
    {
        $user = $this->repo->find($userId);
        if ($user && !$user->getIsVerified()) {
            return $this->repo->updateIsVerify($user);
        }
        return null;
    }

    public function isUserVerifiedYet(User $user): bool
    {
        return $user->getIsVerified();
    }

    public function newRegisterToken(UserModel $user): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        $payload = [
            'userId' => $user->getId()
        ];
        return $this->jWTService->generate($header, $payload, $this->params->get('app.jwtsecret'));
    }

    public function getUserModel(User $user): UserModel
    {
        return new UserModel($user->getId(), $user->getUserIdentifier(), $user->getEmail());
    }

    public function isUserKnown(string $email): ?UserModel
    {
        $user = $this->repo->findOneByEmail($email);
        if (!$user) {
            return null;
        }
        return $this->getUserModel($user);
    }

    public function setToken(UserModel $userModel): string
    {
        $token = $this->tokenGenerator->generateToken();
        $user = $this->repo->find($userModel->getId());
        $user->setResetToken($token);
        $this->repo->saveUser($user);
        return $token;
    }

    public function findUserByResetToken(string $token): UserModel
    {
        $user = $this->repo->findOneByResetToken($token);
        return $this->getUserModel($user);
    }

    public function setNewPassword(UserModel $userModel, string $password): void
    {
        $user = $this->repo->find($userModel->getId());
        $user->setResetToken('');
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                $password
            )
        );
        $this->repo->saveUser($user);
    }

    public function getUser(string $email): User
    {
        return $this->repo->findOneByEmail($email);
    }
*/
}
