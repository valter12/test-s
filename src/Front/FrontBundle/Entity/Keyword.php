<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Keyword
 */
class Keyword {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $keyword
     */
    private $keyword;

    /**
     * @var date $lastTrack
     */
    private $lastTrack;

    /**
     * @var datetime $added
     */
    private $added;

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
     * Set keyword
     *
     * @param string $keyword
     */
    public function setKeyword($keyword) {
        $this->keyword = $keyword;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword() {
        return $this->keyword;
    }

    /**
     * Set trackFrequency
     *
     * @param integer $trackFrequency
     */
    public function setTrackFrequency($trackFrequency) {
        $this->trackFrequency = $trackFrequency;
    }

    /**
     * Get trackFrequency
     *
     * @return integer 
     */
    public function getTrackFrequency() {
        return $this->trackFrequency;
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