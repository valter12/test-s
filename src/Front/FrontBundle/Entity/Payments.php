<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Payments
 */
class Payments {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var float $amount
     */
    private $amount;

    /**
     * @var string $method
     */
    private $method;

    /**
     * @var integer $payedForNrMonths
     */
    private $payedForNrMonths;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * @var Front\FrontBundle\Entity\Package
     */
    private $package;

    /**
     * @var Front\FrontBundle\Entity\User
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param float $amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * Set method
     *
     * @param string $method
     */
    public function setMethod($method) {
        $this->method = $method;
    }

    /**
     * Get method
     *
     * @return string 
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Set payedForNrMonths
     *
     * @param integer $payedForNrMonths
     */
    public function setPayedForNrMonths($payedForNrMonths) {
        $this->payedForNrMonths = $payedForNrMonths;
    }

    /**
     * Get payedForNrMonths
     *
     * @return integer 
     */
    public function getPayedForNrMonths() {
        return $this->payedForNrMonths;
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
     * Set user
     *
     * @param Front\FrontBundle\Entity\User $user
     */
    public function setUser(\Front\FrontBundle\Entity\User $user) {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Front\FrontBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

}