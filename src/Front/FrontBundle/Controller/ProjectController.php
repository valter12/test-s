<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class ProjectController extends Controller {

    /**
     * "project list" page
     * @return type
     * routing account_projects
     */
    public function projectsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $max_domains = Auth::getMaxDomains();
        
        return $this->render('FrontFrontBundle:Account:Project/project_list.html.twig', array('project_list' => $project_list, 'max_packages' => $max_domains));
    }

    /**
     * 
     * @return type
     * routing account_delete_project
     */
    public function deleteProjectAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $project_hash = $request->get('hash');
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        $em->getRepository('FrontFrontBundle:Project')->deleteProjectByHash(Auth::getAuthParam('id'), $project_hash);
        $this->get('session')->setFlash('notice', 'The project was deleted.');
        return $this->redirect($this->generateUrl('account_projects'));
    }

    /**
     * modifies a project
     * @return type
     * routing account_execute_modify_project
     */
    public function executeModifyAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $project_hash = $request->get('project_hash');
        $project_name = $request->get('project_name');
        $project_desc = $request->get('project_desc');
        $project_category = $request->get('project_category');
        $project_domain = $request->get('project_domain');
        $todo = $request->get('action');

        if(!is_numeric($project_category)) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        $user_owns_category = $em->getRepository('FrontFrontBundle:ProjectCategory')->userOwnsCategory(Auth::getAuthParam('id'), $project_category);
        
        if(!$user_owns_category) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        if($todo == 'new') {
            $cnt_user_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
            if($cnt_user_projects >= Auth::getMaxDomains()) {
                $this->get('session')->setFlash('error', 'Your projects count has reached the limit. You cannot add more projects. Please upgrade.');
                return $this->redirect($this->generateUrl('account_projects'));
            }
            if(Auth::getAuthParam('is_trial') == 1) { // if user is trial
                $domain_was_trial = $em->getRepository('FrontFrontBundle:TrialDomain')->domainWasTrial($project_domain);
                if($domain_was_trial) { // if this domain was used in a trial before we dont add it
                    $this->get('session')->setFlash('error', 'You cannot add this domain in trial mode.');
                    return $this->redirect($this->generateUrl('account_projects'));
                }
            }
            $em->getRepository('FrontFrontBundle:Project')->createProject(Auth::getAuthParam('id'), $project_name, $project_desc, $project_domain, $project_category);
            $this->get('session')->setFlash('notice', 'The project was created. Now you can add keywords by clicking on "Options"');
        } elseif($todo == 'modify') {
            $em->getRepository('FrontFrontBundle:Project')->modifyProject(Auth::getAuthParam('id'), $project_hash, $project_name, $project_desc, $project_category);
            $this->get('session')->setFlash('notice', 'The project was updated.');
        }
        return $this->redirect($request->headers->get('referer'));
//        return $this->redirect($this->generateUrl('account_projects'));
    }
    
    public function projectDetailsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        // getting project list for select
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        $project_hash = $request->get('hash', $project_list[0]['project_hash']);
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        // project details
        $project_details = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if(empty($project_details)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $project_parsed = $em->getRepository('FrontFrontBundle:KeywordTrack')->isProjectParsed($project_details['id']);
        
        if($project_parsed) {
            $today = date('Y-m-d');
            $yesterday = date('Y-m-d', strtotime('-1 day', time()));
            $expl_str = 'the shown differences are between today and yesterday';
        } else {
            $today = date('Y-m-d', strtotime('-1 day', time()));
            $yesterday = date('Y-m-d', strtotime('-2 day', time()));
            $expl_str = 'the shown differences are between '.$yesterday.' and '.$today.'';
        }

        // keyword count
        $keyword_cnt = $em->getRepository('FrontFrontBundle:Keyword')->getProjectKeywordCount($project_details['id']);

        // project uptime
        $project_uptime = $em->getRepository('FrontFrontBundle:Uptime')->getProjectUptime(Auth::getAuthParam('id'), $project_details['id'], $today, $yesterday);

        // avg keyword position
        $avg_keyword_position_today = $em->getRepository('FrontFrontBundle:KeywordTrack')->getProjectAvgPosition($project_details['id'], $today);
        $avg_keyword_position_yesterday = $em->getRepository('FrontFrontBundle:KeywordTrack')->getProjectAvgPosition($project_details['id'], $yesterday);
        // devide by 3 because we have 3 search engines for now
        $avg_today = @array_sum($avg_keyword_position_today)/3;
        $avg_yesterday = @array_sum($avg_keyword_position_yesterday)/3;
        
        // keywords in Top10
        $top10_today = $em->getRepository('FrontFrontBundle:KeywordTrack')->getTop10keywordCntByProjectId($project_details['id'], $today);
        $top10_yesterday = $em->getRepository('FrontFrontBundle:KeywordTrack')->getTop10keywordCntByProjectId($project_details['id'], $yesterday);
        
        // positions up/down
        $positions_up_today = $em->getRepository('FrontFrontBundle:KeywordTrack')->getCntPositionsByProjectId($project_details['id'], $today, 'up');
        $positions_down_today = $em->getRepository('FrontFrontBundle:KeywordTrack')->getCntPositionsByProjectId($project_details['id'], $today, 'down');
        // competitor cnt
        $competitor_cnt = $em->getRepository('FrontFrontBundle:Competitor')->getCntProjectCompetitorsById($project_details['id']);
        
        // keyword's ups & downs
        $up_keywords = $em->getRepository('FrontFrontBundle:KeywordTrack')->getProjectUps($project_details['id'], $today, 'up');
        $down_keywords = $em->getRepository('FrontFrontBundle:KeywordTrack')->getProjectUps($project_details['id'], $today, 'down');
        
        // top 10 keyword list
        $top10_keyword_list = $em->getRepository('FrontFrontBundle:KeywordTrack')->getTop10KeywordsByProjectId($project_details['id'], $today);
        
        // new in top 10 keyword list
        $new_top10_keyword_list = $em->getRepository('FrontFrontBundle:KeywordTrack')->getNewTop10KeywordsByProjectId($project_details['id'], $today, '1 DAY');

        $params = array();
        $params['project_details'] = $project_details;
        $params['keyword_cnt'] = $keyword_cnt;
        $params['project_uptime'] = $project_uptime;
        $params['avg_position'] = array('avg_today' => number_format($avg_today, 1), 'diff_from_yesterday' => number_format(($avg_yesterday - $avg_today),1));
        $params['top10'] = array('top10_today' => $top10_today, 'diff_from_yesterday' => ($top10_today - $top10_yesterday));
        $params['fluctuations'] = array('rises' => $positions_up_today, 'drops' => $positions_down_today);
        $params['competitor_cnt'] = $competitor_cnt;
        $params['keyword_ups_downs'] = array('up_keywords' => $up_keywords, 'down_keywords' => $down_keywords);
        $params['top10_keyword_list'] = $top10_keyword_list;
        $params['new_top10_keyword_list'] = $new_top10_keyword_list;
//        $params['out_of_top10_keyword_list'] = array('out_of_top10_keyword_list' => $out_of_top10_keyword_list, 'today_ranks_or_ex_top10' => $ex_top10_formatted);
        $params['project_list'] = $project_list;
        $params['expl_str'] = $expl_str;
        return $this->render('FrontFrontBundle:Account:Project/project_details.html.twig', $params);
    }

}
