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
        for ($i = 1; $i < $this->fixturesService->numberOfTricks(); $i++) {
            for ($j = 0; $j < 4; $j++) {
                $comments = new Comment();
                $comments
                    ->setTrick(rand(1, 10))
                    ->setUser(rand(1, 10))
                    ->setContent('hello')
                    ->setStatus(rand(0, 1))
                    ->setDate(new \DateTime());
                $manager->persist($comments);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class,
            UserFixtures::class,
        ];
    }

}
