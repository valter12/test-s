<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth;

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
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $id = $request->get('id');
        $todo = $request->get('todo');

        $data = $em->getRepository('FrontFrontBundle:User')->getUserDataById($id);
        
        Auth::setAuth();
        Auth::setAuthParam('id', $data['id']);
        Auth::setAuthParam('f_name', $data['f_name']);
        Auth::setAuthParam('l_name', $data['l_name']);
        Auth::setAuthParam('is_trial', $data['is_trial']);
        Auth::setAuthParam('package_id', $data['package_id']);
        
        if (!is_numeric($id) || !$todo) {
            die('Request must have an id and todo variable.');
        }

        switch ($todo) {
            case 'modify':
                return $this->__modifyUser();
                break;
            case 'projects':
                return $this->__userProjects();
                break;
            case 'reports':
                break;
            case 'payments':
                break;
            case 'delete':
                break;
        }
    }

    protected function __modifyUser() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $id = $request->get('id');
        $execute_todo = $request->get('execute_todo');

        if ($execute_todo == 'save_user') {
            $em->getRepository('FrontFrontBundle:User')->updateUserData($id, $_POST);
            return $this->redirect($this->generateUrl('BackendBackendBundle_user'));
        }

        $user = $em->getRepository('FrontFrontBundle:User')->getUserDataById($id);
        $packages = $em->getRepository('FrontFrontBundle:User')->getAllPackages();
        return $this->render('BackendBackendBundle:User:modify_user.html.twig', array('user' => $user, 'packages' => $packages));
    }

    protected function __userProjects() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $id = $request->get('id');

        $projects = $em->getRepository('FrontFrontBundle:Project')->getProjects($id);
        return $this->render('BackendBackendBundle:User:user_projects.html.twig', array('project_list' => $projects));
    }

}
