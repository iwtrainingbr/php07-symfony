<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\Response;

class CategoryController
{
    public function get(): Response
    {
        return new Response('Buscando categorias');
    }

    public function post(): Response
    {
        return new Response('Cadastrando categoria');
    }

    public function patch(): Response
    {
        return new Response('Editando categoria');
    }

    public function delete(): Response
    {
        return new Response('Delete categorias');
    }
}