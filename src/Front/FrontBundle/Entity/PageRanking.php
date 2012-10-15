<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\PageRanking
 */
class PageRanking {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $googleRank
     */
    private $googleRank;

    /**
     * @var integer $alexaRank
     */
    private $alexaRank;

    /**
     * @var date $checkDate
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
     * Set googleRank
     *
     * @param integer $googleRank
     */
    public function setGoogleRank($googleRank) {
        $this->googleRank = $googleRank;
    }

    /**
     * Get googleRank
     *
     * @return integer 
     */
    public function getGoogleRank() {
        return $this->googleRank;
    }

    /**
     * Set alexaRank
     *
     * @param integer $alexaRank
     */
    public function setAlexaRank($alexaRank) {
        $this->alexaRank = $alexaRank;
    }

    /**
     * Get alexaRank
     *
     * @return integer 
     */
    public function getAlexaRank() {
        return $this->alexaRank;
    }

    /**
     * Set checkDate
     *
     * @param date $checkDate
     */
    public function setCheckDate($checkDate) {
        $this->checkDate = $checkDate;
    }

    /**
     * Get checkDate
     *
     * @return date 
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