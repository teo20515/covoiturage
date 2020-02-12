<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\User;


class UserTest extends TestCase {

    protected $user;
    
    public function setUp() {
        $this->user = new User();
    }
    
    public function testNewUser() {
        $this->assertInstanceOf(User::class, $this->user);
        $this->assertNull($this->user->getId());
    }

    public function testUserNom() {
        $this->user->setNom("martin");
        $this->assertEquals("martin", $this->user->getNom());
    }

    public function testUserPrenom() {
        $this->user->setPrenom("Jean-Pierre");
        $this->assertEquals("Jean-Pierre", $this->user->getPrenom());
    }

}
