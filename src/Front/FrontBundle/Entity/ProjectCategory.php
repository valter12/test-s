<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\ProjectCategory
 */
class ProjectCategory {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $categoryName
     */
    private $categoryName;

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
     * Set categoryName
     *
     * @param string $categoryName
     */
    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName() {
        return $this->categoryName;
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

    /**
     * @var integer $isGeneric
     */
    private $isGeneric;


    /**
     * Set isGeneric
     *
     * @param integer $isGeneric
     */
    public function setIsGeneric($isGeneric)
    {
        $this->isGeneric = $isGeneric;
    }

    /**
     * Get isGeneric
     *
     * @return integer 
     */
    public function getIsGeneric()
    {
        return $this->isGeneric;
    }
}