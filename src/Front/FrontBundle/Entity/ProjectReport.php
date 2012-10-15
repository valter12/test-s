<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\ProjectReport
 */
class ProjectReport
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $reportTitle
     */
    private $reportTitle;

    /**
     * @var string $reportDesc
     */
    private $reportDesc;

    /**
     * @var text $reportSettings
     */
    private $reportSettings;

    /**
     * @var text $recipientEmails
     */
    private $recipientEmails;

    /**
     * @var string $frequency
     */
    private $frequency;

    /**
     * @var date $lastSent
     */
    private $lastSent;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reportTitle
     *
     * @param string $reportTitle
     */
    public function setReportTitle($reportTitle)
    {
        $this->reportTitle = $reportTitle;
    }

    /**
     * Get reportTitle
     *
     * @return string 
     */
    public function getReportTitle()
    {
        return $this->reportTitle;
    }

    /**
     * Set reportDesc
     *
     * @param string $reportDesc
     */
    public function setReportDesc($reportDesc)
    {
        $this->reportDesc = $reportDesc;
    }

    /**
     * Get reportDesc
     *
     * @return string 
     */
    public function getReportDesc()
    {
        return $this->reportDesc;
    }

    /**
     * Set reportSettings
     *
     * @param text $reportSettings
     */
    public function setReportSettings($reportSettings)
    {
        $this->reportSettings = $reportSettings;
    }

    /**
     * Get reportSettings
     *
     * @return text 
     */
    public function getReportSettings()
    {
        return $this->reportSettings;
    }

    /**
     * Set recipientEmails
     *
     * @param text $recipientEmails
     */
    public function setRecipientEmails($recipientEmails)
    {
        $this->recipientEmails = $recipientEmails;
    }

    /**
     * Get recipientEmails
     *
     * @return text 
     */
    public function getRecipientEmails()
    {
        return $this->recipientEmails;
    }

    /**
     * Set frequency
     *
     * @param string $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * Get frequency
     *
     * @return string 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set lastSent
     *
     * @param date $lastSent
     */
    public function setLastSent($lastSent)
    {
        $this->lastSent = $lastSent;
    }

    /**
     * Get lastSent
     *
     * @return date 
     */
    public function getLastSent()
    {
        return $this->lastSent;
    }

    /**
     * Set added
     *
     * @param datetime $added
     */
    public function setAdded($added)
    {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return datetime 
     */
    public function getAdded()
    {
        return $this->added;
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