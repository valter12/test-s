<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class KeywordTrackRepository extends EntityRepository {

    public function getKeywordStats($keyword_id, $results_per_page, $from_date, $to_date, $page, $order='DESC') {
        $sql_date = $params = array();
        $sql_date_str = false;
        if ($from_date) {
            $sql_date[] = "track_date<=:from_date";
            $params[':from_date'] = $from_date;
        }
        if ($to_date) {
            $sql_date[] = "track_date>=:to_date";
            $params[':to_date'] = $to_date;
        }
        if (!empty($params)) {
            $sql_date_str = " AND " . implode(' AND ', $sql_date);
        }
        $query = "
            SELECT COUNT(*) AS total
            FROM keyword_track
            WHERE keyword_id=:keyword_id
            " . $sql_date_str . "
        ";
        $params[':keyword_id'] = $keyword_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result_total = $q->fetch(2);
        $total = $result_total['total'];

        $limit_str = '';
        if($results_per_page) {
            $offset = ($page - 1) * $results_per_page + 1;
            if($offset == 1) {
                $offset = 0;
            }
            $limit_str = "LIMIT " . $offset . ", " . $results_per_page;
        }
        $query = "
            SELECT *, DATE_FORMAT(track_date, '%Y-%m-%d') AS track_date, id AS track_id
            FROM keyword_track
            WHERE keyword_id=:keyword_id
            " . $sql_date_str . "
            ORDER BY track_date ".$order."
        ".$limit_str;
        
        $params[':keyword_id'] = $keyword_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetchAll(2);
//        echo '<pre>';print_r($result);die;
        return array('result_final' => $result, 'total' => $total);
    }

    public function getKeywordStatsWithCompetitors($keyword_id, $competitor_ids, $results_per_page, $from_date, $to_date, $page, $order='DESC') {
        $sql_date = $params = array();
        $sql_date_str = false;

        // setting filter params
        if ($from_date) {
            $sql_date[] = "track_date<=:from_date";
            $params[':from_date'] = $from_date;
        }
        if ($to_date) {
            $sql_date[] = "track_date>=:to_date";
            $params[':to_date'] = $to_date;
        }
        if (!empty($params)) {
            $sql_date_str = " AND " . implode(' AND ', $sql_date);
        }

        // selecting count for pagination
        $query = "
            SELECT COUNT(*) AS total FROM (
                SELECT track_date FROM (
                    (SELECT 
                        DATE_FORMAT(track_date, '%Y-%m-%d') AS track_date
                    FROM
                        keyword_track
                    WHERE
                        keyword_id = :keyword_id " . $sql_date_str . ")
                    UNION ALL 
                    (SELECT 
                        DATE_FORMAT(track_date, '%Y-%m-%d') AS track_date
                    FROM
                        keyword_track_competitor
                    WHERE
                        keyword_id = :keyword_id " . $sql_date_str . " AND competitor_id IN (" . implode(', ', $competitor_ids) . ")
                    )
                ) AS union_track
                GROUP BY track_date
            ) AS total
        ";

        $params[':keyword_id'] = $keyword_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $total_result = $q->fetch(2);
        $total = $total_result['total'];

        $limit_str = '';
        if($results_per_page) {
            $offset = ($page - 1) * $results_per_page + 1;
            if($offset == 1) {
                $offset = 0;
            }
            $limit_str = "LIMIT " . $offset . ", " . $results_per_page;
        }
        // selecting dates with pagination from keyword_track and keyword_track_competitor
        $query = "
            SELECT track_date FROM(
                (SELECT DATE_FORMAT(track_date, '%Y-%m-%d') AS track_date FROM keyword_track WHERE keyword_id=:keyword_id " . $sql_date_str . ")
                UNION ALL
                (SELECT DATE_FORMAT(track_date, '%Y-%m-%d') AS track_date FROM keyword_track_competitor WHERE keyword_id=:keyword_id " . $sql_date_str . " AND competitor_id IN(" . implode(', ', $competitor_ids) . "))
            ) AS union_track
            ORDER BY DATE_FORMAT(track_date, '%Y-%m-%d') ".$order."
            ".$limit_str."
        ";

        $params[':keyword_id'] = $keyword_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result_dates = $q->fetchAll(2);

        for ($i = 0; $i < count($result_dates); $i++) {
            $dates[] = $result_dates[$i]['track_date'];
        }

        // selecting 
        for ($i = 0; $i < count($dates); $i++) {
            $q = $query_arr[] = "
                (SELECT 
                    kt.id AS track_id,
                    p.project_name AS competitor_name,
                    0 AS competitor_id,
                    DATE_FORMAT(kt.track_date, '%Y-%m-%d') AS project_added,
                    kt.keyword_id, 
                    '" . $dates[$i] . "' AS track_date,
                    kt.google_position, 
                    kt.bing_position, 
                    kt.yahoo_position, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.google_change, 0) AS google_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.bing_change, 0) AS bing_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.yahoo_change, 0) AS yahoo_change, 
                    kt.page_link_google, 
                    kt.page_link_bing, 
                    kt.page_link_yahoo, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.page_link_google_change, 0) AS page_link_google_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.page_link_bing_change, 0) AS page_link_bing_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.page_link_yahoo_change, 0) AS page_link_yahoo_change, 
                    kt.google_description, 
                    kt.bing_description, 
                    kt.yahoo_description, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.google_description_change, 0) AS google_description_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.bing_description_change, 0) AS bing_description_change, 
                    IF(DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "', kt.yahoo_description_change, 0) AS yahoo_description_change 
                FROM keyword k LEFT JOIN keyword_track kt ON kt.keyword_id=k.id AND (DATE_FORMAT(kt.track_date, '%Y-%m-%d')='" . $dates[$i] . "' OR DATE_FORMAT(kt.track_date, '%Y-%m-%d')=(SELECT MAX(DATE_FORMAT(track_date, '%Y-%m-%d')) FROM keyword_track WHERE DATE_FORMAT(track_date, '%Y-%m-%d')<'" . $dates[$i] . "' AND keyword_id=kt.keyword_id)), project p
                WHERE k.id=" . $keyword_id . "
                AND k.project_id=p.id
                ORDER BY DATE_FORMAT(kt.track_date, '%Y-%m-%d') DESC
                LIMIT 1)
            ";
        }

        $sql = implode(' UNION ', $query_arr);
        $q = $this->getEntityManager()->getConnection()->executeQuery($sql);
        $result_all = $q->fetchAll(2);

        foreach ($result_all as $key => $value) {
            $result_final[$value['track_date']][$value['competitor_name']][] = $value;
        }

        $query_arr = array();

        for ($i = 0; $i < count($dates); $i++) {
            for ($j = 0; $j < count($competitor_ids); $j++) {
                $q = $query_arr[] = "
                    (SELECT 
                        ktc.id AS track_id,
                        c.competitor_name,
                        c.id AS competitor_id,
                        DATE_FORMAT(c.added, '%Y-%m-%d') AS project_added,
                        ktc.competitor_id,
                        ktc.keyword_id,
                        '" . $dates[$i] . "' AS track_date,
                        ktc.google_position,
                        ktc.bing_position,
                        ktc.yahoo_position,
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.google_change, 0) AS google_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.bing_change, 0) AS bing_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.yahoo_change, 0) AS yahoo_change, 
                        ktc.page_link_google,
                        ktc.page_link_bing,
                        ktc.page_link_yahoo,
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.page_link_google_change, 0) AS page_link_google_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.page_link_bing_change, 0) AS page_link_bing_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.page_link_yahoo_change, 0) AS page_link_yahoo_change, 
                        ktc.google_description,
                        ktc.bing_description,
                        ktc.yahoo_description,
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.google_description_change, 0) AS google_description_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.bing_description_change, 0) AS bing_description_change, 
                        IF(DATE_FORMAT(ktc.track_date, '%Y-%m-%d')='" . $dates[$i] . "', ktc.yahoo_description_change, 0) AS yahoo_description_change 
                    FROM
                        competitor c
                    LEFT JOIN keyword_track_competitor ktc ON ktc.competitor_id = c.id AND ktc.keyword_id = " . $keyword_id . " AND ktc.competitor_id = " . $competitor_ids[$j] . " AND (DATE_FORMAT(ktc.track_date, '%Y-%m-%d') = '" . $dates[$i] . "' OR DATE_FORMAT(ktc.track_date, '%Y-%m-%d')=(SELECT MAX(DATE_FORMAT(track_date, '%Y-%m-%d')) FROM keyword_track_competitor WHERE DATE_FORMAT(track_date, '%Y-%m-%d')<'" . $dates[$i] . "' AND keyword_id=ktc.keyword_id AND competitor_id=" . $competitor_ids[$j] . "))
                    WHERE c.id = " . $competitor_ids[$j] . "
                    ORDER BY DATE_FORMAT(ktc.track_date, '%Y-%m-%d') ".$order."
                    LIMIT 1)
                ";
//                die($q);
            }
        }

        $result_arr = array();
        $sql = implode(' UNION ', $query_arr);

        $q = $this->getEntityManager()->getConnection()->executeQuery($sql);
        $result_all = $q->fetchAll(2);

        foreach ($result_all as $key => $value) {
            $result_final[$value['track_date']][$value['competitor_name']][] = $value;
        }

        foreach ($result_final as $date => &$array) {
            foreach ($array as $competitor_name => &$value) {
                $value = $value[0];
            }
        }

        return array('result_final' => $result_final, 'total' => $total);
    }

    public function getDescriptionChanges($user_id, $track_id) {
        $query = "
            SELECT 
                kt.google_description,
                kt.bing_description,
                kt.yahoo_description,
                kt.google_description_change,
                kt.bing_description_change,
                kt.yahoo_description_change
            FROM
                keyword_track kt,
                keyword k,
                project p
            WHERE
                kt.id = :track_id AND kt.keyword_id = k.id AND k.project_id = p.id AND p.user_id = :user_id
            UNION 
            SELECT 
                kt.google_description,
                kt.bing_description,
                kt.yahoo_description,
                kt.google_description_change,
                kt.bing_description_change,
                kt.yahoo_description_change
            FROM
                keyword_track kt,
                keyword k,
                project p
            WHERE
                kt.id = (SELECT MAX(id) FROM keyword_track WHERE id < :track_id AND keyword_id=(SELECT keyword_id FROM keyword_track WHERE id=:track_id) LIMIT 1) 
            AND kt.keyword_id = k.id AND k.project_id = p.id AND p.user_id = :user_id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':track_id' => $track_id, ':user_id' => $user_id));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getDescriptionChangesCompetitor($user_id, $track_id) {
        $query = "
            SELECT 
                ktc.google_description,
                ktc.bing_description,
                ktc.yahoo_description,
                ktc.google_description_change,
                ktc.bing_description_change,
                ktc.yahoo_description_change
            FROM
                keyword_track_competitor ktc,
                keyword k,
                project p
            WHERE
                ktc.id = :track_id AND ktc.keyword_id = k.id AND k.project_id = p.id AND p.user_id = :user_id
            UNION 
            SELECT 
                ktc.google_description,
                ktc.bing_description,
                ktc.yahoo_description,
                ktc.google_description_change,
                ktc.bing_description_change,
                ktc.yahoo_description_change
            FROM
                keyword_track_competitor ktc,
                keyword k,
                project p
            WHERE
                ktc.id = (SELECT MAX(id) FROM keyword_track_competitor WHERE id < :track_id AND keyword_id=(SELECT keyword_id FROM keyword_track_competitor WHERE id=:track_id) LIMIT 1) 
            AND ktc.keyword_id = k.id AND k.project_id = p.id AND p.user_id = :user_id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':track_id' => $track_id, ':user_id' => $user_id));
        $result = $q->fetchAll(2);
        return $result;
    }
    
}