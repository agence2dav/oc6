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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
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
        private readonly UserPasswordHasherInterface $userPasswordHasher,
        private readonly TokenGeneratorInterface $tokenGenerator,
        private readonly ParameterBagInterface $parameterBag,
        private readonly JwtService $JwtService,
        private UserRepository $userRepository,
        private UserModel $userModel,
        private UserMapper $mapper,
    ) {
    }

    public function getAll(): User|array
    {
        return $this->userRepository->findAll();
    }

    public function getById(int $id): UserModel
    {
        $userEntity = $this->userRepository->findOneById($id);
        return $this->mapper->EntityToModel($userEntity);
    }

    public function saveUser(User $user, string $plainPassword): void
    {
        $password = $this->userPasswordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($password);
        $user->setRoles(['ROLE_EDIT']);
        $this->userRepository->saveUser($user);
    }

    public function deleteUser(User $user): bool
    {
        if ($this->userRepository->findOneById($user->getId()) === null) {
            return false;
        }
        $this->userRepository->delete($user);
        return true;
    }

    //reset-pswd

    public function getUser(string $email): User
    {
        return $this->userRepository->findOneByEmail($email);
    }

    public function getUserVerified(int $uid): ?User
    {
        $user = $this->userRepository->find($uid);
        if ($user && !$user->getIsVerified()) {
            return $this->userRepository->updateIsVerify($user);
        }
        return null;
    }

    public function isUserVerifiedYet(User $user): bool
    {
        return $user->isVerified();
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
        $param = $this->parameterBag->get('app.jwtsecret');
        return $this->JwtService->generate($header, $payload, $param);
    }

    public function getUserModel(User $user): UserModel
    {
        $this->userModel->setId($user->getId());
        $this->userModel->setUsername($user->getUsername());
        $this->userModel->setEmail($user->getEmail());
        return $this->userModel;
    }

    public function isUserKnown(string $email): ?UserModel
    {
        $user = $this->userRepository->findOneByEmail($email);
        if (!$user) {
            return null;
        }
        return $this->getUserModel($user);
    }

    public function setToken(UserModel $userModel): string
    {
        $token = $this->tokenGenerator->generateToken();
        $user = $this->userRepository->find($userModel->getId());
        $user->setResetToken($token);
        $this->userRepository->saveUser($user);
        return $token;
    }

    public function findUserByResetToken(string $token): UserModel
    {
        $user = $this->userRepository->findOneByResetToken($token);
        return $this->getUserModel($user);
    }

    public function setNewPassword(UserModel $userModel, string $password): void
    {
        $user = $this->userRepository->find($userModel->getId());
        $user->setResetToken('');
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                $password
            )
        );
        $this->userRepository->saveUser($user);
    }
}
