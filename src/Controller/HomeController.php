<?php

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
use App\Repository\ArticleRepository;
use App\Entity\Article;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends AbstractController
{
    //public function __construct(private ManagerRegistry $doctrine) {}//old2b

    #[Route('/home', name: 'app_home')]
    //public function index(): Response //old 1
    //public function index(EntityManagerInterface $em): Response //old2
    public function index(ArticleRepository $repo): Response
    {
        //$repo=$this->getDoctrine()->getRepository(Article::class);//old1
        //$repo=$em()->getRepository(Article::class);//old2
        
        //$article=$repo->find(12);
        //$article=$repo->findOneByTitle('Title 2');
        //$article=$repo->findByTitle('Title');
        $article=$repo->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles'=>$article,
        ]);
    }
    
    #[Route('/articles', name: 'articles')]
    public function articles(ArticleRepository $repo): Response
    {   
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles'=>$repo->findAll(),
        ]);
    }
    
    
    #[Route('/post/new', name: 'new_post')]
    #[Route('/post/{id}/edit', name: 'edit_post')]
    //public function show(ArticleRepository $repo, int $id): Response
    public function  form(Article $article = null, Request $request, EntityManagerInterface $manager): Response
    {
        if(!$article){
            $article=new Article();
        }

        $form=$this->createFormBuilder($article)
            /*->add('title',TextType::class,[
                'attr'=>[
                    'placeholder'=>"Titre de l'article",
                ]
            ])
            ->add('save',SubmitType::class,[
                'label'=>'Enregistrer',
            ])*/
            ->add('title')
            ->add('text')
            ->add('image')
            ->getForm();
        
        //or simply use:
        //$form->createForm(ArticleType::class, $article);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            /*$article->setTitle($request->request->get('title'))
                ->setText($request->request->get('text'))
                ->setImage($request->request->get('image'));*/
            if(!$article->getId()){
                $article->setDate(new \DateTime());
                $article->setStatus(0);
                $article->setUserid(1);
            }
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('show_post',['id'=>$article->getId()]);
        }


        return $this->render('home/create.html.twig', [
            'formArticle'=>$form->createView(),
            'edit_mode'=>$article->getId() ? true : false
        ]);
    }
    
    #[Route('/post/{id}', name: 'show_post')]
    //public function show(ArticleRepository $repo, int $id): Response
    public function show(Article $article): Response
    {
        //$article=$repo->find($id);
        return $this->render('home/post.html.twig', [
            'controller_name' => 'HomeController',
            'article'=>$article,
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
