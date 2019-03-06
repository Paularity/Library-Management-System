<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Student;
use App\Entity\Staff;
use App\Entity\Faculty;
use App\Entity\Opac;
use App\Form\BookType;
use App\Repository\BookRepository;
use App\Repository\OpacRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/homepage")
 */
class FrontendController extends AbstractController
{
    /**
     * @Route("/", name="frontend")
     */
    public function index(BookRepository $bookRepository, OpacRepository $opacRepository): Response
    {
        return $this->render('frontend/index.html.twig', [
            'books' => $bookRepository->findAll(),
            'opac'  => $opacRepository->findAll()
        ]);
    }

    /**
     * @Route("/student", name="frontend_student")
     */
    public function student()
    {
        return $this->render('frontend/student.html.twig');
    }

    /**
     * @Route("/staff", name="frontend_staff")
     */
    public function staff()
    {
        return $this->render('frontend/staff.html.twig');
    }

    /**
     * @Route("/faculty", name="frontend_faculty")
     */
    public function faculty()
    {
        return $this->render('frontend/faculty.html.twig');
    }

    /**
     * @Route("/{id}", name="book_reserve", methods={"POST"})
     */
    public function reserve(Request $request, $id): Response
    {
        $opac = new Opac();
        $opac->setBookId( $id );
        $opac->setStatus("reserved");
        $opac->setDateUpdated(new \DateTime());
        $opac->setDateCreated(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($opac);
        $entityManager->flush();
        
        return $this->redirectToRoute('frontend');
    }

    /**
     * @Route("/{id}", name="book_borrow", methods={"POST"})
     */
    public function borrow(Request $request, $id): Response
    {
        $opac = new Opac();
        $opac->setBookId( $id );
        $opac->setStatus("borrowed");
        $opac->setDateUpdated(new \DateTime());
        $opac->setDateCreated(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($opac);
        $entityManager->flush();
        
        return $this->redirectToRoute('frontend');
    }

    /**
     * @Route("/{id}", name="frontend_show", methods={"GET"})
     */
    public function show(Book $book): Response
    {
        return $this->render('frontend/show.html.twig', [
            'book' => $book,
        ]);
    }
}
