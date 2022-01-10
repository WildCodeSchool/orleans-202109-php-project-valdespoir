<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiteRepository;
use App\Repository\ActualityRepository;
use App\Repository\JobOfferRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        SiteRepository $siteRepository,
        ActualityRepository $actualityRepository,
        JobOfferRepository $jobOfferRepository
    ): Response {
        $sites = $siteRepository->findAll();
        $actualities = $actualityRepository->findAll();
        $jobOffers = $jobOfferRepository->findAll();
        return $this->render('home/index.html.twig', [
            'sites' => $sites, 'actualities' => $actualities,
            'jobOffers' => $jobOffers
        ]);
    }
}
