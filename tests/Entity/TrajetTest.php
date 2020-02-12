<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Trajet;
use App\Entity\Lieu;


class TrajetTest extends TestCase {
    protected $trajet;
    
    public function setUp()  {
        $this->trajet = new Trajet(); 
    }
    
    public function testTrajet() {
        $this->assertInstanceOf(Trajet::class, $this->trajet);
        $this->assertNull($this->trajet->getId());
    }

    public function testTrajetPlaces() {
        $this->trajet->setPlaces(2);
        $this->assertEquals(2, $this->trajet->getPlaces());
    }
    
    public function testTrajetDatetime() {
        $date = new \DateTime();
        $this->trajet->setDatetime($date);
        $this->assertEquals($date, $this->trajet->getDatetime());
    }

    public function testLieuDepart() {
        $lieu = new Lieu();
        $this->trajet->setLieuDepart($lieu);
        $lieu->addDepartTrajet($this->trajet);
        $this->assertEquals($lieu, $this->trajet->getLieuDepart());
        $this->assertContains($this->trajet, $lieu->getDeparttrajets());
    }
              
    public function testLieuArrivee() {
        $lieu = new Lieu();
        $this->trajet->setLieuArrivee($lieu);
        $lieu->addArriveeTrajet($this->trajet);
        $this->assertEquals($lieu, $this->trajet->getLieuArrivee());
        $this->assertContains($this->trajet, $lieu->getArriveetrajets());
    }
              
}
