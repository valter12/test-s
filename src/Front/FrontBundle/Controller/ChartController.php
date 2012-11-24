<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class ChartController extends Controller {

    public function keywordChartAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();

        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $competitor_ids = $request->get('competitor_ids');
        $search_engines = $request->get('search_engine', array('google', 'bing', 'yahoo'));
        $show_chart = $request->get('show_chart', 0);
        $keyword_id = $request->get('keyword_id');

        if (count($competitor_ids) > 20) { // more than allowed in the biggest package
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }

        if ($show_chart && !is_numeric($keyword_id)) {
            $this->get('session')->setFlash('error', 'Please select a keyword.');
            return $this->redirect($request->headers->get('referer'));
        }

        $em = $this->getDoctrine()->getEntityManager();
        if ($keyword_id) {
            $user_owns_keyword = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
            if (!$user_owns_keyword['cnt']) { // user does not own this keyword
                $this->get('session')->setFlash('error', 'The request is incorrect.');
                return $this->redirect($request->headers->get('referer'));
            }
        }

        for ($i = 0; $i < count($competitor_ids); $i++) {
            if (!$em->getRepository('FrontFrontBundle:Competitor')->getUserOwnsCompetitorByKeyword($keyword_id, $competitor_ids[$i])) {
                unset($competitor_ids[$i]);
            }
        }

        $keyword_data = $em->getRepository('FrontFrontBundle:Keyword')->getKeywordById($keyword_id);
        $chart_titles = array();
//        echo count($search_engines);die;
//        echo '<pre>';print_r($search_engines);die;

        $search_engines_clean = $search_engines;
        for ($i = 0; $i < count($search_engines); $i++) {
            $search_engines[$i] = ucfirst($search_engines[$i]);
            $chart_titles[] = 'Position of "<b>' . $keyword_data['keyword'] . '</b>" in ' . $search_engines[$i];
        }

        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectDataByKeyword($keyword_id);

        $xAxis_arr = $yAxis_arr = $domain_names = $axes = array();
        if (count($competitor_ids)) { // if must return stats with competitor
            $keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getKeywordStatsWithCompetitors($keyword_id, $competitor_ids, false, $from_date, $to_date, 0, 'ASC');
            foreach ($keyword_stats['result_final'] as $date => $value) {
                $xAxis_arr[] = "'" . $date . "'";
            }
            foreach ($value as $domain_name => $data) {
                $domain_names[] = $domain_name;
            }
            for ($k = 0; $k < count($search_engines_clean); $k++) {
                for ($i = 0; $i < count($domain_names); $i++) {
                    $yAxis[$i]['name'] = $domain_names[$i];
                    foreach ($keyword_stats['result_final'] as $key => $value) {
                        $yAxis_arr[] = (int) $value[$domain_names[$i]][$search_engines_clean[$k] . '_position'] == 0 ? 99 : $value[$domain_names[$i]][$search_engines_clean[$k] . '_position'];
                    }
                    $yAxis[$i]['data'] = '[' . implode(', ', $yAxis_arr) . ']';
                    $yAxis_arr = array();
                }
                $xAxis = '[' . implode(', ', $xAxis_arr) . ']';
                
                $axes[$k]['xAxis'] = $xAxis;
                $axes[$k]['yAxis'] = $yAxis;
                $axes[$k]['x_title'] = $chart_titles[$k];
                $axes[$k]['y_title'] = 'Position in '.$search_engines[$k];
                
                $yAxis_arr = array();
            }
        } else {
            $keyword_stats = $em->getRepository('FrontFrontBundle:KeywordTrack')->getKeywordStats($keyword_id, false, $from_date, $to_date, 0, 'ASC');
            $cnt_keyword_stats = count($keyword_stats['result_final']);
            for ($k = 0; $k < count($search_engines_clean); $k++) {
                for ($i = 0; $i < $cnt_keyword_stats; $i++) {
                    $xAxis_arr[] = "'" . $keyword_stats['result_final'][$i]['track_date'] . "'";
                    $yAxis_arr[] = (int) $keyword_stats['result_final'][$i][$search_engines_clean[$k] . '_position'] == 0 ? 99 : $keyword_stats['result_final'][$i][$search_engines_clean[$k] . '_position'];
                }
                $xAxis = '[' . implode(', ', $xAxis_arr) . ']';
                $yAxis[0]['name'] = $project_data['project_name'];
                $yAxis[0]['data'] = '[' . implode(', ', $yAxis_arr) . ']';
                
                $axes[$k]['xAxis'] = $xAxis;
                $axes[$k]['yAxis'] = $yAxis;
                $axes[$k]['x_title'] = $chart_titles[$k];
                $axes[$k]['y_title'] = 'Position in '.$search_engines[$k];
                $xAxis_arr = $yAxis_arr = array();
            }
        }
        
        unset($_GET['project'], $_GET['show_chart']);
        $stats_link = http_build_query($_GET); // link for stats page
//\Backend\BackendBundle\Additional\Debug::d1($axes);
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));

        return $this->render('FrontFrontBundle:Account:Chart/chart.html.twig', array('project_list' => $project_list, 'axes' => $axes, 'stats_link' => $stats_link));
    }

}
