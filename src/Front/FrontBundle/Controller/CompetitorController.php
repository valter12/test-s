<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;
use Front\FrontBundle\Libs\CommonLib;

class CompetitorController extends Controller {

    /**
     * "project list" page
     * @return type
     * routing account_competitors
     */
    public function projectCompetitorsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }

        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $project_hash = $request->get('hash', $project_list[0]['project_hash']);
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }

        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if (empty($project_data)) {
            $this->get('session')->setFlash('error', 'You have no projects. Please create one.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $competitor_stats_img = array();
        $project_competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorByProjectHash(Auth::getAuthParam('id'), $project_hash);
//        \Backend\BackendBundle\Additional\Debug::d1($project_competitors);
        $cnt_competitors = count($project_competitors);
//        echo $cnt_competitors;die;
        $counter = 0;
        for ($i = 0; $i < $cnt_competitors; $i++) {
            $competitor_stats = $keyword_overall_for_graph_raw_data = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getOverallKeywordProgressByProjectId($project_competitors[$i]['project_id'], $project_competitors[$i]['id'], '5');
            $competitor_stats = array_reverse($competitor_stats);
            $aux_stats = CommonLib::formatDataForGoogleChart($competitor_stats);
            
            @$competitor_stats_img[$project_competitors[$i]['id']]['google'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=3072F3&chd=t:'.implode(',', $aux_stats['google']).'&chg=19,4,0,1&chls=1&chm=B,E6F2FA,0,0,0&chxl=0:|100|1';
            @$competitor_stats_img[$project_competitors[$i]['id']]['bing'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=e95e36&chd=t:'.implode(',', $aux_stats['bing']).'&chg=19,4,0,1&chls=1&chm=B,E9D5AD,0,0,0&chxl=0:|100|1';
            @$competitor_stats_img[$project_competitors[$i]['id']]['yahoo'] = 'http://'.$counter.'.chart.apis.google.com/chart?chxs=0,676767,7,0,lt,FCF7F7&chxt=y&chs=60x25&cht=lc&chco=7B0099&chd=t:'.implode(',', $aux_stats['yahoo']).'&chg=19,4,0,1&chls=1&chm=B,F4C7FF,0,0,0&chxl=0:|100|1';
            $counter++;
            if($counter > 9) {
                $counter = 0;
            }
        }

        $max_competitors = Auth::getMaxCompetitors();

        return $this->render('FrontFrontBundle:Account:Competitor/project_competitors.html.twig', array('project_data' => $project_data, 'project_competitors' => $project_competitors, 'max_competitors' => $max_competitors, 'project_list' => $project_list, 'competitor_stats' => $competitor_stats_img));
    }

    /**
     * 
     * @return type
     */
    public function deleteCompetitorAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();

        $competitor_id = $request->get('id');
        if (!$competitor_id) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('FrontFrontBundle:Competitor')->deleteCompetitorById(Auth::getAuthParam('id'), $competitor_id);
        $this->get('session')->setFlash('notice', 'The competitor was deleted.');
        return $this->redirect($this->generateUrl('account_competitors'));
    }

    /**
     * modifies a competitor
     */
    public function executeModifyAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $project_hash = $request->get('project_hash');
        $competitor_name = $request->get('competitor_name');
        $competitor_id = $request->get('competitor_id', 0); // when modifying
        $competitor_domain = $request->get('competitor_domain');
        $todo = $request->get('action');

        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'Wrong project hash.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }

        if ($todo == 'new') {
            $max_competitors = Auth::getMaxCompetitors();
            $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
            $project_competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCntProjectCompetitorsById($project_data['id']);
            if ($project_competitors >= $max_competitors) {
                $this->get('session')->setFlash('error', 'The competitor count for the chosen project has been reached. Please upgrade.');
                return $this->redirect($this->generateUrl('account_competitors') . '?hash=' . $project_hash);
            }
            $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
            if (empty($project_data)) {
                $this->get('session')->setFlash('error', 'Incorrenct project hash.');
                return $this->redirect($this->generateUrl('account_competitors'));
            }
            $em->getRepository('FrontFrontBundle:Competitor')->createCompetitor($project_data['id'], $competitor_name, $competitor_domain);
            $this->get('session')->setFlash('notice', 'The competitor was created.');
        } elseif ($todo == 'modify') {

            $em->getRepository('FrontFrontBundle:Competitor')->modifyCompetitor(Auth::getAuthParam('id'), $competitor_id, $project_hash, $competitor_name);
            $this->get('session')->setFlash('notice', 'The competitor was updated.');
        }
        return $this->redirect($this->generateUrl('account_competitors') . '?hash=' . $project_hash);
    }

    public function competitorDetailsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        // getting project list for select
        $competitor_list = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorsByUserId(Auth::getAuthParam('id'));
        $competitor_list_grouped = array();
        $cnt =  count($competitor_list);
        for ($i = 0; $i < $cnt; $i++) {
            $project_name = $competitor_list[$i]['project_name'];
            $competitor_list_grouped[$project_name][] = $competitor_list[$i];
        }
        
        $competitor_id = $request->get('competitor_id', $competitor_list[0]['id']);
        if (!$competitor_id) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        // competitor details
        $competitor_details = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorById(Auth::getAuthParam('id'), $competitor_id);
        if (empty($competitor_details)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $project_parsed = $em->getRepository('FrontFrontBundle:KeywordTrack')->isProjectParsed($competitor_details['project_id']);

        if ($project_parsed) {
            $today = date('Y-m-d');
            $yesterday = date('Y-m-d', strtotime('-1 day', time()));
            $expl_str = 'the shown differences are between today and yesterday';
        } else {
            $today = date('Y-m-d', strtotime('-1 day', time()));
            $yesterday = date('Y-m-d', strtotime('-2 day', time()));
            $expl_str = 'the shown differences are between ' . $yesterday . ' and ' . $today . '';
        }

        // keyword count
        $keyword_cnt = $em->getRepository('FrontFrontBundle:Keyword')->getProjectKeywordCount($competitor_details['project_id']);
        $project_details = $em->getRepository('FrontFrontBundle:Project')->getProjectById($competitor_details['project_id']);

        // avg keyword position
        $avg_keyword_position_today = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getProjectAvgPosition($competitor_details['project_id'], $competitor_details['id'], $today);
        $avg_keyword_position_yesterday = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getProjectAvgPosition($competitor_details['project_id'], $competitor_details['id'], $yesterday);
        // devide by 3 because we have 3 search engines for now
        $avg_today = @array_sum($avg_keyword_position_today) / 3;
        $avg_yesterday = @array_sum($avg_keyword_position_yesterday) / 3;

        // keywords in Top10
        $top10_today = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getTop10keywordCntByProjectId($competitor_details['project_id'], $competitor_details['id'], $today);
        $top10_yesterday = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getTop10keywordCntByProjectId($competitor_details['project_id'], $competitor_details['id'], $yesterday);

        // positions up/down
        $positions_up_today = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getCntPositionsByProjectId($competitor_details['project_id'], $competitor_details['id'], $today, 'up');
        $positions_down_today = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getCntPositionsByProjectId($competitor_details['project_id'], $competitor_details['id'], $today, 'down');

        // keyword's ups & downs
        $up_keywords = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getProjectUps($competitor_details['project_id'], $competitor_details['id'], $today, 'up');
        $down_keywords = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getProjectUps($competitor_details['project_id'], $competitor_details['id'], $today, 'down');

        // top 10 keyword list
        $top10_keyword_list = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getTop10KeywordsByProjectId($competitor_details['project_id'], $competitor_details['id'], $today);

        // new in top 10 keyword list
        $new_top10_keyword_list = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getNewTop10KeywordsByProjectId($competitor_details['project_id'], $competitor_details['id'], $today, '1 DAY');
        
        // google, bing, yahoo overall stats for keywords
        $keyword_overall_for_graph_raw_data = $em->getRepository('FrontFrontBundle:KeywordTrackCompetitor')->getOverallKeywordProgressByProjectId($project_details['id'], $competitor_details['id'], '30');
        $keyword_overall_for_graph = CommonLib::getOverallKeywordsPosition($keyword_overall_for_graph_raw_data);
        $keyword_overall_for_graph['hash_chart'] = md5($competitor_details['id'].$competitor_details['competitor_name']);
        $keyword_overall_for_graph['project_name'] = $competitor_details['competitor_name'];

        $params = array();
        $params['competitor_details'] = $competitor_details;
        $params['project_details'] = $project_details;
        $params['keyword_cnt'] = $keyword_cnt;
        $params['avg_position'] = array('avg_today' => number_format($avg_today, 1), 'diff_from_yesterday' => number_format(($avg_yesterday - $avg_today), 1));
        $params['top10'] = array('top10_today' => $top10_today, 'diff_from_yesterday' => ($top10_today - $top10_yesterday));
        $params['fluctuations'] = array('rises' => $positions_up_today, 'drops' => $positions_down_today);
        $params['keyword_ups_downs'] = array('up_keywords' => $up_keywords, 'down_keywords' => $down_keywords);
        $params['top10_keyword_list'] = $top10_keyword_list;
        $params['new_top10_keyword_list'] = $new_top10_keyword_list;
        $params['competitor_list'] = $competitor_list_grouped;
        $params['expl_str'] = $expl_str;
        $params['keyword_overall_for_graph'] = $keyword_overall_for_graph;
        $params['competitor_aux_url'] = '&competitor_ids[]='.$competitor_id;
        return $this->render('FrontFrontBundle:Account:Competitor/competitor_details.html.twig', $params);
    }

}
