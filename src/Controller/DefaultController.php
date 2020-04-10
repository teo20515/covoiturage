<?php


namespace App\Controller;


class DefaultController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function index(){
        return $this->render('default/index.html.twig');
    }
}