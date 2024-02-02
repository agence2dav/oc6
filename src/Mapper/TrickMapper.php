<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Model\TrickModel;
use App\Entity\Trick;

class TrickMapper
{
    private static $instance;

    public function __construct(
        private TrickModel $trickModel
    ) {

    }

    public function fromFetch(
        Trick $entity
    ): TrickModel|bool {
        //$trickModel = new TrickModel();
        $trickModel = $this->trickModel;
        $trickModel->id = $entity->id;
        $trickModel->title = $entity->title;
        $trickModel->content = $entity->content;
        $trickModel->createdAt = $entity->createdAt;
        $trickModel->status = $entity->status;
        $trickModel->userId = $entity->userId;
        return $trickModel;
    }

    public static function fromFetchAll(
        array $entities
    ): array {
        $trickModels = array_map(
            function ($entity) {
                return self::fromFetch($entity);
            },
            $entities
        );
        return $trickModels;
    }

    public function forDashboard(array $entities): array|bool
    {
        $trickModels = array_map(
            function ($entity) {
                //$trickModel = new TrickModel;
                $trickModel = $this->trickModel;
                $trickModel->id = $entity->id;
                $trickModel->title = $entity->title;
                $trickModel->content = $entity->content;
                $trickModel->createdAt = $entity->createdAt;
                $trickModel->status = $entity->status;
                return $trickModel;
            },
            $entities
        );
        return $trickModels;
    }
}
