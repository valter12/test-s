<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Front\FrontBundle\Repository\Backend\BackendCompetitorRepository;

class CompetitorRepository extends BackendCompetitorRepository {

    public function getCompetitorsByKeywordId($keyword_id) {
        $query = "
            SELECT c.* 
            FROM competitor c, project p, keyword k
            WHERE k.project_id = p.id
            AND c.project_id = p.id
            AND k.id = :keyword_id
            ORDER BY c.added DESC
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getCompetitorsByProjectId($project_id) {
        $query = "
            SELECT c.* 
            FROM competitor c
            WHERE c.project_id=:project_id
            ORDER BY c.added DESC
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getUserOwnsCompetitorByKeyword($keyword_id, $competitor_id) {
        $query = "
            SELECT COUNT(c.id ) AS cnt
            FROM competitor c, project p, keyword k
            WHERE k.project_id = p.id
            AND c.project_id = p.id
            AND k.id = :keyword_id
            AND c.id = :competitor_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id, ':competitor_id' => $competitor_id));
        $result = $q->fetch(2);
        return $result['cnt'];
    }
    
    public function getCompetitorByProjectHash($user_id, $project_hash) {
        $query = "
            SELECT c.*
            FROM competitor c, project p
            WHERE p.project_hash=:project_hash
            AND c.project_id = p.id
            AND p.user_id=:user_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':project_hash' => $project_hash));
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getCntProjectCompetitorsById($project_id) {
        $query = "
            SELECT COUNT(c.id) AS cnt
            FROM competitor c
            WHERE c.project_id=:project_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id));
        $result = $q->fetch(2);
        return $result['cnt'];
    }
    
    public function deleteCompetitorById($user_id, $competitor_id) {
        $query = "
            DELETE FROM competitor
            WHERE id=:competitor_id
            AND project_id IN(SELECT p.id FROM project p WHERE p.user_id=:user_id)
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':competitor_id' => $competitor_id));
    }
    
    public function createCompetitor($project_id, $competitor_name, $competitor_domain) {
        $query = "
            INSERT INTO competitor(project_id, competitor_name, competitor_domain, added)
            VALUES(:project_id, :competitor_name, :competitor_domain, NOW())
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id, ':competitor_name' => $competitor_name, ':competitor_domain' => $competitor_domain));
    }
    
    public function getCompetitorById($user_id, $competitor_id) {
        $query = "
            SELECT c.*, p.project_hash, p.project_name
            FROM competitor c, project p
            WHERE c.project_id=p.id
            AND p.user_id=:user_id
            AND c.id=:competitor_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':competitor_id' => $competitor_id, ':user_id' => $user_id));
        $result = $q->fetch(2);
        return $result;
    }
    
    public function modifyCompetitor($user_id, $competitor_id, $project_hash, $competitor_name) {
        $query = "
            UPDATE competitor SET competitor_name=:competitor_name
            WHERE id=:competitor_id
            AND project_id IN(SELECT id FROM project WHERE user_id=:user_id AND project_hash=:project_hash)
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':competitor_id' => $competitor_id, ':competitor_name' => $competitor_name, 'project_hash' => $project_hash));
    }
    
    public function getCompetitorsByUserId($user_id) {
        $query = "
            SELECT c.*, p.project_name
            FROM competitor c, project p
            WHERE c.project_id=p.id
            AND p.user_id=:user_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id));
        $result = $q->fetchAll(2);
        return $result;
    }

}