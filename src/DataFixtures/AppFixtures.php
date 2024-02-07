<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FixturesService;
//use Bar\UserInterface;
use Faker;

class AppFixtures extends Fixture
{

    private array $objects = [];
    private int $numberOfArticles = 10;

    public function __construct(
        private readonly FixturesService $fixturesService,
        private readonly UserPasswordHasherInterface $hasher,
        private readonly SluggerInterface $slugger,
    ) {
    }

    public function trick_designations(ObjectManager $manager): void
    {
        $nb_designations = count($this->fixturesService->designations()) - 1;
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $trick_designations = new TrickDesignations();
                $trick_designations
                    ->setTrick($this->objects['trick'][$i])
                    ->setDesignation($this->objects['designation'][mt_rand(0, $nb_designations)]);
                $manager->persist($trick_designations);
            }
        }
        $manager->flush();
    }

    public function designations(ObjectManager $manager): void
    {
        foreach ($this->fixturesService->designations() as [$type, $name]) {
            $designation = new Designation();
            $designation
                ->setType($type)
                ->setName($name);
            $this->objects['designation'][] = $designation;
            $manager->persist($designation);
        }
        $manager->flush();
    }

    public function comments(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $comments = new Comment();
                $comments
                    ->setTrick($this->objects['trick'][$i])
                    ->setUser($this->objects['user'][$j])
                    ->setContent($this->fixturesService->faker->paragraphs(mt_rand(1, 3), true))
                    ->setStatus(rand(0, 1))
                    ->setDate($this->fixturesService->generateRandomDateFrom());
                $manager->persist($comments);
            }
        }
        $manager->flush();
    }

    public function tricks(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            $trick = new Trick();
            $title = $this->fixturesService->faker->sentence($nbWords = 4, $variableNbWords = true);
            $slug = $this->slugger->slug($title);
            $trick
                ->setUser($this->objects['user'][$i])
                ->setTitle($title)
                ->setSlug($slug->__toString())
                ->setContent($this->fixturesService->faker->paragraphs(mt_rand(4, 7), true))
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt($this->fixturesService->generateDateInPast())
                ->setUpdatedAt($this->fixturesService->generateRandomDateFrom())
                ->setStatus(1);
            $this->objects['trick'][] = $trick;
            $manager->persist($trick);
        }
        $manager->flush();
    }

    public function users(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            $user = new User();
            $password = $this->hasher->hashPassword($user, 'd');
            $user
                ->setUser($this->fixturesService->faker->username)
                ->setEmail($this->fixturesService->faker->email)
                ->setPassword($password)
                //->setPassword('$2y$10$P129uyqS/Hd4rF5J0kDcuuCvuoLOyQhurMHi1FvXGm/C2HeUAWnNC')
                ->setRole(1);
            $this->objects['user'][] = $user;
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        /* 
         */
        $this->users($manager);
        $this->tricks($manager);
        $this->comments($manager);
        $this->designations($manager);
        $this->trick_designations($manager);
    }
}
