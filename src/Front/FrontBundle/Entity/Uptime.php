<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Uptime
 */
class Uptime {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $siteStatus
     */
    private $siteStatus;

    /**
     * @var datetime $checkDate
     */
    private $checkDate;

    /**
     * @var Front\FrontBundle\Entity\Project
     */
    private $project;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set siteStatus
     *
     * @param string $siteStatus
     */
    public function setSiteStatus($siteStatus) {
        $this->siteStatus = $siteStatus;
    }

    /**
     * Get siteStatus
     *
     * @return string 
     */
    public function getSiteStatus() {
        return $this->siteStatus;
    }

    /**
     * Set checkDate
     *
     * @param datetime $checkDate
     */
    public function setCheckDate($checkDate) {
        $this->checkDate = $checkDate;
    }

    /**
     * Get checkDate
     *
     * @return datetime 
     */
    public function getCheckDate() {
        return $this->checkDate;
    }

    /**
     * Set project
     *
     * @param Front\FrontBundle\Entity\Project $project
     */
    public function setProject(\Front\FrontBundle\Entity\Project $project) {
        $this->project = $project;
    }

    /**
     * Get project
     *
     * @return Front\FrontBundle\Entity\Project 
     */
    public function getProject() {
        return $this->project;
    }

}