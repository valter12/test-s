<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\KeywordNote
 */
class KeywordNote {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $note
     */
    private $note;

    /**
     * @var datetime $added
     */
    private $added;

    /**
     * @var Front\FrontBundle\Entity\Keyword
     */
    private $keyword;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set note
     *
     * @param string $note
     */
    public function setNote($note) {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote() {
        return $this->note;
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
     * Set keyword
     *
     * @param Front\FrontBundle\Entity\Keyword $keyword
     */
    public function setKeyword(\Front\FrontBundle\Entity\Keyword $keyword) {
        $this->keyword = $keyword;
    }

    /**
     * Get keyword
     *
     * @return Front\FrontBundle\Entity\Keyword 
     */
    public function getKeyword() {
        return $this->keyword;
    }

}