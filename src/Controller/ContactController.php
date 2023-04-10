<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'contact')]
    public function index(Request $request): Response
    {

        $contact = new Contact();

        if ($request->isMethod('POST')) {
            $contact->setNomClient($request->request->get('name'));
            $contact->setObjet($request->request->get('objet'));
            $contact->setMessage($request->request->get('message'));
            $contact->setEmailClient($request->request->get('email'));

            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            var_dump($contact->getCreatedAt());

        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
