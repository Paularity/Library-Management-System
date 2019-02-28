<?php

namespace App\Controller;

use App\Entity\Faculty;
use App\Form\FacultyType;
use App\Repository\FacultyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faculty")
 */
class FacultyController extends AbstractController
{
    /**
     * @Route("/", name="faculty_index", methods={"GET"})
     */
    public function index(FacultyRepository $facultyRepository): Response
    {
        return $this->render('faculty/index.html.twig', [
            'faculties' => $facultyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="faculty_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $faculty = new Faculty();
        $form = $this->createForm(FacultyType::class, $faculty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($faculty);
            $entityManager->flush();

            return $this->redirectToRoute('faculty_index');
        }

        return $this->render('faculty/new.html.twig', [
            'faculty' => $faculty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faculty_show", methods={"GET"})
     */
    public function show(Faculty $faculty): Response
    {
        return $this->render('faculty/show.html.twig', [
            'faculty' => $faculty,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="faculty_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Faculty $faculty): Response
    {
        $form = $this->createForm(FacultyType::class, $faculty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faculty_index', [
                'id' => $faculty->getId(),
            ]);
        }

        return $this->render('faculty/edit.html.twig', [
            'faculty' => $faculty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faculty_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Faculty $faculty): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faculty->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($faculty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('faculty_index');
    }
}
