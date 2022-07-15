<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Vehicle;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleController extends AbstractController
{
    public function get(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Vehicle::class);

        return new JsonResponse(
            $repository->findAll()
        );
    }

    public function post(Request $request, ManagerRegistry $doctrine): Response
    {
        //transforma o json recebido, em um objeto do PHP
        $data = json_decode($request->getContent());

        $vehicle = new Vehicle();
        $vehicle->make = $data->make;
        $vehicle->model = $data->model;
        $vehicle->year = $data->year;

        $doctrine->getManager()->persist($vehicle);
        $doctrine->getManager()->flush();

        return new JsonResponse($vehicle);
    }

    public function patch(): Response
    {
        return new Response('Editando veiculo');
    }

    public function delete(int $id, ManagerRegistry $doctrine): Response
    {
        //buscar se existe o veiculo
        $vehicle = $doctrine->getRepository(Vehicle::class)->find($id);

        $doctrine->getManager()->remove($vehicle);
        $doctrine->getManager()->flush();


        return new JsonResponse([
            'message' => 'Veiculo excluido',
        ], 204);
    }
}