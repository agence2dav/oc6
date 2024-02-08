<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;
use App\Service\FixturesService;

class DesignationFixtures extends Fixture //implements DependentFixtureInterface
{

    //private int $numberOfArticles = 10;

    public function __construct(
        private readonly FixturesService $fixturesService,
    ) {

    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->fixturesService->designations() as [$type, $name]) {
            $designation = new Designation();
            $designation
                ->setType($type)
                ->setName($name);
            $this->fixturesService->designation[] = $designation;
            $manager->persist($designation);
        }
        $manager->flush();
    }

}
