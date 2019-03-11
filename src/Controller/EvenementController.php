<?php

namespace App\Controller;

use App\Form\EvenementType;
use App\Entity\Evenement;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="evenement")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {

        $evenement = new Evenement();

        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($evenement);
            $entityManager->flush();
            return $this->redirectToRoute("evenement");
        }

        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
            'form'=>$form->createView(),
        ]);
    }
}
