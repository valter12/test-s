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
    
    /**
     * list of users
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $users = $em->getRepository('FrontFrontBundle:User')->getAllUsers();
        return $this->render('BackendBackendBundle:User:index.html.twig', array('users' => $users));
    }
    
    public function userActionsAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $request = $this->getRequest();
        $id = $request->get('id');
        $todo = $request->get('todo');
        
        if(!is_numeric($id) || !$todo) {
            die('Request must have an id and todo variable.');
        }
        
        switch($todo) {
            case 'modify':
                break;
            case 'projects':
                break;
            case 'reports':
                break;
            case 'payments':
                break;
            case 'delete':
                break;
        }
    }

}
