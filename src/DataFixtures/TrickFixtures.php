<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;

class TrickFixtures extends Fixture
{

    private int $numberOfArticles = 10;

    public const TRICK_IDS = 'trickId';

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            $trick = new Trick();
            $trick->setTitle('titre ' . $i)
                ->setContent('<p>hello</p>')
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime())
                ->setStatus('1')
                ->setUserid('1');
            $manager->persist($trick);
            //$this->addReference(self::TRICK_ID, $trick);
        }
        $manager->flush();
    }
}
