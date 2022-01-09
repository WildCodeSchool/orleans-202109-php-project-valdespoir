<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiteRepository;
use App\Repository\ActualityRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SiteRepository $siteRepository, ActualityRepository $actualityRepository): Response
    {
        $sites = $siteRepository->findAll();
        $actualities = $actualityRepository->findAll();
        return $this->render('home/index.html.twig', ['sites' => $sites, 'actualities' => $actualities]);
    }
}
