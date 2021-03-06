<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Exception\NotImplementedException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    public function register()
    {
        return $this->render('security/register.html.twig');
    }

    public function createUser(Request $request, UserPasswordEncoderInterface $passwordEncoder, CsrfTokenManagerInterface $tokenManager){

        $token = new CsrfToken('register', $request->request->get('_csrf_token'));
        if(!$tokenManager->isTokenValid($token) || $request->request->count() !== 0){
            return new Response('UNACCEPTABLE',Response::HTTP_NOT_ACCEPTABLE);
        }

        $username = $request->request->get('newUsername');
        $password = $request->request->get('newPassword');
        $nom = $request->request->get('newLastName');
        $prenom = $request->request->get('newFirstName');
        $email = $request->request->get('newEmail');

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($passwordEncoder->encodePassword($user, $password));
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('app_login');
    }
    
}
