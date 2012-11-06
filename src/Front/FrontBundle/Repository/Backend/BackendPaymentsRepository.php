<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendPaymentsRepository extends EntityRepository {

    public function getProjectStats() {
        $query = "
            
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetch(2);
        return $result;
    }
    
}