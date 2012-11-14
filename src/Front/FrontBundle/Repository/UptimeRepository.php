<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UptimeRepository extends EntityRepository {

    public function getProjectUptime($user_id, $project_id, $from_date, $to_date) {
        $sql_date_str = false;
        if ($from_date) {
            $sql_date[] = "summary_date>=:from_date";
            $params[':from_date'] = $from_date;
        }
        if ($to_date) {
            $sql_date[] = "summary_date<=:to_date";
            $params[':to_date'] = $to_date;
        }
        if (!empty($params)) {
            $sql_date_str = " AND " . implode(' AND ', $sql_date);
        }
        
        $query = "
            SELECT pus.*
            FROM project_uptime_summary pus, project p
            WHERE p.user_id=:user_id
            AND pus.project_id=p.id
            AND p.id=:project_id
            ".$sql_date_str."
        ";
        $params[':user_id'] = $user_id;
        $params[':project_id'] = $project_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetchAll(2);
        return $result;
    }

}