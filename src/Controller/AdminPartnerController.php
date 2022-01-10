<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/partner")
 */
class AdminPartnerController extends AbstractController
{
    /**
     * @Route("/", name="admin_partner_index", methods={"GET"})
     */
    public function index(PartenaireRepository $partenaireRepository): Response
    {
        return $this->render('admin_partner/index.html.twig', [
            'partenaires' => $partenaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_partner_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $partenaire = new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_partner/new.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_partner_show", methods={"GET"})
     */
    public function show(Partenaire $partenaire): Response
    {
        return $this->render('admin_partner/show.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_partner_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Partenaire $partenaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_partner/edit.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_partner_delete", methods={"POST"})
     */
    /*public function delete(Request $request, Partenaire $partenaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partenaire->getId(), $request->request->get('_token'))) {
            $entityManager->remove($partenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
    }*/
}
