<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class UptimeController extends Controller {

    /**
     * routing account_uptime
     */
    public function uptimeAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        
        $todo = $request->get('todo');
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $project_hash = $request->get('hash', $project_list[0]['project_hash']);
        
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_uptime'));
        }
        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if(empty($project_data)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }
        
        $project_uptime = $em->getRepository('FrontFrontBundle:Uptime')->getProjectUptime(Auth::getAuthParam('id'), $project_data['id'], $from_date, $to_date);
        $cnt_uptime = count($project_uptime);
        
        $summary_final = $project_uptime_final = array();
        for($i=0;$i<$cnt_uptime;$i++) {
            $project_uptime_final[$i]['summary_date'] = $project_uptime[$i]['summary_date'];
            $project_uptime_final[$i]['total_down'] = round($project_uptime[$i]['total_down']/60);
            $project_uptime_final[$i]['total_down_percent'] = round(($project_uptime[$i]['total_down']/60)*100/24);
            
            $summary = unserialize($project_uptime[$i]['summary']);
//            echo '<pre>';print_r($summary);die;
            $cnt_summary = count($summary);
            $next_value = 0;
            for($j=0;$j<$cnt_summary;$j++) {
                $hour = str_replace(':', '', $summary[$j]['check_time']);
                $hour = (int)($hour/100)*60 + ($hour % 100);
                $width_percent = abs(($next_value * 100 / 1440) - ($hour * 100 / 1440));
                $summary_final[$hour] = $summary[$j];
                $summary_final[$hour]['width_percent'] = $width_percent;
                if($j>0) {
                    $summary_final[$hour]['between_hours'] = $summary[$j-1]['check_time'].' - '.$summary[$j]['check_time'];
                } else {
                    $summary_final[$hour]['between_hours'] = '';
                }
                $next_value = $hour;
            }
            $project_uptime_final[$i]['summary'] = $summary_final;
            $summary_final = array();
        }
        
        return $this->render('FrontFrontBundle:Account:Uptime/project_uptime.html.twig', array('project_list' => $project_list, 'project_uptime' => $project_uptime_final, 'project_data' => $project_data));
    }

}
 