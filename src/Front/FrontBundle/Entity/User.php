<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\User
 */
class User {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $fName
     */
    private $fName;

    /**
     * @var string $lName
     */
    private $lName;

    /**
     * @var string $pass
     */
    private $pass;

    /**
     * @var integer $hasActivatedEmail
     */
    private $hasActivatedEmail;

    /**
     * @var string $activationHash
     */
    private $activationHash;

    /**
     * @var integer $hasPayed
     */
    private $hasPayed;

    /**
     * @var integer $isDeleted
     */
    private $isDeleted;

    /**
     * @var string $secretHash
     */
    private $secretHash;

    /**
     * @var date $nextPayDate
     */
    private $nextPayDate;

    /**
     * @var integer $hasCompletedProfile
     */
    private $hasCompletedProfile;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * @var Front\FrontBundle\Entity\Package
     */
    private $package;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set fName
     *
     * @param string $fName
     */
    public function setFName($fName) {
        $this->fName = $fName;
    }

    /**
     * Get fName
     *
     * @return string 
     */
    public function getFName() {
        return $this->fName;
    }

    /**
     * Set lName
     *
     * @param string $lName
     */
    public function setLName($lName) {
        $this->lName = $lName;
    }

    /**
     * Get lName
     *
     * @return string 
     */
    public function getLName() {
        return $this->lName;
    }

    /**
     * Set pass
     *
     * @param string $pass
     */
    public function setPass($pass) {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass() {
        return $this->pass;
    }

    /**
     * Set hasActivatedEmail
     *
     * @param integer $hasActivatedEmail
     */
    public function setHasActivatedEmail($hasActivatedEmail) {
        $this->hasActivatedEmail = $hasActivatedEmail;
    }

    /**
     * Get hasActivatedEmail
     *
     * @return integer 
     */
    public function getHasActivatedEmail() {
        return $this->hasActivatedEmail;
    }

    /**
     * Set activationHash
     *
     * @param string $activationHash
     */
    public function setActivationHash($activationHash) {
        $this->activationHash = $activationHash;
    }

    /**
     * Get activationHash
     *
     * @return string 
     */
    public function getActivationHash() {
        return $this->activationHash;
    }

    /**
     * Set hasPayed
     *
     * @param integer $hasPayed
     */
    public function setHasPayed($hasPayed) {
        $this->hasPayed = $hasPayed;
    }

    /**
     * Get hasPayed
     *
     * @return integer 
     */
    public function getHasPayed() {
        return $this->hasPayed;
    }

    /**
     * Set isDeleted
     *
     * @param integer $isDeleted
     */
    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;
    }

    /**
     * Get isDeleted
     *
     * @return integer 
     */
    public function getIsDeleted() {
        return $this->isDeleted;
    }

    /**
     * Set secretHash
     *
     * @param string $secretHash
     */
    public function setSecretHash($secretHash) {
        $this->secretHash = $secretHash;
    }

    /**
     * Get secretHash
     *
     * @return string 
     */
    public function getSecretHash() {
        return $this->secretHash;
    }

    /**
     * Set nextPayDate
     *
     * @param date $nextPayDate
     */
    public function setNextPayDate($nextPayDate) {
        $this->nextPayDate = $nextPayDate;
    }

    /**
     * Get nextPayDate
     *
     * @return date 
     */
    public function getNextPayDate() {
        return $this->nextPayDate;
    }

    /**
     * Set hasCompletedProfile
     *
     * @param integer $hasCompletedProfile
     */
    public function setHasCompletedProfile($hasCompletedProfile) {
        $this->hasCompletedProfile = $hasCompletedProfile;
    }

    /**
     * Get hasCompletedProfile
     *
     * @return integer 
     */
    public function getHasCompletedProfile() {
        return $this->hasCompletedProfile;
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
     * Set package
     *
     * @param Front\FrontBundle\Entity\Package $package
     */
    public function setPackage(\Front\FrontBundle\Entity\Package $package) {
        $this->package = $package;
    }

    /**
     * Get package
     *
     * @return Front\FrontBundle\Entity\Package 
     */
    public function getPackage() {
        return $this->package;
    }

    /**
     * @var integer $isTrial
     */
    private $isTrial;


    /**
     * Set isTrial
     *
     * @param integer $isTrial
     */
    public function setIsTrial($isTrial)
    {
        $this->isTrial = $isTrial;
    }

    /**
     * Get isTrial
     *
     * @return integer 
     */
    public function getIsTrial()
    {
        return $this->isTrial;
    }
    /**
     * @var date $trialStart
     */
    private $trialStart;


    /**
     * Set trialStart
     *
     * @param date $trialStart
     */
    public function setTrialStart($trialStart)
    {
        $this->trialStart = $trialStart;
    }

    /**
     * Get trialStart
     *
     * @return date 
     */
    public function getTrialStart()
    {
        return $this->trialStart;
    }
}