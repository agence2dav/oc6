<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\TrickRepository;
use App\Model\TrickModel;
use App\Mapper\TrickMapper;
use Doctrine\ORM\EntityManagerInterface;

class TrickService
{
    private static $instance;
    //private TrickRepository $trickRepository;
    //private TrickMapper $trickMapper;

    private function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private TrickRepository $trickRepository
    )
    {
        //$this->trickRepository = TrickRepository::getInstance();
        //$this->trickMapper = TrickMapper::getInstance();
    }

    /**/public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();//Too few arguments to function App\Service\TrickService::__construct()
        }
        return self::$instance;
    }


    public function getPost(int $id): TrickModel
    {
        $trickEntity = $this->trickRepository->getById($id);
        return $this->trickMapper->fromFetch($trickEntity);
    }
    

    public function savePost(int $catid, string $title, string $excerpt, string $content): string
    {
        return $this->trickRepository->postSave($catid, $title, $excerpt, $content);
    }




}
