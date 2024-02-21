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

    public function catalog($imageUrl)
    {
        return $imageUrl;
    }

    public function image(string $url): string
    {
        if (!str_starts_with($url, 'http')) {
            //$url = getcwd() . DIRECTORY_SEPARATOR . $url;
            $url = 'http://oc6.test/public/uploads/' . $url;
        }
        /* 
        if (!is_link($url)) {
            $url = 'http://oc6.test/assets/img/broken_image.webp';
            return '<img src="' . $url . '" alt="file not exists" width="40px" />';
        }*/
        return '<img src="' . $url . '" alt="' . strrchr($url, '/') . '" />';
    }

    public function youtube(string $url): string
    {
        //input: https://youtu.be/hW_RhD0D-Ew
        //input: https://www.youtube.com/watch?v=hW_RhD0D-Ew
        //outpu: https://www.youtube.com/embed/hW_RhD0D-Ew
        $url = str_replace('youtu.be', 'youtube.com', $url);
        $url = str_replace('watch?v=', '', $url);
        $url = str_replace('youtube.com/', 'youtube.com/embed/', $url);
        return '<iframe src="' . $url . '" width="100%" height="320px" allowfullscreen="true"></iframe>';
    }

}
