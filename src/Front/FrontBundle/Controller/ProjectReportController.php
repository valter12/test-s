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
        
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        $project_hash = $request->get('hash', false);
        if(!$project_hash) {
            $project_hash = $project_list[0]['project_hash'];
            $request->attributes->set('hash', $project_hash);
        }
        $reports = $em->getRepository('FrontFrontBundle:ProjectReport')->getReports(Auth::getAuthParam('id'), $project_hash);
        
        return $this->render('FrontFrontBundle:Account:Report/report_list.html.twig', array('project_list' => $project_list, 'reports' => $reports));
        
    }
    
    /**
     * routing: account_modify_add_report
     */
    public function addModifyAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $request = $this->getRequest();
        $project_hash = $request->get('hash', false);
        if(!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        $user_owns_project = false;
        for($i=0;$i<count($project_list);$i++) { // check if user owns project
            if($project_hash == $project_list[$i]['project_hash']) {
                $user_owns_project = true;
                break;
            }
        }
        if(!$user_owns_project) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorByProjectHash(Auth::getAuthParam('id'), $project_hash);
        
        return $this->render('FrontFrontBundle:Account:Report/add_modify_report.html.twig', array('project_list' => $project_list, 'competitor_list' => $competitors));
    }
    
    /**
     * store a report in db
     * routing: account_store_report
     */
    public function storeReportAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $request = $this->getRequest();
        $project_hash = $request->get('hash', false);
        echo '<pre>';print_r($_POST);die;
    }

}
