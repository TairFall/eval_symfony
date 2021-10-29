<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\Restaurant;
use App\Entity\Proprietaire;
use App\Repository\VilleRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ProprietaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {
    /**
     * @Route("/restaurants", name="restaurants")
     * @param RestaurantRepository $restaurantRepository
     * @return Response
     */
    public function restaurants(RestaurantRepository $restaurantRepository): Response {
        return $this->render('main/index.html.twig', ['restaurants' => $restaurantRepository->findAll()]);
    }

    /**
     * @Route("/villes/{nom}", name="villes")
     * @param Ville $villes
     * @return Response
     */
    public function ville(Ville $villes): Response {
        return $this->render('main/displayville.html.twig', ["villes" => $villes]);
    }
}