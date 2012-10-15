<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Logs
 */
class Logs {

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

    /**
     * Set logMessage
     *
     * @param string $logMessage
     */
    public function setLogMessage($logMessage) {
        $this->logMessage = $logMessage;
    }

    /**
     * Get logMessage
     *
     * @return string 
     */
    public function getLogMessage() {
        return $this->logMessage;
    }

    /**
     * Set added
     *
     * @param datetime $added
     */
    public function setAdded($added) {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return datetime 
     */
    public function getAdded() {
        return $this->added;
    }

}