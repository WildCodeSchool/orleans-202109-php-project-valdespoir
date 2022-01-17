<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiteRepository;
use App\Repository\ActualityRepository;
use App\Repository\JobOfferRepository;
use App\Entity\Site;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        SiteRepository $siteRepository,
        ActualityRepository $actualityRepository,
        JobOfferRepository $jobOfferRepository,
        Site $site
    ): Response {
        $afterPictureFile = $site->$this->getAfterPictureFile();
        $sites = $siteRepository->findBySelection($afterPictureFile);

        $sites = $siteRepository->findAll();
        $actualities = $actualityRepository->findAll();
        $jobOffers = $jobOfferRepository->findAll();
        return $this->render('home/index.html.twig', [
            'sites' => $sites, 'actualities' => $actualities,
            'jobOffers' => $jobOffers
        ]);
    }
}
