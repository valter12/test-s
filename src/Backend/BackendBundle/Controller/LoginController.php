<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller {

    public function loginAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $user_name = $request->get('user_name');
            $password = $request->get('password');
            if($user_name == 'admin' && $password == 'bestadmin') {
                $session = $this->getRequest()->getSession();
                $session->set('auth', 'in');
                return $this->redirect($this->generateUrl('BackendBackendBundle_user'));
            }
        }
        return $this->render('BackendBackendBundle:Login:login.html.twig');
    }
    
    public function logoutAction() {
        $session = $this->getRequest()->getSession();
        $session->set('auth', false);
        return $this->render('BackendBackendBundle:Login:login.html.twig');
    }
    
    
}
