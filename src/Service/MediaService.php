<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Repository\TrickRepository;
use App\Repository\MediaRepository;
use App\Service\FileUploader;
use App\Mapper\TrickMapper;
use App\Model\TrickModel;
use App\Entity\Comment;
use App\Entity\CommentService;
use App\Entity\CommentRepository;
use App\Entity\Trick;
use App\Entity\Media;

class MediaService extends AbstractController
{

    public function __construct(
        //private readonly EntityManagerInterface $entityManager,
        private readonly EntityManagerInterface $manager,
        private readonly SluggerInterface $slugger,
        private readonly TrickRepository $trickRepository,
        //private readonly TrickModel $trickModel,
        private readonly TrickMapper $trickMapper,
        private readonly MediaRepository $mediaRepository,
        //private readonly UploadedFile $uploadedFile,
    ) {

    }

    public function saveMedia(
        Trick $trick,
        string $mediaFileName,
    ): void {
        $media = new Media();
        $media->setFilename($mediaFileName);
        $media->setTrick($trick);
        $this->mediaRepository->saveMedia($media);
    }

    public function importImage($imageUrl)
    {
        return $imageUrl;
    }

    public function resizeImage($imageUrl)
    {
        return $imageUrl;
    }

}
