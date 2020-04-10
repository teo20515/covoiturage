<?php


namespace App\Controller;


use App\Entity\Trajet;
use App\Repository\LieuRepository;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrajetController extends AbstractController
{
    public function add() {

        $lieuRepository = new LieuRepository();
        $request = new Request();
        //Si on ne trouve aucun Lieu
        if (!$lieuRepository->findAll()) {
            return $this->redirectToRoute("new_lieu");
        }

        $path = new Trajet();
        $form = $this->createForm(Trajet::class, $path);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $path->setDriver($user);
            $path->setLeftSeats($path->getSeats());

            $entityManager->persist($path);
            $entityManager->flush();
        }
    }

}