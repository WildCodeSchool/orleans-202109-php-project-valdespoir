<?php

namespace App\Controller;

use App\Entity\Partner;
use App\Form\PartnerType;
use App\Repository\PartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/partenaires", name="admin_partner_")
 */
class AdminPartnerController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PartnerRepository $partnerRepository): Response
    {
        return $this->render('admin_partner/index.html.twig', [
            'partners' => $partnerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajouter", name="new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($partner);
            $entityManager->flush();
            $this->addFlash('succes', 'Le partenaire a bien été ajouté');

            return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_partner/new.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }
    /**
     * @Route("/{id}/editer", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Partner $partner, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('succes', 'Le partenaire a bien été modifié');
            return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('admin_partner/edit.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/supprimer", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Partner $partner, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $partner->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($partner);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin_partner_index', [], Response::HTTP_SEE_OTHER);
    }
}
