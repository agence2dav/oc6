<?php

declare(strict_types=1);

namespace App\Service;

//composer require fakerphp/faker
use Faker\Factory;
use Faker\Generator;
use DateTime;

class FixturesService
{
    public Generator $faker;
    private $month = 1;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    private string $adminName = 'd';
    private string $adminMail = 'd@d.d';
    private string $password = 'd';
    private int $numberOfTricks = 10;
    private int $numberOfUsers = 4;
    public array $users = [];
    public array $tricks = [];
    public array $designation = [];

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

    private array $tags =
        [
            ['Grabs' => ['Mute', 'Sad', 'Indy', 'Stalefish', 'Tail grab', 'Nose grab', 'Seat belt', 'Truck driver']],
            ['Frontside/Backside' => ['180', '360', '540', '720', '900', '1080']],
            ['Rotations' => ['90', '270', '450', '630', '810']],
            ['Flip' => ['FrontFlip', 'BackFlip']],
            ['Off-center' => ['Corkscrew', 'Rodeo', 'misty']],
            ['Tails' => ['Nose slide', 'Tail slide']],
            ['Old School' => ['Tail slide', 'Japan air', 'Rocket air', 'Backside air', 'Method air']],
            ['Jumps' => ['Switch', 'Rail to switch', 'switch to rail']]
        ];

    public function generateDateInPast(): DateTime
    {
        $this->month = mt_rand(1, 24);
        $now = new DateTime();
        $dist = \DateInterval::createFromDateString($this->month . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
        //return DateTime::createFromFormat('Y-m-d H:i:s', $this->faker->dateTimeBetween('-6 months')->format('Y-m-d H:i:s'));
    }

    public function generateRandomDateFrom(): DateTime
    {
        $now = new DateTime();
        $dist = \DateInterval::createFromDateString(mt_rand(1, $this->month) . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
        //return DateTime::createFromFormat('Y-m-d H:i:s', $this->faker->dateTimeBetween($date->format('Y-m-d H:i:s'))->format('Y-m-d H:i:s'));
    }

    public function designations()
    {
        return $this->designations;
    }

    public function tags()
    {
        return $this->tags;
    }

    public function numberOfTricks()
    {
        return $this->numberOfTricks;
    }

    public function numberOfUsers()
    {
        return $this->numberOfUsers;
    }

    public function adminName()
    {
        return $this->adminName;
    }

    public function adminMail()
    {
        return $this->adminMail;
    }

    public function generalPassword()
    {
        return $this->password;
    }

}
