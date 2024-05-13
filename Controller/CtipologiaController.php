<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CtipologiaController extends AbstractController
{
    #[Route('/ctipologia', name: 'app_ctipologia')]
    public function index(): Response
    {
        return $this->render('ctipologia/index.html.twig', [
            'controller_name' => 'CtipologiaController',
        ]);
    }
}
