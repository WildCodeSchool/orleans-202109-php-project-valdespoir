<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiteRepository;

class PartnerController extends AbstractController
{
    /**
     * @Route("/partner", name="partner")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', ['sites']);
    }
}
