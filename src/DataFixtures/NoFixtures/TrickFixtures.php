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

    public const TRICK_IDS = 'trickId';
    public function __construct(
        private readonly FixturesService $fixturesService,
        //private readonly SluggerInterface $slugger,
    ) {

    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < $this->fixturesService->numberOfTricks(); $i++) {
            $user = $this->getReference('user' . $i);
            $trick = new Trick();
            $trick
                ->setUser($user)
                ->setTitle('titre' . $i)
                ->setContent('<p>hello</p>')
                //->setContent($this->fixturesService->faker->paragraphs(4, true))
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt($this->fixturesService->generateDateInPast())
                ->setUpdatedAt($this->fixturesService->generateRandomDateFrom())
                ->setStatus(1);
            $manager->persist($trick);
            //$this->addReference(self::TRICK_ID, $trick);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }

}
