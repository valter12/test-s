<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

/**
 * User controller.
 *
 */
class AccountController extends Controller {

    
    public function __construct() {
        if(!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
    }

    /**
     * 
     * @return type
     * routing dashboard
     */
    public function dashboardAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        return $this->render('FrontFrontBundle:Account:dashboard.html.twig');
    }

    
}
