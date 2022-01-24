<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/actualites", name="actuality_")
 */
class ActualityController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualities = $actualityRepository
            ->findAll();
        return $this->render('actuality/index.html.twig', ['actualities' => $actualities]);
    }

    /**
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @return Response
     */
    public function show(Actuality $actuality): Response
    {
        return $this->render('actuality/show.html.twig', ['actuality' => $actuality]);
    }
}
