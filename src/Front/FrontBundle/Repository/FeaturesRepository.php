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

    public function getFeature($feature_id, $is_active=NULL) {
        $params = array();
        $condition_str = '';
        if(is_numeric($is_active)) {
            $params[':is_active'] = 1;
            $condition_str .= ' AND f.is_active=:is_active';
        }
        $params[':feature_id'] = $feature_id;
        
        $query = "SELECT f.* FROM features f WHERE f.id=:feature_id ".$condition_str;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetch(2);
        return $result;
    }

}