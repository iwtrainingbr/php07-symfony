<?php

declare(strict_types=1);

namespace App\Tests\Api\Product;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductTest extends WebTestCase
{
    public function testGetProductsOk(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/produtos');

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(200);
    }

    public function testDeleteProductOk(): void
    {
        $client = static::createClient();

        $client->request('DELETE', '/api/produtos/1');

        $this->assertResponseIsSuccessful();
    }

    public function testPostProductOk(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/produtos', [], [], [
            'json' => [
                'name' => 'Novo Produto',
                'description' => 'Desc do produto',
                'price' => 123.12
            ]
        ]);
    }
}