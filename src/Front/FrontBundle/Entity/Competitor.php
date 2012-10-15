<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Competitor
 */
class Competitor {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $competitorName
     */
    private $competitorName;

    /**
     * @var string $competitorDomain
     */
    private $competitorDomain;

    /**
     * @var date $added
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
     * Set competitorName
     *
     * @param string $competitorName
     */
    public function setCompetitorName($competitorName) {
        $this->competitorName = $competitorName;
    }

    /**
     * Get competitorName
     *
     * @return string 
     */
    public function getCompetitorName() {
        return $this->competitorName;
    }

    /**
     * Set competitorDomain
     *
     * @param string $competitorDomain
     */
    public function setCompetitorDomain($competitorDomain) {
        $this->competitorDomain = $competitorDomain;
    }

    /**
     * Get competitorDomain
     *
     * @return string 
     */
    public function getCompetitorDomain() {
        return $this->competitorDomain;
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