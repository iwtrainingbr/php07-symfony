<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    private EntityManager $doctrine;
    private ObjectRepository $repository;

    public function __construct(ManagerRegistry $doctrine) 
    {
        $this->doctrine = $doctrine->getManager();
        $this->repository = $doctrine->getRepository(Product::class);
    }

    public function get(): JsonResponse
    {
        return new JsonResponse(
            $this->repository->findAll()
        );
    }

    public function post(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent());

        $prod = new Product(
            $data->name,
            $data->description,
            $data->price
        );

        $this->doctrine->persist($prod);
        $this->doctrine->flush();

        return new JsonResponse($prod);
    }

    public function patch(int $id, Request $request): JsonResponse
    {
        //recupera os dados enviados pelo cliente/frontend
        $data = json_decode($request->getContent());

        //busca o produto do id passado
        $prod = $this->repository->find($id);

        //atualiza apenas os dados que foram solicitado a atualização
        $prod->name = $data->name ?? $prod->name;
        $prod->description = $data->description ?? $prod->description;
        $prod->price = $data->price ?? $prod->price;

        //aqui a gente salva
        $this->doctrine->persist($prod);
        $this->doctrine->flush();

        return new JsonResponse($prod);
    }

    public function delete(int $id): JsonResponse
    {
        //buscar o produto daquele id
        $prod = $this->repository->find($id);

        $this->doctrine->remove($prod);
        $this->doctrine->flush();

        return new JsonResponse(null);
    }
}