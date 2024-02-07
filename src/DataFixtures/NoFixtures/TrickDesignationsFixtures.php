<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\DesignationFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Trick;
use App\Entity\Designation;
use App\Entity\TrickDesignations;
use App\Service\FixturesService;
use App\DataFixtures\TrickFixtures;

class TrickDesignationsFixtures extends Fixture implements DependentFixtureInterface
{

    //private int $numberOfArticles = 10;

    function __construct(
        private readonly FixturesService $fixturesService,
        //DesignationFixtures $designationFixtures
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        //$designations = $this->designationFixtures->designations;
        $designationsRandom = array_rand($this->fixturesService->designations(), 4);
        for ($i = 1; $i < $this->fixturesService->numberOfTricks(); $i++) {
            $trick = $this->getReference('titre' . $i);
            for ($j = 0; $j < 4; $j++) {
                $designation = $this->getReference($designationsRandom[$j]);
                $trick_designations = new TrickDesignations();
                $trick_designations
                    ->setTrick($trick)
                    //->setDesignation($designationsRandom[$j]);
                    ->setDesignation($designation);
                $manager->persist($trick_designations);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class,
            DesignationFixtures::class,
        ];
    }

}
