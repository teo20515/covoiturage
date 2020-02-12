<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\User;


class UserTest extends TestCase {
    public function testNewUser() {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
        $this->assertNull($user->getId());
    }

    public function testUserNom() {
        $user = new User();
        $user->setNom("martin");
        $this->assertEquals("martin", $user->getNom());
    }
}
