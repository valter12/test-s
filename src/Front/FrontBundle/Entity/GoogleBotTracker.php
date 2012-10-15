<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\GoogleBotTracker
 */
class GoogleBotTracker {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $param1
     */
    private $param1;

    /**
     * @var string $param2
     */
    private $param2;

    /**
     * @var string $param3
     */
    private $param3;

    /**
     * @var string $param4
     */
    private $param4;

    /**
     * @var string $param5
     */
    private $param5;

    /**
     * @var string $param6
     */
    private $param6;

    /**
     * @var string $param7
     */
    private $param7;

    /**
     * @var string $param8
     */
    private $param8;

    /**
     * @var string $param9
     */
    private $param9;

    /**
     * @var string $param10
     */
    private $param10;

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
     * Set param1
     *
     * @param string $param1
     */
    public function setParam1($param1) {
        $this->param1 = $param1;
    }

    /**
     * Get param1
     *
     * @return string 
     */
    public function getParam1() {
        return $this->param1;
    }

    /**
     * Set param2
     *
     * @param string $param2
     */
    public function setParam2($param2) {
        $this->param2 = $param2;
    }

    /**
     * Get param2
     *
     * @return string 
     */
    public function getParam2() {
        return $this->param2;
    }

    /**
     * Set param3
     *
     * @param string $param3
     */
    public function setParam3($param3) {
        $this->param3 = $param3;
    }

    /**
     * Get param3
     *
     * @return string 
     */
    public function getParam3() {
        return $this->param3;
    }

    /**
     * Set param4
     *
     * @param string $param4
     */
    public function setParam4($param4) {
        $this->param4 = $param4;
    }

    /**
     * Get param4
     *
     * @return string 
     */
    public function getParam4() {
        return $this->param4;
    }

    /**
     * Set param5
     *
     * @param string $param5
     */
    public function setParam5($param5) {
        $this->param5 = $param5;
    }

    /**
     * Get param5
     *
     * @return string 
     */
    public function getParam5() {
        return $this->param5;
    }

    /**
     * Set param6
     *
     * @param string $param6
     */
    public function setParam6($param6) {
        $this->param6 = $param6;
    }

    /**
     * Get param6
     *
     * @return string 
     */
    public function getParam6() {
        return $this->param6;
    }

    /**
     * Set param7
     *
     * @param string $param7
     */
    public function setParam7($param7) {
        $this->param7 = $param7;
    }

    /**
     * Get param7
     *
     * @return string 
     */
    public function getParam7() {
        return $this->param7;
    }

    /**
     * Set param8
     *
     * @param string $param8
     */
    public function setParam8($param8) {
        $this->param8 = $param8;
    }

    /**
     * Get param8
     *
     * @return string 
     */
    public function getParam8() {
        return $this->param8;
    }

    /**
     * Set param9
     *
     * @param string $param9
     */
    public function setParam9($param9) {
        $this->param9 = $param9;
    }

    /**
     * Get param9
     *
     * @return string 
     */
    public function getParam9() {
        return $this->param9;
    }

    /**
     * Set param10
     *
     * @param string $param10
     */
    public function setParam10($param10) {
        $this->param10 = $param10;
    }

    /**
     * Get param10
     *
     * @return string 
     */
    public function getParam10() {
        return $this->param10;
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