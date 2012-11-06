<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendPaymentsRepository extends EntityRepository {

    public function getAllPayments($filters = array()) {
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
                $conditions_str = ' WHERE '.implode(' AND ', $conditions);
            }
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