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
        $nb_designations = count($this->fixturesService->designations()) - 1;
        for ($i = 0; $i < $this->fixturesService->numberOfTricks(); $i++) {
            for ($j = 0; $j < 4; $j++) {
                $trick_designations = new TrickDesignations();
                $trick_designations
                    ->setTrick($this->fixturesService->tricks[$i])
                    ->setDesignation($this->fixturesService->designation[mt_rand(0, $nb_designations)]);
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
