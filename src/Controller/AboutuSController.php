<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutuSController extends AbstractController
{
    #[Route('/about_us', name: 'about_us')]
    public function index(): Response
    {
        return $this->render('aboutUs/index.html.twig', [
            'controller_name' => 'AboutuSController',
        ]);
    }
}
