<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class KeywordTrackCompetitorRepository extends EntityRepository {

    /**
     * gets avg position for all keywords of a project
     */
    public function getProjectAvgPosition($project_id, $competitor_id, $date=false) {
        $params = array();
        $str_cond = '';
        
        if($date) {
            $cond[] = "DATE_FORMAT(ktc.track_date, '%Y-%m-%d') = '".$date."'";
        }
        
        if(!empty($cond)) {
            $str_cond = implode(' AND ', $cond);
            if(count($cond)==1) {
                $str_cond = ' AND '.$str_cond;
            }
        }
        
        $primary_query = "
            SELECT 
                MAX(ktc1.id) as id
            FROM keyword_track_competitor ktc1, keyword k1
            WHERE ktc1.keyword_id=k1.id
            AND k1.project_id=".$project_id."
            AND ktc1.competitor_id=".$competitor_id."
            GROUP BY k1.id
        ";
        
        $q_primary = $this->getEntityManager()->getConnection()->executeQuery($primary_query, array());
        $primary_result = $q_primary->fetchAll(2);
        if(empty($primary_result)) {
            return;
        }
        $cnt = count($primary_result);
        $ids = array();
        for($i=0;$i<$cnt;$i++) {
            $ids[] = $primary_result[$i]['id'];
        }
      
        $query = "
            SELECT  
                ((SUM(CASE WHEN ktc.google_position > 0 THEN ktc.google_position ELSE 100 END)+(((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")-COUNT(ktc.id))*100)))/((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")) as avg_google_position,
                ((SUM(CASE WHEN ktc.bing_position > 0 THEN ktc.google_position ELSE 100 END)+(((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")-COUNT(ktc.id))*100)))/((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")) as avg_bing_position,
                ((SUM(CASE WHEN ktc.yahoo_position > 0 THEN ktc.google_position ELSE 100 END)+(((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")-COUNT(ktc.id))*100)))/((SELECT COUNT(id) FROM keyword WHERE project_id=".$project_id.")) as avg_yahoo_position
            FROM keyword_track_competitor ktc
            WHERE 
            ktc.id IN (
                ".implode(',', $ids)."
            )
            AND DATE_FORMAT(ktc.track_date, '%Y-%m-%d') <= '".$date."'
            AND ktc.competitor_id = ".$competitor_id."
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetch(2);
        return $result;
    }
    
    public function getTop10keywordCntByProjectId($project_id, $competitor_id, $date=false) {
        $params = array();
        $str_cond = '';
        
        if($date) {
            $cond[] = "DATE_FORMAT({tbl_holder}.track_date, '%Y-%m-%d') <= '".$date."'";
        }
        
        if(!empty($cond)) {
            $str_cond = implode(' AND ', $cond);
            $str_cond = ' AND '.$str_cond;
        }
        
        $primary_query = "
            SELECT MAX(ktc1.track_date) as track_date, ktc1.keyword_id
            FROM keyword_track_competitor ktc1, keyword k1
            WHERE ktc1.keyword_id=k1.id
            AND k1.project_id=".$project_id." ".str_replace('{tbl_holder}', 'ktc1', $str_cond)."
            AND ktc1.competitor_id=".$competitor_id."
            GROUP BY k1.id
        ";
        
        $q_primary = $this->getEntityManager()->getConnection()->executeQuery($primary_query, array());
        $primary_result = $q_primary->fetchAll(2);
        if(empty($primary_result)) {
            return;
        }
        $cnt = count($primary_result);
        $ids = array();
        for($i=0;$i<$cnt;$i++) {
            $ids[] = "SELECT '".$primary_result[$i]['track_date']."' as track_date, '".$primary_result[$i]['keyword_id']."' as keyword_id";
        }
        $final_result = implode(' UNION ', $ids);
        $query = "
            SELECT 
                COUNT(k.id) as cnt
            FROM keyword_track_competitor ktc, keyword k,
            (
                ".$final_result."
            ) q
            WHERE ktc.keyword_id=k.id
            AND ktc.competitor_id=".$competitor_id."
            AND k.project_id=".$project_id." 
            AND (ktc.google_position BETWEEN 1 AND 10 OR ktc.bing_position BETWEEN 1 AND 10 OR ktc.yahoo_position BETWEEN 1 AND 10)
            AND ktc.keyword_id=q.keyword_id
            AND ktc.track_date=q.track_date ".str_replace('{tbl_holder}', 'ktc', $str_cond)."
        ";
        
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetch(2);
        return $result['cnt'];
    }
    
    public function getCntPositionsByProjectId($project_id, $competitor_id, $date=false, $direction='up') {
        $params = array();
        $str_cond = '';
        
        if($date) {
            $cond[] = "DATE_FORMAT(ktc.track_date, '%Y-%m-%d') = '".$date."'";
        }
        
        if($direction) {
            if($direction == 'up') {
                $sign = '>';
            } elseif($direction == 'down') {
                $sign = '<';
            }
            $cond[] = "(ktc.google_change ".$sign." 0 OR ktc.bing_change ".$sign." 0 OR ktc.yahoo_change ".$sign." 0)";
        }
        
        if(!empty($cond)) {
            $str_cond = implode(' AND ', $cond);
            $str_cond = ' AND '.$str_cond;
        }
        
        $query = "
            SELECT 
                COUNT(ktc.id) AS cnt
            FROM keyword_track_competitor ktc, keyword k
            WHERE ktc.keyword_id=k.id
            AND ktc.competitor_id=".$competitor_id."
            AND k.project_id=".$project_id." ".$str_cond."
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetch(2);
        return $result['cnt'];
    }
    
    public function getProjectUps($project_id, $competitor_id, $date=false, $direction='up') {
        $params = array();
        $str_cond = '';
        
        if($date) {
            $cond[] = "DATE_FORMAT(ktc.track_date, '%Y-%m-%d') = '".$date."'";
        }
        
        if($direction) {
            if($direction == 'up') {
                $sign = '>';
            } elseif($direction == 'down') {
                $sign = '<';
            }
            $cond[] = "(ktc.google_change ".$sign." 0 OR ktc.bing_change ".$sign." 0 OR ktc.yahoo_change ".$sign." 0)";
        }
        
        if(!empty($cond)) {
            $str_cond = implode(' AND ', $cond);
            $str_cond = ' AND '.$str_cond;
        }
        
        $query = "
            SELECT 
                k.id, k.keyword,
                ktc.google_position, ktc.bing_position, ktc.yahoo_position, 
                ktc.google_change, ktc.bing_change, ktc.yahoo_change
            FROM keyword_track_competitor ktc, keyword k
            WHERE ktc.keyword_id=k.id
            AND ktc.competitor_id=".$competitor_id."
            AND k.project_id=".$project_id." ".$str_cond."
            GROUP BY k.id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getTop10KeywordsByProjectId($project_id, $competitor_id) {
        $params = array();
        
        $primary_query = "
            SELECT MAX(ktc1.track_date) as track_date, ktc1.keyword_id
            FROM keyword_track_competitor ktc1, keyword k1
            WHERE ktc1.keyword_id=k1.id
            AND k1.project_id=".$project_id."
            AND ktc1.competitor_id=".$competitor_id."
            GROUP BY k1.id
        ";
        
        $q_primary = $this->getEntityManager()->getConnection()->executeQuery($primary_query, array());
        $primary_result = $q_primary->fetchAll(2);
        if(empty($primary_result)) {
            return;
        }
        $cnt = count($primary_result);
        $ids = array();
        for($i=0;$i<$cnt;$i++) {
            $ids[] = "SELECT '".$primary_result[$i]['track_date']."' as track_date, '".$primary_result[$i]['keyword_id']."' as keyword_id";
        }
        
        $query = "
            SELECT 
                k.id, k.keyword,
                ktc.google_position, ktc.bing_position, ktc.yahoo_position, 
                ktc.google_change, ktc.bing_change, ktc.yahoo_change
            FROM keyword_track_competitor ktc, keyword k,
            (
                ".implode(' UNION ', $ids)."
            ) q
            WHERE ktc.keyword_id=k.id
            AND k.project_id=".$project_id."
            AND (ktc.google_position BETWEEN 1 AND 10 OR ktc.bing_position BETWEEN 1 AND 10 OR ktc.yahoo_position BETWEEN 1 AND 10)
            AND ktc.keyword_id=q.keyword_id
            AND ktc.track_date=q.track_date
            GROUP BY k.id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getNewTop10KeywordsByProjectId($project_id, $competitor_id, $date, $interval) {
        $params = array();
        
        $query = "
            SELECT 
                k.id, k.keyword,
                ktc.google_position, ktc.bing_position, ktc.yahoo_position, 
                ktc.google_change, ktc.bing_change, ktc.yahoo_change
            FROM keyword_track_competitor ktc, keyword k,
            (
                SELECT MAX(ktc1.track_date) as track_date, ktc1.keyword_id
                FROM keyword_track_competitor ktc1, keyword k1
                WHERE ktc1.keyword_id=k1.id
                AND k1.project_id=".$project_id."
                AND ktc1.competitor_id=".$competitor_id."
                GROUP BY k1.id
            ) q
            WHERE ktc.keyword_id=k.id
            AND ktc.competitor_id=".$competitor_id."
            AND k.project_id=".$project_id."
            AND (ktc.google_position BETWEEN 1 AND 10 OR ktc.bing_position BETWEEN 1 AND 10 OR ktc.yahoo_position BETWEEN 1 AND 10)
            AND ktc.keyword_id=q.keyword_id
            AND ktc.track_date=q.track_date
            AND ktc.keyword_id NOT IN 
            (
                SELECT 
                ks.id
                FROM keyword_track_competitor kts, keyword ks,
                (
                    SELECT MAX(kt1s.track_date) as track_date, kt1s.keyword_id
                    FROM keyword_track_competitor kt1s, keyword k1s
                    WHERE kt1s.keyword_id=k1s.id
                    AND kt1s.competitor_id=".$competitor_id."
                    AND k1s.project_id=".$project_id."
                    AND DATE_FORMAT(kt1s.track_date, '%Y-%m-%d')<'".$date."'
                    GROUP BY k1s.id
                ) qs
                WHERE kts.keyword_id=ks.id
                AND kts.competitor_id=".$competitor_id."
                AND ks.project_id=".$project_id."
                AND (kts.google_position BETWEEN 1 AND 10 OR kts.bing_position BETWEEN 1 AND 10 OR kts.yahoo_position BETWEEN 1 AND 10)
                AND kts.keyword_id=qs.keyword_id
                AND kts.track_date=qs.track_date
            )
            GROUP BY k.id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getOutOfTop10KeywordsByProjectId($project_id, $date, $interval) {
        $params = array();
        
        $params[':date'] = $date;
        $params[':interval'] = $interval;
        
        $query = "
            SELECT 
                k.id, k.keyword,
                kt.google_position, kt.bing_position, kt.yahoo_position, 
                kt.google_change, kt.bing_change, kt.yahoo_change
            FROM keyword_track kt, keyword k
            WHERE kt.keyword_id=k.id
            AND k.project_id=:project_id AND DATE_FORMAT(kt.track_date, '%Y-%m-%d') = DATE_SUB(:date, INTERVAL :interval DAY)
            AND (kt.google_position BETWEEN 1 AND 10 OR kt.bing_position BETWEEN 1 AND 10 OR kt.yahoo_position BETWEEN 1 AND 10)
            AND kt.keyword_id NOT IN
            (
                SELECT 
                    k1.id
                FROM keyword_track kt1, keyword k1
                WHERE kt1.keyword_id=k1.id
                AND k1.project_id=:project_id AND DATE_FORMAT(kt1.track_date, '%Y-%m-%d') = :date
                AND (kt1.google_position BETWEEN 1 AND 10 OR kt1.bing_position BETWEEN 1 AND 10 OR kt1.yahoo_position BETWEEN 1 AND 10)
            )
            GROUP BY k.id
        ";
        
        $params[':project_id'] = $project_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getKeywordRanksForCertainDate($keyword_ids, $date) {
        $params = array();
        if(empty($keyword_ids)) {
            return;
        }
        $params[':date'] = $date;
        
        $query = "
            SELECT 
                kt.keyword_id,
                kt.google_position,
                kt.bing_position,
                kt.yahoo_position
            FROM keyword_track kt
            WHERE DATE_FORMAT(kt.track_date, '%Y-%m-%d') = :date
            AND kt.keyword_id IN (".implode(',', $keyword_ids).")
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function isProjectParsed($project_id) {
        $params[':project_id'] = $project_id;
        
        $query = "
            SELECT 
                (SELECT COUNT(id) FROM keyword WHERE project_id=:project_id AND DATE_FORMAT(last_track, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')) as keywords_tracked,
                (SELECT COUNT(id) FROM keyword WHERE project_id=:project_id) as total_keywords
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        
        $result = $q->fetch(2);

        return $result['keywords_tracked'] == $result['total_keywords'];
    }
}
