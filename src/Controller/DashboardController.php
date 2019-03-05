<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractController
{
    /**
     * @Route("/" , name="app_dashboard")
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_LIBRARIAN')")
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