<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Logs
 */
class Features {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $logMessage
     */
    private $logMessage;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

}