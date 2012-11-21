<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CronWatcherRepository extends EntityRepository {

    public function getNonReadLogs() {
        $query = "
            SELECT cw.*, MAX(cw.cron_status)
            FROM cron_watcher cw
            WHERE cw.is_read=0
            GROUP BY cw.session_id
            ORDER BY cw.added ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    protected function getSessionIdsByIds($ids) {
        $session_ids = array();
        $query = "
            SELECT session_id FROM cron_watcher WHERE id IN(".implode(',', $ids).")
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        $cnt = count($result);
        for($i=0;$i<$cnt;$i++) {
            $session_ids[] = "'".$result[$i]['session_id']."'";
        }
        return $session_ids;
    }
    
    public function deleteByIds($ids) {
        $session_ids = $this->getSessionIdsByIds($ids);
        
        $query = "
            DELETE FROM cron_watcher
            WHERE session_id IN (".implode(',', $session_ids).")
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
    }
    
    public function markAsReadByIds($ids) {
        $session_ids = $this->getSessionIdsByIds($ids);
        
        $query = "
            UPDATE cron_watcher SET is_read=1
            WHERE session_id IN (".implode(',', $session_ids).")
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
    }

    public function getLogs($filter_params) {
        $conditions_str = $this->getFilters($filter_params);
        if($conditions_str) {
            $conditions_str = ' WHERE '.$conditions_str;
        }
        $query = "
            SELECT cw.*, MAX(cw.cron_status)
            FROM cron_watcher cw
            ".$conditions_str."
            GROUP BY cw.session_id
            ORDER BY cw.added ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    protected function getFilters($filters) {
        $conditions_str = '';
        if(!empty($filters)) {
            $conditions = array();
            if(isset($filters['from_date'])) {
                $conditions[] = "cw.added>='".$filters['from_date']."'";
            }
            if(isset($filters['to_date'])) {
                $conditions[] = "cw.added<='".$filters['to_date']."'";
            }
            if(isset($filters['cron_status'])) {
                $conditions[] = "cw.cron_status='".$filters['cron_status']."'";
            }
            if(isset($filters['cron_name'])) {
                $conditions[] = "cw.cron_name='".$filters['cron_name']."'";
            }
            if(isset($filters['is_read'])) {
                $conditions[] = "cw.is_read='".($filters['is_read']=='yes'?1:0)."'";
            }
            if(!empty($conditions)) {
                $conditions_str = implode(' AND ', $conditions);
            }
        }
        return $conditions_str;
    }
    
    public function getCronProfile($session_id) {
        $query = "
            SELECT cw.*
            FROM cron_watcher cw
            WHERE cw.session_id=:session_id
            ORDER BY cw.added ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':session_id' => $session_id));
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getCriticalErrors() {
        $query = "
            SELECT l.*
            FROM logs l
            ORDER BY l.added ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function deleteCriticalErrorsByIds($ids) {
        $query = "
            DELETE FROM logs WHERE id IN(".implode(',', $ids).")
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
    }
    
    public function markCriticalErrorsAsReadByIds($ids) {
        $query = "
            UPDATE logs SET is_read=1 WHERE id IN(".implode(',', $ids).")
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
    }
    
}