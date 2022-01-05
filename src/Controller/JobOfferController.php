<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobOfferController extends AbstractController
{
    /**
     * @Route("/job-offer", name="job_offer")
     */
    public function index(JobOfferRepository $jobOfferRepository): Response
    {
        $jobOffers = $jobOfferRepository->findAll();
        return $this->render('job_offer/index.html.twig', ['jobOffers' => $jobOffers,]);
    }
}
