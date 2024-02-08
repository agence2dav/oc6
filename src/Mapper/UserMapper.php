<?php

declare(strict_types=1);

namespace App\Mapper;

use DateTimeInterface;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use App\Mapper\CommentMapper;
use App\Model\UserModel;
use App\Entity\User;

class UserMapper
{
    private static $instance;

    public function __construct(
        private CommentMapper $commentMapper
    ) {

    }

    public function EntityToModel(User $userEntity): UserModel
    {
        $userModel = new UserModel();
        $userModel->setId($userEntity->getId());
        //$userModel->setUser($userEntity->getUser());
        $userModel->setUsername($userEntity->getUser());
        $userModel->setEmail($userEntity->getEmail());
        $userModel->setPassword($userEntity->getPassword());
        $userModel->setRole($userEntity->getRole());
        return $userModel;
    }

    public function EntitiesToModels(array $userEntities): array
    {
        $userModels = [];
        foreach ($userEntities as $userEntity) {
            $userModels[] = $this->EntityToModel($userEntity);
        }
        return $userModels;
    }

}
