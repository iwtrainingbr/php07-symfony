<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Category
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id, ORM\GeneratedValue()]
    public int $id;

    #[ORM\Column(length: 50)]
    public string $name;

    #[ORM\Column()]
    public string $description;

    #[ORM\Column()]
    public string $photo;
}