<?php

namespace Front\FrontBundle\Libs;

class CommonLib {

    /**
     * gets overall position on google,bing,yahoo for a certain project for a certain period of time
     */
    public static function getOverallKeywordsPosition($keyword_overall_for_graph, $min_date = false, $avg_all = false) {
        
        $keyword_overall_for_graph = array_reverse($keyword_overall_for_graph);
        $cnt_overall_for_graph = count($keyword_overall_for_graph);
        $first_date = $keyword_overall_for_graph[0]['track_date'];
        $last_date = $keyword_overall_for_graph[$cnt_overall_for_graph - 1]['track_date'];

        // formating data
        $keyword_overall_with_dates = array();
        for ($i = 0; $i < $cnt_overall_for_graph; $i++) {
            $date = $keyword_overall_for_graph[$i]['track_date'];
            $keyword_overall_with_dates[$date] = $keyword_overall_for_graph[$i];
        }
        // filling gaps in dates

        $cursor_date = $min_date?$min_date:$first_date;
        
        while ($cursor_date != $last_date) {
            if (!isset($keyword_overall_with_dates[$cursor_date])) { // if this date does not exist
                $keyword_overall_with_dates[$cursor_date] = self::getLastFullDate($keyword_overall_with_dates, $cursor_date);
            }
            $cursor_date = date('Y-m-d', strtotime('+1 day', strtotime($cursor_date)));
        }
        ksort($keyword_overall_with_dates);

        $result = array();

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
        return $result;
    }

    protected static function getLastFullDate($keyword_overall_with_dates, $cursor_date) {
        $saved_date = $cursor_date;
        for ($i = 0; $i < count($keyword_overall_with_dates); $i++) {
            if (@is_float($keyword_overall_with_dates[$cursor_date]) || @is_numeric($keyword_overall_with_dates[$cursor_date])) {
                return $keyword_overall_with_dates[$cursor_date];
            }
            $cursor_date = date('Y-m-d', strtotime('-1 day', strtotime($cursor_date)));
        }
        
        // if nothing found returning 100, that is default max position in SE
        return array(
            'avg_google_position' => 100,
            'avg_bing_position' => 100,
            'avg_yahoo_position' => 100,
            'track_date' => $saved_date,
        ); 
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