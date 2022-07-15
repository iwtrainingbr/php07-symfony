<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Vehicle
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id, ORM\GeneratedValue()]
    public int $id;

    #[ORM\Column(length: 50)]
    public string $make;

    #[ORM\Column(length: 30)]
    public string $model;

    #[ORM\Column(type: 'integer', length: 4)]
    public int $year;
}