<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class ProjectReportController extends Controller {

    /**
     * routing: account_report_list
     */
    public function reportListAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $project_hash = $request->get('hash', false);
        
        $em = $this->getDoctrine()->getEntityManager();
        $reports = $em->getRepository('FrontFrontBundle:ProjectReport')->getReports(Auth::getAuthParam('id'), $project_hash);
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        return $this->render('FrontFrontBundle:Account:Report/report_list.html.twig', array('project_list' => $project_list, 'reports' => $reports));
        
    }
    
    /**
     * routing: account_modify_add_report
     */
    public function addModifyAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        return $this->render('FrontFrontBundle:Account:Report/add_modify_report.html.twig', array('project_list' => $project_list));
    }

}
