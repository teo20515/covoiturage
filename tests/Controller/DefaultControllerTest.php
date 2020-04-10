<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase {
  public function testHomePage() {
    $client = static::createClient();
    $crawler = $client->request('GET','/');

    $this->assertEquals(200, $client->getResponse()->getStatusCode());

    $this->assertSelectorExists('a[href="/login"]');
    $this->assertSelectorExists('a[href="/register"]');
  }

  public function testHomePageUser() {
    $client = static::createClient([], [
      'PHP_AUTH_USER' => 'username',
      'PHP_AUTH_PW' => 'password',
    ]);
    $client->request('GET', '/');
    //    $client->links();
    $this->assertSelectorNotExists('a[href="/logout"]');
    $this->assertSelectorExists('a[href="/login"]');
  }

}



?>
