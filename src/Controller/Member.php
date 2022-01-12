<?php

namespace App\Controller;

use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/member", name="member_")
 */

class MemberController extends AbstractController
{
    /**
     * @Route("/member", name="index")
     */

    public function index(MemberRepository $memberRepository): Response
    {
        $members = $memberRepository->findAll();
        return $this->render('Member/index.html.twig', ['Member' => $members]);
    }
}
