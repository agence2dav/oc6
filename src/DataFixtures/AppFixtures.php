<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Trick;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $trick=new Trick();
            $trick->setTitle('titre '.$i)
                ->setContent('<p>hello</p>')
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt(new \DateTime())
                ->setStatus('0')
                ->setUserid('1');
            $manager->persist($trick);
        }

        $manager->flush();
    }
}
