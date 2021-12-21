<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiteRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SiteRepository $siteRepository): Response
    {
        $sites = $siteRepository->findAll();
        return $this->render('home/index.html.twig',['sites'=> $sites]);
    }
}
