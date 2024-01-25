<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Model\TrickModel;
use App\Entity\Trick;

class TrickMapper
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function fromFetch(Trick $entity): TrickModel|bool
    {
        $trickModel = new TrickModel();
        $trickModel->id = $entity->id;
        $trickModel->title = $entity->title;
        $trickModel->content = $entity->content ?? '';
        $trickModel->category = $entity->category;
        $trickModel->name = $entity->name;
        $trickModel->date = $entity->createdAt;
        $trickModel->status = $entity->status;
        $trickModel->uid = $entity->userid ?? null;
        return $trickModel;
    }

    public static function fromFetchAll(array $entities): array
    {
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
                $trickModel = new TrickModel;
                $trickModel->id = $entity->id;
                $trickModel->title = $entity->title;
                $trickModel->name = $entity->name;
                $trickModel->createdAt = $entity->date;
                $trickModel->status = $entity->status;
                return $trickModel;
            },
            $entities
        );
        return $trickModels;
    }
}
