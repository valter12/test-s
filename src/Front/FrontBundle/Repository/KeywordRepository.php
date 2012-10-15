<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class KeywordRepository extends EntityRepository {

    public function getKeywordsByProject($project_id) {
        $query = "SELECT * FROM keyword WHERE project_id=:project_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getKeywordsByProjectHash($user_id, $project_hash) {
        $query = "SELECT * FROM keyword WHERE project_id=(SELECT id FROM project WHERE project_hash=:project_hash AND user_id=:user_id)";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_hash' => $project_hash, ':user_id' => $user_id));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getProjectKeywordCount($project_id) {
        $query = "SELECT COUNT(id) AS cnt FROM keyword WHERE project_id=:project_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id));
        $result = $q->fetch(2);
        return $result['cnt'];
        
    }

    public function userOwnsKeyword($user_id, $keyword_id) {
        $query = "
            SELECT COUNT(k.id) AS cnt 
            FROM keyword k, project p
            WHERE k.id=:keyword_id
            AND p.user_id=:user_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':keyword_id' => $keyword_id));

        $result = $q->fetch(2);
        return $result;
    }

    public function createKeyword($project_id, $keyword) {
        $query = "INSERT INTO keyword(project_id, keyword, added) VALUES(:project_id, :keyword, NOW())";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_id' => $project_id, ':keyword' => $keyword));
    }

    public function deleteKeywordById($keyword_id) {
        $query = "DELETE FROM keyword WHERE id=:keyword_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id));
    }

    public function getKeywordById($keyword_id) {
        $query = "SELECT * FROM keyword WHERE id=:keyword_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id));
        return $q->fetch(2);
    }
    
    public function getAllProjectKeywordsByOneKeywordId($keyword_id) {
        $query = "SELECT * FROM keyword WHERE project_id=(SELECT project_id FROM keyword WHERE id=:keyword_id)";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id));
        return $q->fetchAll(2);
    }


}