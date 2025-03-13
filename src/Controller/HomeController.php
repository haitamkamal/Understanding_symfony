<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitsRepository;
use App\Entity\Produits;
use App\Form\MembersType;
use Doctrine\ORM\EntityManagerInterface;

final class HomeController extends AbstractController
{
    #[Route('/products', name: 'app_home')]
    public function index(ProduitsRepository $repository): Response
    {

        return $this->render('home/index.html.twig', [
            'Produits' => $repository->findAll(),
        ]);
    }

    #[Route('/members/{id<\d+>}', name:'product_show')]
    public function show(Produits $produits): Response {

        return $this ->render('home/show.html.twig',[
            'Produit' => $produits
        
        ]);
    }
    #[Route('/new/members',name:'new_memeber')]
    public function new(Request $request, EntityManagerInterface $manager) :Response {

        $produits = new Produits;
        $form = $this->createForm(MembersType::class, $produits);
        $form =  $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            $manager-> persist($produits);
            $manager->flush();
            
            return $this->redirectToRoute('app_home');
        }
        return $this ->render('home/new.html.twig',[
            'form' => $form, 
        ]);
    }
}
