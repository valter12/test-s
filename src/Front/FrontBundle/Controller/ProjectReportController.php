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

        $report_data = $report_settings = array();
        $report_id = $request->get('report_id', false);
        if($report_id) {
            $report_data = $em->getRepository('FrontFrontBundle:ProjectReport')->getReportData(Auth::getAuthParam('id'), $report_id);
            $report_settings = unserialize($report_data['report_settings']);
//            echo '<pre>';print_r($report_settings);die;
        }
        
        $competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorByProjectHash(Auth::getAuthParam('id'), $project_hash);
        
        return $this->render('FrontFrontBundle:Account:Report/add_modify_report.html.twig', array('project_list' => $project_list, 'competitor_list' => $competitors, 'report_data' => $report_data, 'report_settings' => $report_settings));
    }
    
    /**
     * store a report in db
     * routing: account_store_report
     */
    public function storeReportAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $allowed_frequencies = array('weekly', 'monthly', 'quarterly');
        
        $request = $this->getRequest();
        $project_hash = $request->get('project_hash', false);
        if(!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $project = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        
        if(empty($project)) { // check if user owns project
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $request_params = $request->request->all();
        $report_title = $request->get('report_title');
        $report_desc = $request->get('report_desc');
        $frequency = $request->get('frequency');
        
        if(!in_array($frequency, $allowed_frequencies)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $send_me = $request->get('send_me');
        
        unset($request_params['project_hash'], $request_params['report_title'], $request_params['report_desc'], $request_params['frequency'], $request_params['send_me'], $request_params['modify_id']);
        
        $modify_id = $request->get('modify_id');
        if(is_numeric($modify_id)) { // if modifying a report
            $report_data = $em->getRepository('FrontFrontBundle:ProjectReport')->getReportData(Auth::getAuthParam('id'), $modify_id);
            if(empty($report_data)) { // user does not own report
                $this->get('session')->setFlash('error', 'The request is incorrect.');
                return $this->redirect($request->headers->get('referer'));
            } else {
                $em->getRepository('FrontFrontBundle:ProjectReport')->updateReport($modify_id, $report_title, $report_desc, $frequency, $send_me, serialize($request_params));
            }
        } else {
            $em->getRepository('FrontFrontBundle:ProjectReport')->saveReport($project['id'], $report_title, $report_desc, $frequency, $send_me, serialize($request_params));
        }
        

        $this->get('session')->setFlash('notice', 'Operation successfull.');
        return $this->redirect($this->generateUrl('account_report_list').'?hash='.$project_hash);
    }
    
    /**
     * deletes a report
     * routing: account_delete_report
     */
    public function deleteReportAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $report_id = $request->get('report_id', false);
        $project_hash = $request->get('hash', false);
        
        if(!is_numeric($report_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $report_data = $em->getRepository('FrontFrontBundle:ProjectReport')->getReportData(Auth::getAuthParam('id'), $report_id);
        if(empty($report_data)) { // user does not own report
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $em->getRepository('FrontFrontBundle:ProjectReport')->deleteReport($report_id);
        return $this->redirect($this->generateUrl('account_report_list').'?hash='.$project_hash);
    }
    
    /**
     * here the user will come from email with the report link
     */
    public function viewPdfReportAction() {
        $request = $this->getRequest();
        $report_hash = $request->get('hash');
        $em = $this->getDoctrine()->getEntityManager();
        $report_data = $em->getRepository('FrontFrontBundle:ProjectReport')->checkGeneratedReportHash($report_hash);
        if(!empty($report_data)) {
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="'.$report_data['report_filename'].'"');
            readfile('/var/www/seowatchman_sf/reports/'.$report_data['report_filename']);
            die;
        } else {
            die('Report does not exist.');
        }
    }

}
