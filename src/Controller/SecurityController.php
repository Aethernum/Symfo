<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        
        if(!$this->isgranted('IS_AUTHENTICATED_FULLY')){
                        // get the login error if there is one
                        $error = $authenticationUtils->getLastAuthenticationError();
                        // last username entered by the user
                        $lastUsername = $authenticationUtils->getLastUsername();
                        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'name' => 'Espace de connexion']);
        } else {
            return $this->redirect('compte/'.$this->getUser()->getUsername());
        }
    }
}
