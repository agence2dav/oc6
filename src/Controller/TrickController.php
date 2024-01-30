<?php

declare(strict_types=1);

namespace App\Controller;

//use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TrickRepository;
use App\Service\CommentService;
use App\Service\TrickService;
use App\Form\TrickForm;
use App\Entity\Trick;

class TrickController extends AbstractController
{

    public function __construct(
        private TrickService $trickService,
        private TrickRepository $trickRepository,
        //private TrickForm $trickForm,
        private CommentService $commentService
    ) {

    }
    
    #[Route('/trick/{id}', name: 'show_trick')]
    public function show(Trick $trick, int $id): Response
    {
        //$trick=$this->trickRepository->find($id);
        $trick=$this->trickService->getById($id);
        $comments=$this->commentService->getByTrick($id);
        //print_r($comments);

        return $this->render('home/trick.html.twig', [
            'controller_name' => 'HomeController',
            'trick'=>$trick,
            'comments'=>$comments,
        ]);
    }
    
    #[Route('/trick/new', name: 'new_trick')]
    #[Route('/trick/{id}/edit', name: 'edit_trick')]
    public function form(Trick $trick = null, Request $request, EntityManagerInterface $manager): Response
    {
        if(!$trick){
            $trick=new Trick();
        }

        $form=$this->createFormBuilder($trick)
            ->add('title')
            ->add('content')
            ->add('image')
            ->getForm();

        //$form=$this->trickform->buildForm($this->createFormBuilder($trick), []);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            if(!$trick->getId()){
                $trick->setUserid(1);
                $trick->setCreatedAt(new \DateTime());
                $trick->setUpdatedAt(new \DateTime());
                $trick->setStatus(1);
            }
            $manager->persist($trick);//service
            $manager->flush();//repo
            return $this->redirectToRoute('show_trick',['id'=>$trick->getId()]);
        }

        return $this->render('home/create.html.twig', [
            'formTrick'=>$form->createView(),
            'edit_mode'=>$trick->getId() ? true : false
        ]);
    }

}
