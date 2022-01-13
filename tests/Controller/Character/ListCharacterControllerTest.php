<?php declare(strict_types=1);

namespace App\Tests\Controller\Character;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListCharacterControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/characters', [], ['X-AUTH-TOKEN' => $this->getToken($client)]);
        $this->assertResponseIsSuccessful();
        $result = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(1, $result);
        $this->assertCount(3, $result[0]['skills']);
        $this->assertSame('M', $result[0]['sex']);
    }

    private function getToken(KernelBrowser $client): string
    {
        $client->jsonRequest('POST', '/security/login', [
            'username' => 'username',
            'password' => 'password'
        ]);
        $result = json_decode($client->getResponse()->getContent(), true);
        return $result['token'];
    }

}