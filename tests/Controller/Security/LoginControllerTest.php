<?php

namespace App\Tests\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $client->jsonRequest('POST','/security/login', [
                'username' => 'username',
                'password' => 'password'
        ]);
        $this->assertResponseIsSuccessful();
        $result = json_decode($client->getResponse()->getContent(), true);
        $token = $result['token'];
        $this->assertIsString($token);
    }

}
