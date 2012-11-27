<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;
use Front\FrontBundle\Libs\CommonLib;

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
        
        $project_stats_img = array();
        $request = $this->getRequest();
        $category_id = $request->get('category_id');
        $em = $this->getDoctrine()->getEntityManager();
        $category_list = $em->getRepository('FrontFrontBundle:ProjectCategory')->getProjectCategoriesByUserId(Auth::getAuthParam('id'));
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'), $category_id);
        $max_domains = Auth::getMaxDomains();
        $cnt_projects = count($project_list);
        $counter = 0;
        for ($i = 0; $i < $cnt_projects; $i++) {
            $project_stats = $keyword_overall_for_graph_raw_data = $em->getRepository('FrontFrontBundle:KeywordTrack')->getOverallKeywordProgressByProjectId($project_list[$i]['id'], '5');
            $project_stats = array_reverse($project_stats);
            $aux_stats = CommonLib::formatDataForGoogleChart($project_stats);
            
            $project_stats_img[$project_list[$i]['id']]['google'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=3072F3&chd=t:'.implode(',', $aux_stats['google']).'&chg=19,4,0,1&chls=1&chm=B,E6F2FA,0,0,0&chxl=0:|100|1';
            $project_stats_img[$project_list[$i]['id']]['bing'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=e95e36&chd=t:'.implode(',', $aux_stats['bing']).'&chg=19,4,0,1&chls=1&chm=B,E9D5AD,0,0,0&chxl=0:|100|1';
            $project_stats_img[$project_list[$i]['id']]['yahoo'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=7B0099&chd=t:'.implode(',', $aux_stats['yahoo']).'&chg=19,4,0,1&chls=1&chm=B,F4C7FF,0,0,0&chxl=0:|100|1';
            $counter++;
            if($counter > 9) {
                $counter = 0;
            }
        }
        
        return $this->render('FrontFrontBundle:Account:Project/project_list.html.twig', array('project_list' => $project_list, 'max_packages' => $max_domains, 'project_stats' => $project_stats_img, 'category_list' => $category_list));
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
        
        // google, bing, yahoo overall stats for keywords
        $keyword_overall_for_graph_raw_data = $em->getRepository('FrontFrontBundle:KeywordTrack')->getOverallKeywordProgressByProjectId($project_details['id'], '30');
        $keyword_overall_for_graph = CommonLib::getOverallKeywordsPosition($keyword_overall_for_graph_raw_data);
        $keyword_overall_for_graph['hash_chart'] = md5($project_details['id'].$project_details['project_name']);
        $keyword_overall_for_graph['project_name'] = $project_details['project_name'];

        
        $result_overall = $this->getOverallWithCompetitors($project_details, $em);
        
//        \Backend\BackendBundle\Additional\Debug::d1($result_overall);
        

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
        $params['keyword_overall_for_graph'] = $keyword_overall_for_graph;
        $params['overall_all_competitors'] = $result_overall;
        return $this->render('FrontFrontBundle:Account:Project/project_details.html.twig', $params);
    }
    
    protected function getOverallWithCompetitors($project_details, $em) {
        $competitor_list = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorsByProjectId($project_details['id']);
        $days_30_ago = date('Y-m-d', strtotime('-30 day', time()));
        
        $result_overall = array();
        $overall_data = $em->getRepository('FrontFrontBundle:KeywordTrack')->getOverallKeywordProgressByProjectId($project_details['id'], false, $days_30_ago);
        $keyword_overall_competitors = array('se_stats' => $overall_data);
        $keyword_overall_competitors['hash_chart'] = md5($project_details['id'].$project_details['project_name']);
        $keyword_overall_competitors['project_name'] = $project_details['project_name'];
        $raw_data[] = $keyword_overall_competitors;
        
        $first_date = $overall_data[count($overall_data)-1]['track_date'];
        
        $competitor_cnt = count($competitor_list);
        // getting raw data for competitors
        for($i=0;$i<$competitor_cnt;$i++) {
            $competitor_details = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorById(Auth::getAuthParam('id'), $competitor_list[$i]['id']);
            if(empty($competitor_details)) {
               continue; 
            }
            $overall_data = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getOverallKeywordProgressByProjectId($project_details['id'], $competitor_details['id'], false, $days_30_ago, false);
            if(empty($overall_data)) {
                continue;
            }
            $first_date_competitor = $overall_data[count($overall_data)-1]['track_date'];
            
            if(strtotime($first_date) > strtotime($first_date_competitor)) {
                $first_date = $first_date_competitor;
            }
            $keyword_overall_competitors = array('se_stats' => $overall_data);
            $keyword_overall_competitors['hash_chart'] = md5($competitor_details['id'].$competitor_details['competitor_name']);
            $keyword_overall_competitors['project_name'] = $competitor_details['competitor_name'];
            $raw_data[] = $keyword_overall_competitors;
        }
        $cnt = count($raw_data);
        for($i=0;$i<$cnt;$i++) {
            $data = CommonLib::getOverallKeywordsPosition($raw_data[$i]['se_stats'], $first_date, true);
            $data['hash_chart'] = $raw_data[$i]['hash_chart'];
            $data['project_name'] = $raw_data[$i]['project_name'];
            $result_overall[] = $data;
        }
        
        return $result_overall;
    }

    
}
