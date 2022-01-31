<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Form\JobOfferType;
use App\Repository\JobOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/emplois", name="adminJob_offer_")
 */
class AdminJobOfferController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(JobOfferRepository $jobOfferRepository): Response
    {
        return $this->render('adminJob_offer/index.html.twig', [
            'job_offers' => $jobOfferRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajouter", name="new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jobOffer = new JobOffer();
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jobOffer);
            $entityManager->flush();

            $this->addFlash('success', 'L\'offre d\'emploi a bien été ajoutée !');

            return $this->redirectToRoute('adminJob_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminJob_offer/new.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/select/{id<^[0-9]+$>}", name="select", methods={"POST"})
     * @return Response
     */
    public function select(JobOffer $jobOffer, EntityManagerInterface $entityManager): Response
    {
        $jobOffer->setSelected(!$jobOffer->getSelected());

        $entityManager->flush();

        $this->addFlash('success', 'La modification a bien été effectuée');

        return $this->redirectToRoute('adminJob_offer_index');
    }

    /**
     * @Route("/{id}/editer", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, JobOffer $jobOffer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'L\'offre d\'emploi a bien été modifiée');

            return $this->redirectToRoute('job_offer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminJob_offer/edit.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, JobOffer $jobOffer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $jobOffer->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($jobOffer);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'L\'offre d\'emploi a bien été supprimée');

        return $this->redirectToRoute('job_offer_index', [], Response::HTTP_SEE_OTHER);
    }
}
