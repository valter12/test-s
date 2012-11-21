<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendCompetitorRepository extends EntityRepository {

    public function getMda() {
        return 'shaz way';
    }

}