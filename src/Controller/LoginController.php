<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class LoginController
{
    public function login(): Response
    {
        return new Response('<h1>Login</h1>');
    }
}