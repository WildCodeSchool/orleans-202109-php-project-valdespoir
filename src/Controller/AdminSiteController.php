<?php

namespace App\Controller;

use App\Entity\Site;
use App\Form\SiteType;
use App\Repository\SiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin-chantier", name="admin-chantier_")
 */
class AdminSiteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SiteRepository $siteRepository): Response
    {
        return $this->render('adminSite/index.html.twig', [
            'sites' => $siteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $site = new Site();
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($site);
            $entityManager->flush();

            $this->addFlash('success', 'Le chantier a bien été ajouté');

            return $this->redirectToRoute('admin-chantier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('/adminSite/new.html.twig', [
            'site' => $site,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/afficher/{id<^[0-9]+$>}", name="afficher")
     * @return Response
     */
    public function show(Site $site): Response
    {
        return $this->render('adminSite/show.html.twig', [
            'site' => $site,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="modifier", methods={"GET", "POST"})
     */
    public function edit(Request $request, Site $site, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Le chantier a bien été modifié');

            return $this->redirectToRoute('admin-chantier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminSite/edit.html.twig', [
            'site' => $site,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/supprimer", name="supprimer", methods={"GET", "POST"})
     */
    public function delete(Request $request, Site $site, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $site->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($site);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'Le chantier a bien été supprimé');

        return $this->redirectToRoute('admin-chantier_index', [], Response::HTTP_SEE_OTHER);
    }
}
