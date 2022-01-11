<?php

namespace App\Controller;

use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/partner", name="partner")
     */
class PartnerController extends AbstractController
{
    /**
     * @Route("/", name="_index")
     */
    public function index(PartnerRepository $partnerRepository): Response
    {
        $partners = $partnerRepository->findAll();
        return $this->render('partner/index.html.twig', ['partners' => $partners]);
    }
}
