<?php
namespace App\Controller\admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPropertyController extends AbstractController {

    private $repo;

    public function __construct(PropertyRepository $repo) {
        $this->repo = $repo;
    }

    /**
     * @Route("admin/", name="admin.property.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index() {
        $properties = $this->repo->findAll();
        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("admin/property/create", name="admin.property.new")
     */
    public function new(Request $request) {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($property);
            $em->flush();
            $this->addFlash('success', 'Nouveau bien "'.$property->getTitle().'" créé');

            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("admin/property/{id}", name="admin.property.edit", methods={"GET","POST"})
     * @param Property $prop
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Property $prop, Request $request) {
        $form = $this->createForm(PropertyType::class, $prop);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'Bien "'.$prop->getTitle().'" modifié');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/edit.html.twig', [
            'property' => $prop,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("admin/property/{id}", name="admin.property.delete", methods={"DELETE"})
     * @param Property $prop
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(Property $prop, Request $request): Response {
        if($this->isCsrfTokenValid('delete'.$prop->getId(), $request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prop);
            $em->flush();
            $this->addFlash('success', 'Bien "'.$prop->getTitle().'" supprimé');

        }
        return $this->redirectToRoute('admin.property.index');
    }

}