<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use App\Repository\ActualityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/actualites", name="admin_actuality_")
 */
class AdminActualityController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('adminActuality/index.html.twig', [
            'actualities' => $actualityRepository->findBy([], ['date' => 'DESC']),
        ]);
    }

    /**
     * @Route("/ajouter", name="new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actuality = new Actuality();
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actuality);
            $entityManager->flush();

            $this->addFlash('success', 'L\'actualité a bien été ajoutée');
            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminActuality/new.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/select/{id<^[0-9]+$>}", name="select", methods={"POST"})
     * @return Response
     */
    public function select(Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        $actuality->setSelected(!$actuality->getSelected());

        $entityManager->flush();

        $this->addFlash('success', 'La modification a bien été effectuée');

        return $this->redirectToRoute('admin_actuality_index');
    }

    /**
     * @Route("/{id}/editer", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActualityType::class, $actuality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'L\'actualité a bien été modifiée');

            return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminActuality/edit.html.twig', [
            'actuality' => $actuality,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/supprimer", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Actuality $actuality, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $actuality->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($actuality);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'L\'actualité a bien été supprimée');

        return $this->redirectToRoute('admin_actuality_index', [], Response::HTTP_SEE_OTHER);
    }
}
