<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TarifController extends AbstractController
{
    /**
     * @Route("/tarif", name="tarif")
     */
    public function index()
    {
        return $this->render('tarif/index.html.twig', [
            'controller_name' => 'TarifController',
        ]);
    }
}
