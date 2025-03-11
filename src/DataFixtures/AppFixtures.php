<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produits; // Make sure the correct entity is imported

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create the first product
        $produit = new Produits(); // Use Produits here, not Product
        $produit->setUsename("Haitam");
        $produit->setEmail("Haitam@gmail.com");
        $produit->setPassword(123);
        $produit->setSize(200);

        $manager->persist($produit);

        // Create the second product
        $produit = new Produits(); // Use Produits here as well
        $produit->setUsename("Ali");
        $produit->setEmail("ali@gmail.com");
        $produit->setPassword(123);
        $produit->setSize(150);

        $manager->persist($produit);

        // Save the changes to the database
        $manager->flush();
    }
}
