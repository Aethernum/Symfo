<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BilletController extends AbstractController
{
    /**
     * @Route("/billet", name="billet")
     */
    public function index()
    {
        return $this->render('billet/index.html.twig', [
            'controller_name' => 'BilletController',
        ]);
    }
}
