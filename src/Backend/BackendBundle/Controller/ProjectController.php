<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }

    /**
     * project stats
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $project_stats = $em->getRepository('FrontFrontBundle:Project')->getProjectStats();
        return $this->render('BackendBackendBundle:Project:index.html.twig', array('project_stats' => $project_stats));
    }

}
