<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $article=new Article();
            $article->setTitle('titre '.$i)
                ->setText('<p>hello</p>')
                ->setImage('http://placehold.it/350x150')
                ->setDate(new \DateTime())
                ->setStatus('0')
                ->setUserid('1');
            $manager->persist($article);
        }

        $manager->flush();
    }
}
