<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class DashboardController extends AbstractController
{
    /**
     * @Route("/" , name="app_dashboard")
     */    
    public function index( AuthorizationCheckerInterface $authChecker )
    {
        if (true === $authChecker->isGranted('ROLE_ADMIN') || true === $authChecker->isGranted('ROLE_LIBRARIAN')) 
        {
            return $this->render( 'dashboard/index.html.twig' );
        }
        else 
        {
            return $this->redirectToRoute('app_login');
        }
       
    }
} 