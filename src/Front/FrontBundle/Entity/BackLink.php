<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\BackLink
 */
class BackLink {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $googleBackLinks
     */
    private $googleBackLinks;

    /**
     * @var integer $bingBackLinks
     */
    private $bingBackLinks;

    /**
     * @var integer $yahooBackLinks
     */
    private $yahooBackLinks;

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
     * Set googleBackLinks
     *
     * @param integer $googleBackLinks
     */
    public function setGoogleBackLinks($googleBackLinks) {
        $this->googleBackLinks = $googleBackLinks;
    }

    /**
     * Get googleBackLinks
     *
     * @return integer 
     */
    public function getGoogleBackLinks() {
        return $this->googleBackLinks;
    }

    /**
     * Set bingBackLinks
     *
     * @param integer $bingBackLinks
     */
    public function setBingBackLinks($bingBackLinks) {
        $this->bingBackLinks = $bingBackLinks;
    }

    /**
     * Get bingBackLinks
     *
     * @return integer 
     */
    public function getBingBackLinks() {
        return $this->bingBackLinks;
    }

    /**
     * Set yahooBackLinks
     *
     * @param integer $yahooBackLinks
     */
    public function setYahooBackLinks($yahooBackLinks) {
        $this->yahooBackLinks = $yahooBackLinks;
    }

    /**
     * Get yahooBackLinks
     *
     * @return integer 
     */
    public function getYahooBackLinks() {
        return $this->yahooBackLinks;
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