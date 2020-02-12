<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Lieu;


class LieuTest extends TestCase {
    protected $lieu;
    public function setUp()  {
        $this->lieu = new Lieu(); 
    }
    public function testLieu() {
        $this->assertInstanceOf(Lieu::class, $this->lieu);
        $this->assertNull($this->lieu->getId());
    }
}
