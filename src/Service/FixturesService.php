<?php

declare(strict_types=1);

namespace App\Service;

use DateTime;
use DateInterval;
use Faker\Factory;
use Faker\Generator;

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
    private int $numberOfTricks = 44;
    private int $numberOfUsers = 4;
    public array $users = [];
    public array $tricks = [];

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
        $dist = DateInterval::createFromDateString($this->month . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
    }

    public function generateRandomDateFrom(): DateTime
    {
        $now = new DateTime();
        $dist = DateInterval::createFromDateString(mt_rand(1, $this->month) . ' months');
        $now->sub($dist);
        $now->format('Y-m-d H:i:s');
        return $now;
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
