<?php


namespace App\Controller;


use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    public function index() {

        // On récupère l'user connecté et on va sur le twig de l'accueil

        // En attendant
        return $this->render('accueil/accueil.html.twig');

    }
}