<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index(EvenementRepository $evenementRepository)
    {
        return $this->render('home/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'name' => 'Accueil',
        ]);

        
    }
}
