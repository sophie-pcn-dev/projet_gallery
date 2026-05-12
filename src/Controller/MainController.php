<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Photo;
use App\Repository\CategoryRepository;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{

    // #[Route('/', name: 'app_index', methods: ['GET'])]
    // public function index(PhotoRepository $photoRepository): Response
    // {
    //     return $this->render('main/index.html.twig');
    // }

    // #[Route('/category/{id}', name: 'app_category', methods: ['GET'])]

    #[Route('/category/{catId}', name: 'app_main', methods: ['GET'])]
    public function category(PhotoRepository $photoRepository, ?Category $catId = null): Response
    {

        if (!$catId) {
            $photos = $photoRepository->findAll();
        } else {
            $photos = $catId->getPhotos();
        }

        return $this->render('main/index.html.twig', [
            'photos' => $photos,
            
        ]);
    }
    

    #[Route('/photo/{id}', name: 'app_photo_show', methods: ['GET'])]
    public function show(Photo $photo): Response
    {
        return $this->render('main/show.html.twig', [
            'photo' => $photo,
        ]);
    }
}
