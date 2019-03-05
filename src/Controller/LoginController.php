<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Repository\StudentRepository;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authChecker, StudentRepository $studentRepository): Response
    {
        if (true === $authChecker->isGranted('ROLE_ADMIN') || true === $authChecker->isGranted('ROLE_LIBRARIAN')) 
        {
            return $this->redirectToRoute('app_dashboard');
        }
        else 
        {
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'students' => $studentRepository->findAll() ]);
        }
    }
}
