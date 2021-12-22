<?php

namespace App\Controller;

use App\Entity\Site;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/site", name="site_")
 */
class SiteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $sites = $this->getDoctrine()
            ->getRepository(Site::class)
            ->findAll();
        return $this->render('site/index.html.twig', ['sites' => $sites]);
    }

    /**
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @return Response
     */
    public function show(Site $site): Response
    {
        return $this->render('site/show.html.twig', ['site' => $site]);
    }
}
