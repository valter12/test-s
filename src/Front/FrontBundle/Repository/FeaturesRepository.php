<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FeaturesRepository extends EntityRepository {

    public function getFeatures($is_active=1) {
        $query = "SELECT f.* FROM features f WHERE f.is_active=:is_active ORDER BY f.added DESC";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':is_active' => $is_active));
        $result = $q->fetchAll(2);
        return $result;
    }

    public function getFeature($feature_id, $is_active=1) {
        $query = "SELECT f.* FROM features f WHERE is_active=:is_active AND f.id=:feature_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':is_active' => $is_active, ':feature_id' => $feature_id));
        $result = $q->fetch(2);
        return $result;
    }

}