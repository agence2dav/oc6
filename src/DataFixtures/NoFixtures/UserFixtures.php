<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use App\Service\FixturesService;
use App\Entity\User;

class UserFixtures extends Fixture implements FixtureGroupInterface
{

    public function __construct(
        private readonly FixturesService $fixturesService,
        private readonly UserPasswordHasherInterface $hasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= $this->fixturesService->numberOfUsers(); $i++) {
            $user = new User();
            $user->setUser('user' . $i);
            $user->setEmail('d' . $i . '@d.d');
            //$password = $this->hasher->hashPassword($user, 'd');
            //$user->setPassword($password);
            $user->setPassword('$2y$10$P129uyqS/Hd4rF5J0kDcuuCvuoLOyQhurMHi1FvXGm/C2HeUAWnNC');
            $user->setRole(1);
            $manager->persist($user);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }

}
