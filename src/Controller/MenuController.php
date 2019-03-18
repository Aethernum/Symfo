<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{

    public function index()
    {
        return $this->render(
            'menu/index.html.twig',
            ['user' => $this->getUser()]
        );
    }
}
