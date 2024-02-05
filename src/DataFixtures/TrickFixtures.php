<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;
use App\Service\FixturesService;
//use App\Fixtures\TrickDesignations;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

//use Symfony\Component\String\Slugger\SluggerInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{

    //private int $numberOfArticles = 10;

    public const TRICK_IDS = 'trickId';

    public function __construct(
        private readonly FixturesService $fixturesService,
        //private readonly SluggerInterface $slugger,
    ) {

    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->fixturesService->numberOfTricks(); $i++) {
            $trick = new Trick();

            $trick->setTitle('titre ' . $i)
                ->setContent('<p>hello</p>')
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt($this->fixturesService->generateDateInPast())
                ->setUpdatedAt($this->fixturesService->generateRandomDateFrom())
                ->setStatus('1')
                ->setUser('1');
            $manager->persist($trick);
            //$this->addReference(self::TRICK_ID, $trick);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
                //TrickDesignationsFixtures::class,
            UserFixtures::class,
        ];
    }

}
