<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comment;

class CommentFixtures extends Fixture
{
    private int $numberOfArticles = 10;

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $comments = new Comment();
                $comments
                    ->setTrickId(rand(1, 10))
                    ->setUserid(rand(1, 10))
                    ->setContent('hello')
                    ->setStatus(rand(0, 1))
                    ->setDate(new \DateTime());
                $manager->persist($comments);
            }
        }
        $manager->flush();
    }
}
