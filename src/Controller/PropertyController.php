<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

    public function __construct(PropertyRepository $repo) {
        $this->repo = $repo;
    }

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index(): Response {

        /*$property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(200000)
            ->setRooms(4)
            ->setBedrooms(3)
            ->setDescription('A saisir')
            ->setSurface(60)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Marseille')
            ->setAdress('46 boulevard Sicard')
            ->setPostalCode(13008);
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);    // persistance des changements
        $em->flush();   // envoi vers la bdd
    */
        //$em = $this->getDoctrine()->getManager();
        //$prop = $this->repo->findAllVisible();
        //$prop[3]->setSold(true);
        //dump($prop);
        //$em->flush();
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'

        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug":"[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Property $property, string $slug) :Response {
        //$property = $this->repo->find($id);

        if($property->getSlug() !== $slug) {
            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }
}