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
use App\Repository\TrickRepository;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Comment;
use App\Entity\CommentService;
use App\Entity\CommentRepository;
use App\Entity\Trick;

class MediaService
{

    public function importImage($imageUrl)
    {
        return $imageUrl;
    }

    public function resizeImage($imageUrl)
    {
        return $imageUrl;
    }

}
