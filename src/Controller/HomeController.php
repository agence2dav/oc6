<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Doctrine\ORM\EntityManagerInterface; //old2
//use  Symfony\Bridge\Doctrine\ManagerRegistry;//old2b
//use Doctrine\Persistence\ManagerRegistry;//old2c
use App\Repository\ArticleRepository;//now
use App\Entity\Article;

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
    public function home(): Response
    {
        return $this->render('home/empty.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
