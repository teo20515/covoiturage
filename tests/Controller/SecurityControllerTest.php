<?php
namespace App\Tests\Controller;

// use PHPUnit\Framework\TestCase;
use DOMElement;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase {

    public function testLogin() {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    public function testLogout() {
        $client = static::createClient();
        $client->request('GET', '/logout');
        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testRegister(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        self::assertEquals(200, $client->getResponse()->getStatusCode());

        $form = $crawler->selectButton('Créer le compte')->form();
        $client->submit($form);
        self::assertEquals(Response::HTTP_NOT_ACCEPTABLE, $client->getResponse()->getStatusCode());
    }

    public function testCreateUser(){
        $client = static::createClient();
        $client->request('GET', '/createUser');
        self::assertEquals(Response::HTTP_NOT_ACCEPTABLE, $client->getResponse()->getStatusCode());
    }

}
