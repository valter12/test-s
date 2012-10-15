<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Ips
 */
class Ips {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $ipServer
     */
    private $ipServer;

    /**
     * @var datetime $lastUsed
     */
    private $lastUsed;

    /**
     * @var date $added
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
     * Set ipServer
     *
     * @param string $ipServer
     */
    public function setIpServer($ipServer) {
        $this->ipServer = $ipServer;
    }

    /**
     * Get ipServer
     *
     * @return string 
     */
    public function getIpServer() {
        return $this->ipServer;
    }

    /**
     * Set lastUsed
     *
     * @param datetime $lastUsed
     */
    public function setLastUsed($lastUsed) {
        $this->lastUsed = $lastUsed;
    }

    /**
     * Get lastUsed
     *
     * @return datetime 
     */
    public function getLastUsed() {
        return $this->lastUsed;
    }

    /**
     * Set added
     *
     * @param date $added
     */
    public function setAdded($added) {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return date 
     */
    public function getAdded() {
        return $this->added;
    }

}