<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\TrialDomain
 */
class TrialDomain {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $domainName
     */
    private $domainName;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set domainName
     *
     * @param string $domainName
     */
    public function setDomainName($domainName) {
        $this->domainName = $domainName;
    }

    /**
     * Get domainName
     *
     * @return string 
     */
    public function getDomainName() {
        return $this->domainName;
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
     * @var string $email
     */
    private $email;


    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}