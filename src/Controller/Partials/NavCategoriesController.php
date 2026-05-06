<?php
namespace App\Controller\Partials;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NavCategoriesController extends AbstractController {
    
    public function getCategories(CategoryRepository $categoryRepository ): Response{
        return $this->render('partials/_nav_categories.html.twig', [

            'categories' => $categoryRepository->findAll(),

        ]);
    }

}