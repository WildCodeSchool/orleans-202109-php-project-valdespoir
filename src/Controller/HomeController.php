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
        $sites = $siteRepository->findBySelected(true);
        $actualities = $actualityRepository->findBySelected(true);
        $jobOffers = $jobOfferRepository->findAll();
        return $this->render('home/index.html.twig', [
            'sites' => $sites, 'actualities' => $actualities,
            'jobOffers' => $jobOffers
        ]);
    }

    /**
     * @Route("/mentions-legales", name="legal")
     */
    public function legalNotice(): Response
    {
        return $this->render('legal_notice/index.html.twig');
    }
}
