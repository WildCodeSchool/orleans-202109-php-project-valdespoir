<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/partenaires", name="category")
*/
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="_index")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('partner/index.html.twig', ['categories' => $categories]);
    }
}
