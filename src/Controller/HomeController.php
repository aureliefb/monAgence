<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

     /**
     * @return Response
     * @Route("/", name="home")
     */
    public function index(PropertyRepository $repo): Response {

        $all_prop = $repo->findLatest();
        dump($all_prop);
        return $this->render('pages/home.html.twig', [
            'properties' => $all_prop
        ]);
    }

}