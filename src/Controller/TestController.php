<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function home(): Response
    {
        return new Response('<h1>Ola mundo</h1>');
    }
}
