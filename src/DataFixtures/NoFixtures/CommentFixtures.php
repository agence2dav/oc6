<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comment;
use App\Service\FixturesService;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    //private int $numberOfArticles = 10;

    public function __construct(
        private readonly FixturesService $fixturesService,
    ) {

    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->fixturesService->numberOfTricks(); $i++) {
            for ($j = 0; $j < 4; $j++) {
                $comments = new Comment();
                $comments
                    ->setTrick($this->fixturesService->tricks[$i])
                    ->setUser($this->fixturesService->users[$j])
                    ->setContent($this->fixturesService->faker->paragraphs(mt_rand(1, 3), true))
                    ->setStatus(rand(0, 1))
                    ->setDate($this->fixturesService->generateRandomDateFrom());
                $manager->persist($comments);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            TrickFixtures::class,
        ];
    }

}
