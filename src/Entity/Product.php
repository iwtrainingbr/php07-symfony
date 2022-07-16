<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Product
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id, ORM\GeneratedValue()]
    public int $id;

    #[ORM\Column(length: 50)]
    public string $name;

    #[ORM\Column(length: 255)]
    public string $description;

    #[ORM\Column(type: 'float')]
    public float $price;

    public function __construct(string $name, string $description, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}