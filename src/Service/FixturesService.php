<?php

declare(strict_types=1);

namespace App\Service;

//composer require fakerphp/faker
use Faker\Factory;
use Faker\Generator;
use DateTimeImmutable;

class FixturesService
{
    public Generator $faker;
    private $months = 1;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->months = mt_rand(1, 24);
    }

    private int $numberOfTricks = 10;

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

    public function generateDateInPast(): DateTimeImmutable
    {
        $now = new DateTimeImmutable();
        $dist = \DateInterval::createFromDateString($this->months . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
        //return DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $this->faker->dateTimeBetween('-6 months')->format('Y-m-d H:i:s'));
    }

    public function generateRandomDateFrom(): DateTimeImmutable
    {
        $now = new DateTimeImmutable();
        $dist = \DateInterval::createFromDateString(mt_rand(1, $this->months) . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
        //return DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $this->faker->dateTimeBetween($date->format('Y-m-d H:i:s'))->format('Y-m-d H:i:s'));
    }

    public function designations()
    {
        return $this->designations;
    }

    public function numberOfTricks()
    {
        return $this->numberOfTricks;
    }

}
