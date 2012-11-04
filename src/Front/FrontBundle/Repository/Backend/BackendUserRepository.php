<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendUserRepository extends EntityRepository {

    public function getMda() {
        return 'shaz way';
    }

}