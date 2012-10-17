<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectReportRepository extends EntityRepository {

    /**
     * gets user reports
     * @param type $user_id
     * @param type $project_hash
     * @return type
     */
    public function getReports($user_id, $project_hash) {
        $query = "
            SELECT *
            FROM project_report pr, project p
            WHERE p.user_id=:user_id
            AND pr.project_id=p.id
            AND p.project_hash=:project_hash
        ";
        $params[':user_id'] = $user_id;
        $params[':project_hash'] = $project_hash;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * stores report in db
     * @param type $project_id
     * @param type $report_title
     * @param type $report_desc
     * @param type $frequency
     * @param type $send_me
     * @param type $rest
     */
    public function saveReport($project_id, $report_title, $report_desc, $frequency, $send_me, $rest) {
        $query = "
            INSERT INTO project_report(project_id, report_title, report_desc, report_settings, frequency, send_me, added)
            VALUES(:project_id, :report_title, :report_desc, :report_settings, :frequency, :send_me, NOW())
        ";
        $params[':project_id'] = $project_id;
        $params[':report_title'] = $report_title;
        $params[':report_desc'] = $report_desc;
        $params[':report_settings'] = $rest;
        $params[':frequency'] = $frequency;
        $params[':send_me'] = $send_me;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    
    public function getReportData($user_id, $report_id) {
        $query = "
            SELECT *
            FROM project_report pr, project p
            WHERE p.user_id=:user_id
            AND pr.project_id=p.id
            AND pr.id=:report_id
        ";
        $params[':user_id'] = $user_id;
        $params[':report_id'] = $report_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetch(2);
        return $result;
    }

}