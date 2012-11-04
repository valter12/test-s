<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendUserRepository extends EntityRepository {

    public function getAllUsers() {
        $query = "
            SELECT u.*, 
                (SELECT COUNT(p.id) FROM project p WHERE p.user_id=u.id) AS project_cnt,
                (SELECT COUNT(k.id) FROM keyword k, project p1 WHERE p1.user_id=u.id AND k.project_id=p1.id) AS keyword_cnt
            FROM user u 
            ORDER BY u.added DESC";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }

}