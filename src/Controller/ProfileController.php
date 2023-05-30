<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/profil', name: 'profil_app')]
class ProfileController extends AbstractController
    {
        #[Route('/commandes', name: 'orders')]
        public function index(): Response
        {
            return $this->render('main/index.html.twig', [
                'controller_name' => 'Commande de l\'utlisateur',
            ]);
        }

        #[Route('/', name: 'index')]
        public function orders(): Response
        {
            return $this->render('main/index.html.twig', [
                'controller_name' => 'Profil de l\'utlisateur',
            ]);
        }
    }