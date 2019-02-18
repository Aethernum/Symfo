<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeEvenementController extends AbstractController
{
    /**
     * @Route("/type/evenement", name="type_evenement")
     */
    public function index()
    {
        return $this->render('type_evenement/index.html.twig', [
            'controller_name' => 'TypeEvenementController',
        ]);
    }
}
