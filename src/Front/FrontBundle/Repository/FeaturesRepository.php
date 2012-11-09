<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FeaturesRepository extends EntityRepository {

    public function getFeatures($is_active=1, $for_homepage=0, $limit=false) {
        $params = array();
        $condition_str = $limit_str = '';
        if($for_homepage) {
            $params[':for_homepage'] = 1;
            $condition_str .= ' AND f.on_homepage=:for_homepage';
        }
        if($limit) {
            $limit_str = ' LIMIT '.$limit;
        }
        $params[':is_active'] = $is_active;
        
        $query = "
            SELECT f.* 
            FROM features f 
            WHERE f.is_active=:is_active ".$condition_str."
            ORDER BY f.added DESC
            ".$limit_str."
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
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