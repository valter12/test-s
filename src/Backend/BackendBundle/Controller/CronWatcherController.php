<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CronWatcherController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }

    /**
     * cron logs
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        
        $request = $this->getRequest();
        
        $filter_params = array();
        
        $request->get('from_date')?($filter_params['from_date']=$request->get('from_date')):'';
        $request->get('to_date')?($filter_params['to_date']=$request->get('to_date')):'';
        $request->get('cron_status')?($filter_params['cron_status']=$request->get('cron_status')):'';
        $request->get('cron_name')?($filter_params['cron_name']=$request->get('cron_name')):'';
        $request->get('is_read')?($filter_params['is_read']=$request->get('is_read')):'';
        
        $em = $this->getDoctrine()->getEntityManager();
        $todo = $request->get('todo');
        switch ($todo) {
            case 'delete':
                $checkboxes = $request->get('checkbox');
                $em->getRepository('FrontFrontBundle:CronWatcher')->deleteByIds(array_keys($checkboxes));
                return $this->redirect($this->generateUrl('BackendBackendBundle_cron_watcher'));
                break;
            case 'mark_read':
                $checkboxes = $request->get('checkbox');
                $em->getRepository('FrontFrontBundle:CronWatcher')->markAsReadByIds(array_keys($checkboxes));
                return $this->redirect($this->generateUrl('BackendBackendBundle_cron_watcher'));
                break;
        }
        
        if(empty($filter_params)) {
            $cron_logs = $em->getRepository('FrontFrontBundle:CronWatcher')->getNonReadLogs();
        } else {
            $cron_logs = $em->getRepository('FrontFrontBundle:CronWatcher')->getLogs($filter_params);
        }
        return $this->render('BackendBackendBundle:CronWatcher:index.html.twig', array('cron_logs' => $cron_logs));
    }
    
    public function cronProfileAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        
        $request = $this->getRequest();
        $session_id = $request->get('session_id');
        if(!$session_id) {
            die('No session id provided');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $cron_profile = $em->getRepository('FrontFrontBundle:CronWatcher')->getCronProfile($session_id);
        $cnt = count($cron_profile);
//        for ($i = 0; $i < $cnt; $i++) {
//            $cron_profile[$i]['message'] = 
//        }
//        \Backend\BackendBundle\Additional\Debug::d1($cron_profile);
        
        return $this->render('BackendBackendBundle:CronWatcher:cron_profile.html.twig', array('cron_profile' => $cron_profile));
    }
    
    public function logsIndexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        
        $request = $this->getRequest();
        
        $em = $this->getDoctrine()->getEntityManager();
        $todo = $request->get('todo');
        switch ($todo) {
            case 'delete':
                $checkboxes = $request->get('checkbox');
                $em->getRepository('FrontFrontBundle:CronWatcher')->deleteCriticalErrorsByIds(array_keys($checkboxes));
                return $this->redirect($this->generateUrl('BackendBackendBundle_logs_index'));
                break;
            case 'mark_read':
                $checkboxes = $request->get('checkbox');
                $em->getRepository('FrontFrontBundle:CronWatcher')->markCriticalErrorsAsReadByIds(array_keys($checkboxes));
                return $this->redirect($this->generateUrl('BackendBackendBundle_logs_index'));
                break;
        }
        
        
        $logs = $em->getRepository('FrontFrontBundle:CronWatcher')->getCriticalErrors();
        return $this->render('BackendBackendBundle:CronWatcher:logs_list.html.twig', array('logs' => $logs));
    }

}
