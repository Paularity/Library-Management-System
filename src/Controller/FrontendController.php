<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/frontend")
 */
class FrontendController extends AbstractController
{
    /**
     * @Route("/", name="frontend")
     */
    public function index()
    {
        return $this->render('frontend/index.html.twig');
    }

    /**
     * @Route("/student", name="frontend_student")
     */
    public function student()
    {
        return $this->render('frontend/index.html.twig');
    }

    /**
     * @Route("/staff", name="frontend_staff")
     */
    public function staff()
    {
        return $this->render('frontend/index.html.twig');
    }

        /**
     * @Route("/faculty", name="frontend_faculty")
     */
    public function faculty()
    {
        return $this->render('frontend/index.html.twig');
    }
}
