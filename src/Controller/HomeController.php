<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\ORM\EntityManagerInterface; //old2
//use  Symfony\Bridge\Doctrine\ManagerRegistry;//old2b
//use Doctrine\Persistence\ManagerRegistry;//old2c
//use Doctrine\Persistence\ObjectManager; //alias to: doctrine.orm.default_entity_manager//old3
use Doctrine\ORM\EntityManagerInterface;//now
use App\Repository\TrickRepository;
use App\Entity\Trick;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends AbstractController
{
    //public function __construct(private ManagerRegistry $doctrine) {}//old2b

    #[Route('/home', name: 'app_home')]
    //public function index(): Response //old 1
    //public function index(EntityManagerInterface $em): Response //old2
    public function index(TrickRepository $repo): Response
    {
        //$repo=$this->getDoctrine()->getRepository(Trick::class);//old1
        //$repo=$em()->getRepository(Trick::class);//old2
        
        //$trick=$repo->find(12);
        //$trick=$repo->findOneByTitle('Title 2');
        //$trick=$repo->findByTitle('Title');
        $trick=$repo->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tricks'=>$trick,
        ]);
    }
    
    #[Route('/tricks', name: 'tricks')]
    public function tricks(TrickRepository $repo): Response
    {   
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tricks'=>$repo->findAll(),
        ]);
    }
    
    
    #[Route('/trick/new', name: 'new_trick')]
    #[Route('/trick/{id}/edit', name: 'edit_trick')]
    //public function show(TrickRepository $repo, int $id): Response
    public function  form(Trick $trick = null, Request $request, EntityManagerInterface $manager): Response
    {
        if(!$trick){
            $trick=new Trick();
        }

        $form=$this->createFormBuilder($trick)
            /*->add('title',TextType::class,[
                'attr'=>[
                    'placeholder'=>"Titre de l'trick",
                ]
            ])
            ->add('save',SubmitType::class,[
                'label'=>'Enregistrer',
            ])*/
            ->add('title')
            ->add('content')
            ->add('image')
            ->getForm();
        
        //or simply use:
        //$form->createForm(TrickType::class, $trick);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            /*$trick->setTitle($request->request->get('title'))
                ->setContent($request->request->get('content'))
                ->setImage($request->request->get('image'));*/
            if(!$trick->getId()){
                $trick->setCreatedAt(new \DateTime());
                $trick->setStatus(0);
                $trick->setUserid(1);
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
    
    #[Route('/trick/{id}', name: 'show_trick')]
    //public function show(TrickRepository $repo, int $id): Response
    public function show(Trick $trick): Response
    {
        //$trick=$repo->find($id);
        return $this->render('home/trick.html.twig', [
            'controller_name' => 'HomeController',
            'trick'=>$trick,
        ]);
    }
    
    #[Route('/', name: 'empty')]
    public function empty(): Response
    {
        return $this->render('home/empty.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
