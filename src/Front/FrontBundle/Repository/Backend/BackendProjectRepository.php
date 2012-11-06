<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendProjectRepository extends EntityRepository {

    public function getProjectStats() {
        $query = "
            SELECT 
                (SELECT COUNT(p.id) FROM project p) AS total_project_cnt,
                (SELECT COUNT(u.id) FROM user u) AS total_user_cnt,
                (SELECT COUNT(p.id) FROM project p, user u WHERE u.id=p.user_id AND u.is_deleted=1) AS total_deleted_projects,
                (SELECT COUNT(u.id) FROM user u WHERE u.is_deleted=1) AS total_deleted_users,
                (SELECT COUNT(u.id) FROM user u WHERE u.is_trial=1) AS total_trial_users,
                (SELECT COUNT(p.id) FROM project p, user u WHERE u.id=p.user_id AND (u.is_deleted=0 OR u.is_deleted IS NULL)) AS total_active_projects,
                (SELECT COUNT(u.id) FROM user u WHERE u.is_deleted=0 OR u.is_deleted IS NULL) AS total_active_users,
                (SELECT COUNT(p.id)/(SELECT COUNT(u.id) FROM user u WHERE u.is_deleted=0 OR u.is_deleted IS NULL)
                    FROM project p, user u 
                    WHERE u.id=p.user_id 
                    AND (u.is_deleted=0 OR u.is_deleted IS NULL)) AS avg_projects_per_user,
                (SELECT COUNT(c.id)/(SELECT COUNT(p.id) FROM project p, user u WHERE u.id=p.user_id AND (u.is_deleted=0 OR u.is_deleted IS NULL))
                    FROM competitor c, project p, user u
                    WHERE c.project_id=p.id
                    AND p.user_id=u.id
                    AND (u.is_deleted=0 OR u.is_deleted IS NULL)
                    ) AS avg_competitors_per_project,
                (SELECT COUNT(k.id)/(SELECT COUNT(p.id) FROM project p, user u WHERE u.id=p.user_id AND (u.is_deleted=0 OR u.is_deleted IS NULL))
                    FROM keyword k, project p, user u
                    WHERE k.project_id=p.id
                    AND p.user_id=u.id
                    AND (u.is_deleted=0 OR u.is_deleted IS NULL)
                    )AS avg_keywords_per_project,
                (SELECT COUNT(pr.id) FROM project_report pr) AS total_project_reports,
                (SELECT COUNT(pr.id) 
                    FROM project_report pr, project p, user u 
                    WHERE u.id=p.user_id 
                    AND pr.project_id=p.id
                    AND u.is_deleted=1
                    ) AS total_deleted_reports,
                (SELECT COUNT(pr.id) 
                    FROM project_report pr, project p, user u 
                    WHERE u.id=p.user_id 
                    AND pr.project_id=p.id
                    AND (u.is_deleted=0 OR u.is_deleted IS NULL)
                    ) AS total_active_reports,
                (SELECT COUNT(pr.id)/(SELECT COUNT(p.id) FROM project p, user u WHERE u.id=p.user_id AND (u.is_deleted=0 OR u.is_deleted IS NULL))
                    FROM project_report pr, project p, user u
                    WHERE pr.project_id=p.id
                    AND p.user_id=u.id
                    AND (u.is_deleted=0 OR u.is_deleted IS NULL)
                    )AS avg_reports_per_project
                
            ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetch(2);
        return $result;
    }
    
    public function getTrialDomains() {
        $query = "SELECT td.* FROM trial_domain td ORDER BY td.added ASC";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function deleteTrialDomain($id) {
        $query = "DELETE FROM trial_domain WHERE id=:id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));
    }

    public function getPackageStats() {
        $query = "
            SELECT pk.package_name, COUNT(u.id) as cnt_users 
            FROM package pk, user u
            WHERE u.package_id=pk.id
            GROUP BY pk.id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
}