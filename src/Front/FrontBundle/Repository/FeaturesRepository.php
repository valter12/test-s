<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FeaturesRepository extends EntityRepository {

    public function getFeatures($active=1) {
        $query = "SELECT f.* FROM features f WHERE is_active=:is_active ORDER BY f.added DESC";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':is_active' => $active));
        $result = $q->fetchAll(2);
        return $result;
    }

}