<?php

namespace App\Controller;

use App\Entity\Opac;
use App\Form\OpacType;
use App\Repository\OpacRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/opac")
 * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_LIBRARIAN')")
 */
class OpacController extends AbstractController
{
    /**
     * @Route("/", name="opac_index", methods={"GET"})
     */
    public function index(OpacRepository $opacRepository): Response
    {
        return $this->render('opac/index.html.twig', [
            'opacs' => $opacRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="opac_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $opac = new Opac();
        $opac->setDateUpdated(new \DateTime());
        $form = $this->createForm(OpacType::class, $opac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($opac);
            $entityManager->flush();

            return $this->redirectToRoute('opac_index');
        }

        return $this->render('opac/new.html.twig', [
            'opac' => $opac,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opac_show", methods={"GET"})
     */
    public function show(Opac $opac): Response
    {
        return $this->render('opac/show.html.twig', [
            'opac' => $opac,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="opac_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Opac $opac): Response
    {
        $form = $this->createForm(OpacType::class, $opac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('opac_index', [
                'id' => $opac->getId(),
            ]);
        }

        return $this->render('opac/edit.html.twig', [
            'opac' => $opac,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opac_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Opac $opac): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opac->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($opac);
            $entityManager->flush();
        }

        return $this->redirectToRoute('opac_index');
    }
}
