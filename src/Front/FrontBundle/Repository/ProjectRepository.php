<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectRepository extends Backend\BackendProjectRepository {

    /**
     * returns the list of projects of a user
     * @return type
     */
    public function getProjects($user_id) {
        $query = "
            SELECT p.*, pc.category_name, (SELECT COUNT(k.id) FROM keyword k WHERE k.project_id=p.id) AS cnt_keywords
            FROM project p, project_category pc, user u
            WHERE p.category_id = pc.id
            AND pc.user_id=u.id
            AND u.id=:user_id 
            ORDER BY p.added DESC
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id));

        $result = $q->fetchAll(2);
        return $result;
    }

    public function deleteProjectByHash($user_id, $project_hash) {
        $query = "
            DELETE FROM project
            WHERE project_hash=:project_hash
            AND user_id=:user_id
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':project_hash' => $project_hash));
    }

    public function getProjectByHash($user_id, $project_hash) {
        $query = "
            SELECT p.*, pr.category_name
            FROM project p LEFT JOIN project_category pr ON p.category_id = pr.id
            WHERE p.project_hash=:project_hash
            AND p.user_id=:user_id
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':project_hash' => $project_hash));
        return $q->fetch(2);
    }

    public function modifyProject($user_id, $project_hash, $project_name, $project_desc, $category_id) {
        $query = "
            UPDATE project
            SET project_name=:project_name, project_description=:project_desc, category_id=:category_id
            WHERE project_hash=:project_hash
            AND user_id=:user_id
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':project_hash' => $project_hash, ':project_name' => $project_name, ':project_desc' => $project_desc, ':category_id' => $category_id));
    }

    /**
     * checks if secret hash exists
     * @param string $secret_hash
     * @return type
     */
    public function secretHashExists($secret_hash) {
        $query = "SELECT COUNT(id) AS cnt FROM project WHERE project_hash=:secret_hash";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':secret_hash' => $secret_hash));

        $result = $q->fetch(2);
        return $result['cnt'];
    }

    public function createProject($user_id, $project_name, $project_desc, $project_domain, $category_id) {
        $hash_length = 10;
        $string = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $string = str_shuffle($string);
        $rand = rand(0, strlen($string) - $hash_length);
        $secret_hash = substr($string, $rand, $hash_length);

        while ($this->secretHashExists($secret_hash)) {
            $string = str_shuffle($string);
            $rand = rand(0, strlen($string) - $hash_length);
            $secret_hash = substr($string, $rand, $hash_length);
        }
        $query = "
            INSERT INTO project(user_id, category_id, project_name, project_description, project_domain, project_hash, added)
            VALUES(:user_id, :category_id, :project_name, :project_description, :project_domain, :project_hash, NOW())
        ";

        $params = array(
            ':user_id' => $user_id,
            ':category_id' => $category_id,
            ':project_name' => $project_name,
            ':project_description' => $project_desc,
            ':project_domain' => $project_domain,
            ':project_hash' => strtoupper($secret_hash),
        );

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }

    public function cntProjects($user_id) {
        $query = "
            SELECT COUNT(id) AS cnt FROM project WHERE user_id=:user_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id));
        $result = $q->fetch(2);
        return $result['cnt'];
    }

    public function getProjectDataByKeyword($keyword_id) {
        $query = "
            SELECT p.*
            FROM project p, keyword k
            WHERE k.id=:keyword_id
            AND p.id=k.project_id
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':keyword_id' => $keyword_id));
        $result = $q->fetch(2);
        return $result;
    }

}