<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\Package
 */
class Package {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $packageName
     */
    private $packageName;

    /**
     * @var integer $packagePrice
     */
    private $packagePrice;

    /**
     * @var integer $isActive
     */
    private $isActive;

    public function setId($id) {
        $this->id = $id;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set packageName
     *
     * @param string $packageName
     */
    public function setPackageName($packageName) {
        $this->packageName = $packageName;
    }

    /**
     * Get packageName
     *
     * @return string 
     */
    public function getPackageName() {
        return $this->packageName;
    }

    /**
     * Set packagePrice
     *
     * @param integer $packagePrice
     */
    public function setPackagePrice($packagePrice) {
        $this->packagePrice = $packagePrice;
    }

    /**
     * Get packagePrice
     *
     * @return integer 
     */
    public function getPackagePrice() {
        return $this->packagePrice;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive() {
        return $this->isActive;
    }
    
    public function __toString() {
        return $this->getPackageName();
    }

}