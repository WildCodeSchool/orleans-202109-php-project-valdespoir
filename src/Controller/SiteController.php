<?php

namespace App\Controller;

use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/site", name="site")
     */
    public function index(SiteRepository $siteRepository): Response
    {
        $sites = $siteRepository->findAll();
        return $this->render('site/index.html.twig', ['sites' => $sites]);
    }
}
