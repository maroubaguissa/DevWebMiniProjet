<?php

namespace App\Controller;

use App\Entity\Trajet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\component\HttpFoundation\response;
use App\Form\TrajetType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class TrajetController extends AbstractController
{

/**
 * Lister tous les trajets.
 * @Route("/trajet/", name="trajet.list")
 * @return Response
 */
public function list() : Response
{
    $trajets = $this->getDoctrine()->getRepository(Trajet::class)->findAll();
    return $this->render('trajet/list.html.twig', [
    'trajets' => $trajets,
    ]);
}

/**
 * Chercher et afficher un trajet.
 * @Route("/trajet/{id}", name="trajet.show", requirements={"id" = "\d+"})
 * @param Trajet $trajet
 * @return Response
 */
public function show(Trajet $trajet) : Response
{
 return $this->render('trajet/show.html.twig', [
 'trajet' => $trajet,
 ]);
}

/**
 * Créer un nouveau trajet.
 * @Route("/nouveau-trajet", name="trajet.create")
 * @param Request $request
 * @param EntityManagerInterface $em
 * @return RedirectResponse|Response
 */
public function create(Request $request, EntityManagerInterface $em) : Response
{
 $trajet = new Trajet();
 $form = $this->createForm(TrajetType::class, $trajet);
 $form->handleRequest($request);
 if ($form->isSubmitted() && $form->isValid()) {
 $em->persist($trajet);
 $em->flush();
 return $this->redirectToRoute('trajet.list');
 }
 return $this->render('trajet/create.html.twig', [
 'form' => $form->createView(),
 ]);
}

/**
 * Éditer un trajet.
 * @Route("trajet/{id}/edit", name="trajet.edit")
 * @param Request $request
 * @param EntityManagerInterface $em
 * @return RedirectResponse|Response
 */
public function edit(Request $request, Trajet $trajet, EntityManagerInterface $em) : Response
{
 $form = $this->createForm(TrajetType::class, $trajet);
 $form->handleRequest($request);
 if ($form->isSubmitted() && $form->isValid()) {
 $em->flush();
 return $this->redirectToRoute('trajet.list');
 }
 return $this->render('trajet/create.html.twig', [
 'form' => $form->createView(),
 ]);
}

/**
 * Supprimer un trajet.
 * @Route("trajet/{id}/delete", name="trajet.delete")
 * @param Request $request
 * @param Trajet $trajet
 * @param EntityManagerInterface $em
 * @return Response
 */
public function delete(Request $request, Trajet $trajet, EntityManagerInterface $em) : Response
{
 $form = $this->createFormBuilder()
 ->setAction($this->generateUrl('trajet.delete', ['id' => $trajet->getId()]))
 ->getForm();
 $form->handleRequest($request);
 if ( ! $form->isSubmitted() || ! $form->isValid()) {
 return $this->render('trajet/delete.html.twig', [
 'trajet' => $trajet,
 'form' => $form->createView(),
 ]);
 }
 $em = $this->getDoctrine()->getManager();
 $em->remove($trajet);
 $em->flush();
 return $this->redirectToRoute('trajet.list');
}
}
