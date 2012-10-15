<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TrialDomainRepository extends EntityRepository {

    public function domainWasTrial($project_domain) {
        $query = "SELECT COUNT(id) AS cnt FROM trial_domain WHERE domain_name=:project_domain";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':project_domain' => $project_domain));
        $result = $q->fetch(2);
        return $result['cnt'];
    }

}