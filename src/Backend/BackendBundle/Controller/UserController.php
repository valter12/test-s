<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }
    
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }

        
        
        return $this->render('BackendBackendBundle:User:index.html.twig');
    }

}
