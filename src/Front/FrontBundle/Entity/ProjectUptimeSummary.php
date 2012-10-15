<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\ProjectUptimeSummary
 */
class ProjectUptimeSummary
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var date $summaryDate
     */
    private $summaryDate;

    /**
     * @var text $summary
     */
    private $summary;

    /**
     * @var integer $totalDown
     */
    private $totalDown;

    /**
     * @var integer $totalUp
     */
    private $totalUp;

    /**
     * @var Front\FrontBundle\Entity\Project
     */
    private $project;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set summaryDate
     *
     * @param date $summaryDate
     */
    public function setSummaryDate($summaryDate)
    {
        $this->summaryDate = $summaryDate;
    }

    /**
     * Get summaryDate
     *
     * @return date 
     */
    public function getSummaryDate()
    {
        return $this->summaryDate;
    }

    /**
     * Set summary
     *
     * @param text $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Get summary
     *
     * @return text 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set totalDown
     *
     * @param integer $totalDown
     */
    public function setTotalDown($totalDown)
    {
        $this->totalDown = $totalDown;
    }

    /**
     * Get totalDown
     *
     * @return integer 
     */
    public function getTotalDown()
    {
        return $this->totalDown;
    }

    /**
     * Set totalUp
     *
     * @param integer $totalUp
     */
    public function setTotalUp($totalUp)
    {
        $this->totalUp = $totalUp;
    }

    /**
     * Get totalUp
     *
     * @return integer 
     */
    public function getTotalUp()
    {
        return $this->totalUp;
    }

    /**
     * Set project
     *
     * @param Front\FrontBundle\Entity\Project $project
     */
    public function setProject(\Front\FrontBundle\Entity\Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get project
     *
     * @return Front\FrontBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}