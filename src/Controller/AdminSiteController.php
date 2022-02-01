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
 * @Route("/admin/realisations", name="admin_site_")
 */
class AdminSiteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SiteRepository $siteRepository): Response
    {
        return $this->render('adminSite/index.html.twig', [
            'sites' => $siteRepository->findBy([], ['title' => 'ASC']),
        ]);
    }

    /**
     * @Route("/ajouter", name="new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $site = new Site();
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($site);
            $entityManager->flush();

            $this->addFlash('success', 'La réalisation a bien été ajoutée');

            return $this->redirectToRoute('admin_site_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminSite/new.html.twig', [
            'site' => $site,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/select/{id<^[0-9]+$>}", name="select", methods={"POST"})
     * @return Response
     */
    public function select(Site $site, EntityManagerInterface $entityManager): Response
    {
        $site->setSelected(!$site->getSelected());

        $entityManager->flush();

        $this->addFlash('success', 'La modification a bien été effectuée');

        return $this->redirectToRoute('admin_site_index');
    }

    /**
     * @Route("/{id}/editer", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Site $site, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'La réalisation a bien été modifiée');

            return $this->redirectToRoute('admin_site_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adminSite/edit.html.twig', [
            'site' => $site,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/supprimer", name="delete", methods={"GET", "POST"})
     */
    public function delete(Request $request, Site $site, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $site->getId(), (string) $request->request->get('_token'))) {
            $entityManager->remove($site);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'La réalisation a bien été supprimée');

        return $this->redirectToRoute('admin_site_index', [], Response::HTTP_SEE_OTHER);
    }
}
