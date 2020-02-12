<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Lieu;


class LieuTest extends TestCase {
    public function testLieu() {
        $lieu = new Lieu();
        $this->assertInstanceOf(Lieu::class, $lieu);
        $this->assertNull($lieu->getId());
    }
}
