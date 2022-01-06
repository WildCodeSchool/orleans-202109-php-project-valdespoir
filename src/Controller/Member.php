<?php

namespace App\Controller;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Member", name="Member_")
 */

class MemberController extends AbstractController
{

    /**
     * @Route("/Member", name="index")
     */

    public function index(MemberRepository $MemberRepository): Response
    {
       $Members = $MemberRepository->findAll();
       return $this->render('Member/index.html.twig', ['Member' => $Members]);
    }
}
