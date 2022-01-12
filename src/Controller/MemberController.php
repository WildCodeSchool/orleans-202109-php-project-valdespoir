<?php

namespace App\Controller;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/association", name="member_")
 */

class MemberController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index(MemberRepository $memberRepository): Response
    {
        $members = $memberRepository->findAll();
        return $this->render('member/index.html.twig', ['members' => $members]);
    }
}
