<?php

namespace App\Controller;

use App\Repository\PartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/partner", name="partner")
     */
class PartenaireController extends AbstractController
{
    /**
     * @Route("/", name="_index")
     */
    public function index(PartenaireRepository $partenaireRepository): Response
    {
        $partenaires = $partenaireRepository->findAll();
        return $this->render('partner/index.html.twig', ['partenaires' => $partenaires]);
    }
}
