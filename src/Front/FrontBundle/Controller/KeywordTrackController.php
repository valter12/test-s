<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class KeywordTrackController extends Controller {

    /**
     * "keyword stats" page
     * @return type
     * routing account_keywords
     */
    public function keywordStatsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }

        $allowed_results_per_page = array(10, 20);
        
        $request = $this->getRequest();

        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $results_per_page = $request->get('results_per_page', 10);
        $competitor_ids = $request->get('competitor_ids');
        $page = $request->get('page', 1);
        
        if(!is_numeric($page)) {
            $page = 1;
        }

        if($results_per_page && !in_array($results_per_page, $allowed_results_per_page)) {
            $results_per_page = 10;
        }
        
        if (count($competitor_ids) > 20) { // more than allowed in the biggest package
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }

        $keyword_id = $request->get('keyword_id');
        if (!is_numeric($keyword_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }

        $em = $this->getDoctrine()->getEntityManager();
        $user_owns_keyword = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
        if (!$user_owns_keyword['cnt']) { // user does not own this keyword
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            if($request->headers->get('referer')) {
                return $this->redirect($request->headers->get('referer'));
            } else {
                return $this->redirect($this->generateUrl('account_keywords'));
            }
        }

        $all_keywords = $em->getRepository('FrontFrontBundle:Keyword')->getAllProjectKeywordsByOneKeywordId($keyword_id);
        
        for ($i = 0; $i < count($competitor_ids); $i++) {
            if(!$em->getRepository('FrontFrontBundle:Competitor')->getUserOwnsCompetitorByKeyword($keyword_id, $competitor_ids[$i])) {
                unset($competitor_ids[$i]);
            }
        }

        $keyword_data = $em->getRepository('FrontFrontBundle:Keyword')->getKeywordById($keyword_id);

        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectDataByKeyword($keyword_id);
        $all_projects = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        
        $competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorsByKeywordId($keyword_id);

        $chart_page = '?project='.$project_data['project_hash'].'&'.http_build_query($_GET); // link for chart page
        
        if(count($competitor_ids)) { // if must return stats with competitor
            $keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getKeywordStatsWithCompetitors($keyword_id, $competitor_ids, $results_per_page, $from_date, $to_date, $page);
            $cnt_results = $keyword_stats['total'];
            if($page == 1) {
                $prev_page = 0;
            } else {
                $_GET['page'] = $page - 1;
                $prev_page = http_build_query($_GET);
            }
            if($page * $results_per_page >= $cnt_results-1) {
                $next_page = 0;
            } else {
                $_GET['page'] = $page + 1;
                $next_page = http_build_query($_GET);
            }
            return $this->render('FrontFrontBundle:Account:Keyword/keyword_stats_competitor.html.twig', array('keyword_stats' => $keyword_stats['result_final'], 'project_data' => $project_data, 'keyword_data' => $keyword_data, 'competitors' => $competitors, 'all_keywords' => $all_keywords, 'all_projects' => $all_projects, 'next_page' => $next_page, 'prev_page' => $prev_page, 'chart_page' => $chart_page));
        } else {
            $keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getKeywordStats($keyword_id, $results_per_page, $from_date, $to_date, $page);
            $cnt_results = $keyword_stats['total'];
            if($page == 1) {
                $prev_page = 0;
            } else {
                $_GET['page'] = $page - 1;
                $prev_page = http_build_query($_GET);
            }
            if($page * $results_per_page >= $cnt_results-1) {
                $next_page = 0;
            } else {
                $_GET['page'] = $page + 1;
                $next_page = http_build_query($_GET);
            }
            
            return $this->render('FrontFrontBundle:Account:Keyword/keyword_stats.html.twig', array('keyword_stats' => $keyword_stats['result_final'], 'project_data' => $project_data, 'keyword_data' => $keyword_data, 'competitors' => $competitors, 'all_keywords' => $all_keywords, 'all_projects' => $all_projects, 'next_page' => $next_page, 'prev_page' => $prev_page, 'chart_page' => $chart_page));
        }




    }

    /**
     * "choose project" page
     * @return type
     * routing account_keyword_choose_project
     */
    public function chooseProjectAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $max_keyword = Auth::getMaxKeywords();

        return $this->render('FrontFrontBundle:Account:Keyword/choose_project.html.twig', array('project_list' => $project_list, 'max_keyword' => $max_keyword));
    }

    /**
     * account_execute_add_keywords
     */
    public function addKeywordsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $keywords = $request->get('keywords');

        $keywords = explode("\n", $keywords);

        $track_freq = $request->get('track_freq');

        $project_hash = $request->get('project_hash');
        $em = $this->getDoctrine()->getEntityManager();
        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if (!count($project_data)) { // user does not own this project
            $this->get('session')->setFlash('error', 'The project hash was incorrect. Keywords were NOT added.');
            return $this->redirect($request->headers->get('referer'));
        }

        $keyword_cnt = $em->getRepository('FrontFrontBundle:Keyword')->getProjectKeywordCount($project_data['id']);
        $max_allowed_keywords = Auth::getMaxKeywords();
        if ($keyword_cnt >= $max_allowed_keywords) {
            $this->get('session')->setFlash('error', 'Sorry, your keyword count for this project has reached maximum value. Please upgrade.');
            return $this->redirect($request->headers->get('referer'));
        }

        for ($i = 0; $i < count($keywords); $i++) {
            if ($i + $keyword_cnt >= $max_allowed_keywords) { // check if not reaching maximum allowed keyword count
                $this->get('session')->setFlash('error', 'Maximum keyword count for this project had been reached. Some keywords were not inserted.');
                return $this->redirect($request->headers->get('referer'));
            }
            if (trim($keywords[$i]) == '') {
                continue;
            }
            $em->getRepository('FrontFrontBundle:Keyword')->createKeyword($project_data['id'], $keywords[$i]);
        }

        $this->get('session')->setFlash('notice', 'All keywords were inserted.');
        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * 
     * @return type
     * routing account_delete_keyword
     */
    public function deleteKeywordAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $keyword_id = $request->get('id');
        if (!is_numeric($keyword_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }

        $keyword_exists = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
        if (!$keyword_exists['cnt']) {
            $this->get('session')->setFlash('error', 'The request is incorrect (E22).');
            return $this->redirect($request->headers->get('referer'));
        }

        $em->getRepository('FrontFrontBundle:Keyword')->deleteKeywordById($keyword_id);

        $this->get('session')->setFlash('notice', 'The keyword was deleted.');
        return $this->redirect($request->headers->get('referer'));
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

        if (!is_numeric($project_category)) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $user_owns_category = $em->getRepository('FrontFrontBundle:ProjectCategory')->userOwnsCategory(Auth::getAuthParam('id'), $project_category);

        if (!$user_owns_category) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $cnt_user_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
        if ($cnt_user_projects >= Auth::getMaxDomains()) {
            $this->get('session')->setFlash('error', 'Your projects count has reached the limit. You cannot add more projects. Please upgrade.');
            return $this->redirect($this->generateUrl('account_projects'));
        }


        if ($todo == 'new') {
            $em->getRepository('FrontFrontBundle:Project')->createProject(Auth::getAuthParam('id'), $project_name, $project_desc, $project_domain, $project_category);
            $this->get('session')->setFlash('notice', 'The project was created.');
        } elseif ($todo == 'modify') {
            $em->getRepository('FrontFrontBundle:Project')->modifyProject(Auth::getAuthParam('id'), $project_hash, $project_name, $project_desc, $project_category);
            $this->get('session')->setFlash('notice', 'The project was updated.');
        }
        return $this->redirect($this->generateUrl('account_projects'));
    }

}
