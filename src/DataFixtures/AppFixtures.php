<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\Designation;
use App\Entity\TrickDesignations;

class AppFixtures extends Fixture
{

    private int $numberOfArticles = 10;
    private array $designations =
        [
            ['Grabs', 'Mute'],
            ['Grabs', 'Sad'],
            ['Grabs', 'Indy'],
            ['Grabs', 'Stalefish'],
            ['Grabs', 'Tail grab'],
            ['Grabs', 'Nose grab'],
            ['Grabs', 'Seat belt'],
            ['Grabs', 'Truck driver'],
            ['Frontside/Backside', '180'],
            ['Frontside/Backside', '360'],
            ['Frontside/Backside', '540'],
            ['Frontside/Backside', '720'],
            ['Frontside/Backside', '900'],
            ['Frontside/Backside', '1080'],
            ['Rotations', '90'],
            ['Rotations', '270'],
            ['Rotations', '450'],
            ['Rotations', '630'],
            ['Rotations', '810'],
            ['Flip', 'FrontFlip'],
            ['Flip', 'BackFlip'],
            ['Off-center', 'Corkscrew'],
            ['Off-center', 'Rodeo'],
            ['Off-center', 'misty'],
            ['Tails', 'Nose slide'],
            ['Tails', 'Tail slide'],
            ['Old School', 'Tail slide'],
            ['Old School', 'Japan air'],
            ['Old School', 'Rocket air'],
            ['Old School', 'Backside air'],
            ['Old School', 'Method air'],
            ['Jumps', 'Switch'],
            ['Jumps', 'Rail to switch'],
            ['Jumps', 'switch to rail'],
        ];

    public function tricks(ObjectManager $manager): void
    {
        for ($i = 1; $i < $this->numberOfArticles; $i++) {
            $trick = new Trick();
            $trick->setTitle('titre ' . $i)
                ->setContent('<p>hello</p>')
                ->setImage('http://placehold.it/350x150')
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime())
                ->setStatus(1)
                ->setUser(1);
            $manager->persist($trick);
        }
        $manager->flush();
    }

    public function comments(ObjectManager $manager): void
    {
        for ($i = 1; $i < $this->numberOfArticles; $i++) {
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

    public function designations(ObjectManager $manager): void
    {
        foreach ($this->designations as [$type, $name]) {
            $designation = new Designation();
            $designation
                ->setType($type)
                ->setName($name);
            $manager->persist($designation);
        }
        $manager->flush();
    }

    public function trick_designations(ObjectManager $manager): void
    {

        $designationsRandom = array_rand($this->designations, 4);
        for ($i = 1; $i < $this->numberOfArticles; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $trick_designations = new TrickDesignations();
                $trick_designations
                    ->setTrick($i)
                    ->setDesignation($designationsRandom[$j]);
                $manager->persist($trick_designations);
            }
        }
        $manager->flush();
    }

    public function users(ObjectManager $manager): void
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

    public function load(ObjectManager $manager): void
    {
        $this->users($manager);
        $this->tricks($manager);
        $this->comments($manager);
        $this->designations($manager);
        $this->trick_designations($manager);
    }
}
