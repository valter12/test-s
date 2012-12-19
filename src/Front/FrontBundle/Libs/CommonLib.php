<?php

namespace Front\FrontBundle\Libs;

class CommonLib {

    /**
     * gets overall position on google,bing,yahoo for a certain project for a certain period of time
     */
    public static function getOverallKeywordsPosition($keyword_overall_for_graph, $min_date = false, $avg_all = false) {
        
//        $keyword_overall_for_graph = array_reverse($keyword_overall_for_graph);
        $cnt_overall_for_graph = count($keyword_overall_for_graph);
        $first_date = @$keyword_overall_for_graph[0]['track_date'];
        $last_date = @$keyword_overall_for_graph[$cnt_overall_for_graph - 1]['track_date'];

        // formating data
        $keyword_overall_with_dates = array();
        for ($i = 0; $i < $cnt_overall_for_graph; $i++) {
            $date = $keyword_overall_for_graph[$i]['track_date'];
            $keyword_overall_with_dates[$date] = $keyword_overall_for_graph[$i];
        }

        $result = array();

        if(!empty($keyword_overall_with_dates)) {
            foreach ($keyword_overall_with_dates as $date => $value) {
                $dates[] = "'" . $date . "'";
                if($avg_all) {
                    $result['yAxis'][] = (int) (($value['avg_google_position'] + $value['avg_bing_position'] + $value['avg_yahoo_position'])/3);
                } else {
                    $result['yAxis']['Google'][] = (int) $value['avg_google_position'];
                    $result['yAxis']['Bing'][] = (int) $value['avg_bing_position'];
                    $result['yAxis']['Yahoo'][] = (int) $value['avg_yahoo_position'];
                }
            }

            if($avg_all) {
                $result['yAxis'] = '[' . implode(',', $result['yAxis']) . ']';
            } else {
                foreach ($result['yAxis'] as &$value) {
                    $value = '[' . implode(',', $value) . ']';
                }
            }
            $result['xAxis'] = '[' . implode(',', $dates) . ']';
        } else {
            $result['yAxis']['Google'] = '[]';
            $result['yAxis']['Bing'] = '[]';
            $result['yAxis']['Yahoo'] = '[]';
            $result['xAxis'] = '[]';
        }
//        \Backend\BackendBundle\Additional\Debug::d1($result);
        return $result;
    }

    public static function formatDataForGoogleChart($project_stats) {
        $cnt = count($project_stats);
        $aux_stats = array();
        // substracting from 100 to invers the y axe
        for ($j= 0; $j < $cnt; $j++) {
            $aux_stats['google'][] = 100 - (int)$project_stats[$j]['avg_google_position'];
            $aux_stats['bing'][] = 100 - (int)$project_stats[$j]['avg_bing_position'];
            $aux_stats['yahoo'][] = 100 - (int)$project_stats[$j]['avg_yahoo_position'];
        }
        return $aux_stats;
    }

}