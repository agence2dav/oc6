<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\DesignationFixtures;
use App\Entity\TrickDesignations;

class TrickDesignationsFixtures extends Fixture
{

    private int $numberOfArticles = 10;

    function __construct(
        //DesignationFixtures $designationFixtures
    ) {
    }

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

    public function load(ObjectManager $manager): void
    {
        //$designations = $this->designationFixtures->designations;
        $designationsRandom = array_rand($this->designations, 4);
        for ($i = 0; $i < $this->numberOfArticles; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $trick_designations = new TrickDesignations();
                $trick_designations
                    ->setTrickid($i)
                    ->setDesignationid($designationsRandom[$j]);
                $manager->persist($trick_designations);
            }
        }
        $manager->flush();
    }
}
