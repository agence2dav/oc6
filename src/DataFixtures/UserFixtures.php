<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;

class UserFixtures extends Fixture
{

    private int $numberOfArticles = 10;

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            $user = new User();
            $user
                ->setName('user' . $i)
                ->setEmail('d' . $i . '@d.d')
                ->setPassword('$2y$10$P129uyqS/Hd4rF5J0kDcuuCvuoLOyQhurMHi1FvXGm/C2HeUAWnNC')
                ->setRole(1);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
