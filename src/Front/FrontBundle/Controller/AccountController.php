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
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $cnt_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
        if (!$cnt_projects) {
            return $this->render('FrontFrontBundle:Account:dashboard_void.html.twig');
        }
        $percentage = $cnt_projects+100/Auth::getMaxDomains();
        $cnt_reports = $em->getRepository('FrontFrontBundle:ProjectReport')->cntReports(Auth::getAuthParam('id'));

        return $this->render('FrontFrontBundle:Account:dashboard.html.twig', array('percentage' => $percentage, 'projects' => array('cnt_projects' => $cnt_projects, 'total_allowed' => Auth::getMaxDomains()), 'cnt_reports' => $cnt_reports));
    }

}
