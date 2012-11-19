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
        $percentage = (int)($cnt_projects+100/Auth::getMaxDomains());
        $cnt_reports = $em->getRepository('FrontFrontBundle:ProjectReport')->cntReports(Auth::getAuthParam('id'));

        $project_keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getAvgStatsPerProject(Auth::getAuthParam('id'), date('Y-m-d'));
        $expl_str = 'UPs and Downs for the last 2 days';
        if(empty($project_keyword_stats)) {
            $yesterday = date('Y-m-d', strtotime('-1 day', time()));
            $project_keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getAvgStatsPerProject(Auth::getAuthParam('id'), $yesterday);
            $expl_str = 'UPs and Downs for <b>'.$yesterday.'</b> and <b>'.date('Y-m-d').'</b>';
        }
        
        $cnt_project_keyword_stats = count($project_keyword_stats);
        $project_avg_stats = array();
        for($i=0;$i<$cnt_project_keyword_stats;$i++) {
            $project_name = $project_keyword_stats[$i]['project_name'];
            $flotation = $project_keyword_stats[$i]['flotation'];
            $type = $project_keyword_stats[$i]['type'];
            $project_avg_stats[$project_name][$type] = $flotation;
            $project_avg_stats[$project_name]['project_hash'] = $project_keyword_stats[$i]['project_hash'];
        }
//        \Backend\BackendBundle\Additional\Debug::d1($project_avg_stats);
        
        $params = array(
            'percentage' => $percentage, 
            'projects' => array('cnt_projects' => $cnt_projects, 'total_allowed' => Auth::getMaxDomains()), 
            'cnt_reports' => $cnt_reports,
            'project_keyword_stats' => $project_avg_stats,
            'expl_str' => $expl_str,
        );
        return $this->render('FrontFrontBundle:Account:dashboard.html.twig', $params);
    }

}
