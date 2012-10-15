<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\EmailingSettings
 */
class EmailingSettings {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $frequency
     */
    private $frequency;

    /**
     * @var date $lastSent
     */
    private $lastSent;

    /**
     * @var Front\FrontBundle\Entity\User
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     */
    public function setFrequency($frequency) {
        $this->frequency = $frequency;
    }

    /**
     * Get frequency
     *
     * @return integer 
     */
    public function getFrequency() {
        return $this->frequency;
    }

    /**
     * Set lastSent
     *
     * @param date $lastSent
     */
    public function setLastSent($lastSent) {
        $this->lastSent = $lastSent;
    }

    /**
     * Get lastSent
     *
     * @return date 
     */
    public function getLastSent() {
        return $this->lastSent;
    }

    /**
     * Set user
     *
     * @param Front\FrontBundle\Entity\User $user
     */
    public function setUser(\Front\FrontBundle\Entity\User $user) {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Front\FrontBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

}