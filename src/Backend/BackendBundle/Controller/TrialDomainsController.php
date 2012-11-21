<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrialDomainsController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }

    /**
     * trial domains
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $todo = $request->get('todo');
        switch ($todo) {
            case 'delete':
                $id = $request->get('id');
                $em->getRepository('FrontFrontBundle:Project')->deleteTrialDomain($id);
                return $this->redirect($this->generateUrl('BackendBackendBundle_trial_domains'));
                break;
        }
        
        $trial_domains = $em->getRepository('FrontFrontBundle:Project')->getTrialDomains();
        return $this->render('BackendBackendBundle:TrialDomains:index.html.twig', array('trial_domains' => $trial_domains));
    }

}
