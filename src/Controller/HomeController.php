<?php

namespace App\Controller;

use App\Entity\Banner;
use App\Entity\Footer;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $banner = $this->entityManager->getRepository(Banner::class)->findAll();
        $work = $this->entityManager->getRepository(News::class)->findAll();
        $footer = $this->entityManager->getRepository(Footer::class)->findAll();

        return $this->render('home/index.html.twig', [
            'images' => $banner,
            'works' => $work,
            'footers' => $footer,
        ]);
    }
}
