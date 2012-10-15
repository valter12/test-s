<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Project
 */
class Project {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $projectName
     */
    private $projectName;

    /**
     * @var string $projectDescription
     */
    private $projectDescription;

    /**
     * @var string $projectDomain
     */
    private $projectDomain;

    /**
     * @var string $googleRankIdent
     */
    private $googleRankIdent;

    /**
     * @var string $projectHash
     */
    private $projectHash;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * @var Front\FrontBundle\Entity\ProjectCategory
     */
    private $category;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     */
    public function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName() {
        return $this->projectName;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     */
    public function setProjectDescription($projectDescription) {
        $this->projectDescription = $projectDescription;
    }

    /**
     * Get projectDescription
     *
     * @return string 
     */
    public function getProjectDescription() {
        return $this->projectDescription;
    }

    /**
     * Set projectDomain
     *
     * @param string $projectDomain
     */
    public function setProjectDomain($projectDomain) {
        $this->projectDomain = $projectDomain;
    }

    /**
     * Get projectDomain
     *
     * @return string 
     */
    public function getProjectDomain() {
        return $this->projectDomain;
    }

    /**
     * Set googleRankIdent
     *
     * @param string $googleRankIdent
     */
    public function setGoogleRankIdent($googleRankIdent) {
        $this->googleRankIdent = $googleRankIdent;
    }

    /**
     * Get googleRankIdent
     *
     * @return string 
     */
    public function getGoogleRankIdent() {
        return $this->googleRankIdent;
    }

    /**
     * Set projectHash
     *
     * @param string $projectHash
     */
    public function setProjectHash($projectHash) {
        $this->projectHash = $projectHash;
    }

    /**
     * Get projectHash
     *
     * @return string 
     */
    public function getProjectHash() {
        return $this->projectHash;
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
     * Set category
     *
     * @param Front\FrontBundle\Entity\ProjectCategory $category
     */
    public function setCategory(\Front\FrontBundle\Entity\ProjectCategory $category) {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Front\FrontBundle\Entity\ProjectCategory 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @var Front\FrontBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param Front\FrontBundle\Entity\User $user
     */
    public function setUser(\Front\FrontBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Front\FrontBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}