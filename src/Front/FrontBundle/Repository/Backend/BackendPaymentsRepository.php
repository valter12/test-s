<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendPaymentsRepository extends EntityRepository {

    protected function getFilters($filters) {
        $conditions_str = '';
        if(!empty($filters)) {
            $conditions = array();
            if(isset($filters['from_date'])) {
                $conditions[] = "pa.added>='".$filters['from_date']."'";
            }
            if(isset($filters['to_date'])) {
                $conditions[] = "pa.added<='".$filters['to_date']."'";
            }
            if(isset($filters['user_id'])) {
                $conditions[] = "pa.user_id='".$filters['user_id']."'";
            }
            if(isset($filters['package_id'])) {
                $conditions[] = "pa.package_id='".$filters['package_id']."'";
            }
            if(isset($filters['payment_method'])) {
                $conditions[] = "pa.method='".$filters['payment_method']."'";
            }
            if(!empty($conditions)) {
                $conditions_str = implode(' AND ', $conditions);
            }
        }
        return $conditions_str;
    }
    
    public function getPaymentsStats($filters) {
        $conditions_str = $this->getFilters($filters);
        if($conditions_str) {
            $conditions_str = ' WHERE '.$conditions_str;
        }
        
        $query = "
            SELECT 
                (SELECT SUM(pa.amount) FROM payments pa ".$conditions_str.") as money_till_now,
                (SELECT SUM(pk.package_price)
                    FROM package pk, user u
                    WHERE pk.id=u.package_id
                    AND u.is_deleted=0
                    AND u.is_trial=0
                    AND DATE_FORMAT(u.added, '%Y-%m-%d')<=DATE_SUB(NOW(), INTERVAL 1 month)
                    ) as to_receive_this_month,
                (SELECT SUM(pk.package_price)
                    FROM package pk, user u
                    WHERE pk.id=u.package_id
                    AND u.is_deleted=0
                    AND u.is_trial=0
                    ) as to_receive_next_month
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetch(2);
        return $result;
    }
    
    public function getPaymentsStatsPerMethod() {
        $query = "
            SELECT SUM(pa.amount) as amount, pa.method
            FROM payments pa
            GROUP BY pa.method
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getPaymentsMethodPercentage($filters) {
        $conditions_str = $this->getFilters($filters);
        if($conditions_str) {
            $conditions_str = ' WHERE '.$conditions_str;
        }
        $query = "
            SELECT count(pa.id)*100/(SELECT COUNT(pa.id) FROM payments pa ".$conditions_str.") as percent, pa.method
            FROM payments pa
            ".$conditions_str."
            GROUP BY pa.method
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * list of all payments
     */
    public function getAllPayments($filters = array()) {
        $conditions_str = $this->getFilters($filters);
        if($conditions_str) {
            $conditions_str = ' WHERE '.$conditions_str;
        }
        $query = "
            SELECT pa.*, u.id AS user_id, u.f_name, u.l_name, pk.package_name as package
            FROM payments pa LEFT JOIN user u ON pa.user_id=u.id LEFT JOIN package pk ON pk.id=pa.package_id
            ".$conditions_str."
            ORDER BY pa.added ASC
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }

}