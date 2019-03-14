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
use Symfony\Component\Validator\Constraints\DateTime;

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
        $borrow_date = StrToTime ('2019-03-14 16:57:42');
        $due_date = StrToTime ('2019-03-14 24:01:42');

        $result = $due_date - $borrow_date;
        
        $hours = $result / ( 60 * 60 );

        $penalty = 2 * ($hours);

        echo "<script>console.log('Time Penalty: {$hours}, Penalty to be paid: {$penalty}.00 pesos');</script>";

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
        $opac->setDateUpdated(new \DateTime()); //return date
        $opac->setDateCreated(new \DateTime()); //borrow date
        $opac->setDateDue(new \DateTime()); //
        $opac->setPenalty(0.00);

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

    function calculate_penalty( $borrow_date, $due_date )
    {
        $penalty_per_hour = 2;
        $diff = $due_date->diff($borrow_date);

        return $diff->format('%a Day and %h hours');
    }
}
