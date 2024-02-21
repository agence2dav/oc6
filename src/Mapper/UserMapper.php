<?php

declare(strict_types=1);

namespace App\Mapper;

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
        $userModel->setUsername($userEntity->getUsername());
        $userModel->setEmail($userEntity->getEmail());
        $userModel->setPassword($userEntity->getPassword());
        $userModel->setRole($userEntity->getRoles());
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
