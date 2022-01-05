<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Repository\ActualityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/actuality", name="actuality_")
 */
class ActualityController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ActualityRepository $actualityRepository): Response
    {
        $actualitys = $actualityRepository
            ->findAll();
        return $this->render('actuality/index.html.twig', ['actualitys' => $actualitys]);
    }
}
