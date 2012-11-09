<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class AccountController extends Controller {

    /**
     * 
     * @return type
     * routing dashboard
     */
    public function dashboardAction() {
        if(!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        return $this->render('FrontFrontBundle:Account:dashboard.html.twig');
    }

    
}
