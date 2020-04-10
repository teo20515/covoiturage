<?php


namespace App\Controller;


use App\Entity\Lieu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class LieuController extends AbstractController
{
    public function index() {
        return $this->render('lieu/addLieu.html.twig');
    }

    public function add(Request $request) {
        $entity = new Lieu();
        $form = $this->createForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('index'));
        }
    }
}