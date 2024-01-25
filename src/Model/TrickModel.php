<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Trick;

class TrickModel
{
    public int $id;
    public int $uid;
    public string $title;
    public string $content;
    public string $excerpt;
    public string $category;
    public string $name;
    public string $date;
    public int $status;
    public array $results;

}
