<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job_offer", name="job_offer_")
 */
class JobOfferController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(JobOfferRepository $jobOfferRepository): Response
    {
        $jobOffers = $jobOfferRepository->findAll();
        return $this->render('job_offer/index.html.twig', ['jobOffers' => $jobOffers,]);
    }

    /**
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @return Response
     */
    public function show(JobOffer $jobOffer): Response
    {
        return $this->render('job_offer/show.html.twig', ['job_offer' => $jobOffer]);
    }
}
