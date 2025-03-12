<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitsRepository;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ProduitsRepository $repository): Response
    {

        return $this->render('home/index.html.twig', [
            'Produits' => $repository->findAll(),
        ]);
    }
}
