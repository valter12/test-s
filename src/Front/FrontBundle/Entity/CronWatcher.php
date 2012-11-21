<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class CronWatcher {

    private $id;

    private $cronName;
    
    private $sessionId;
    
    private $cronStatus;
    
    private $message;
    
    private $isRead;
    
    private $added;

    public function getId() {
        return $this->id;
    }

    public function setCronName($value) {
        $this->cronName = $value;
    }

    public function getName() {
        return $this->cronName;
    }

    public function setSessionId($value) {
        $this->sessionId = $value;
    }

    public function getSessionId() {
        return $this->sessionId;
    }
    
    public function setCronStatus($value) {
        $this->cronStatus = $value;
    }

    public function getCronStatus() {
        return $this->cronStatus;
    }
    
    public function setMessage($value) {
        $this->message = $value;
    }

    public function getMessage() {
        return $this->message;
    }
    
    public function setIsRead($value) {
        $this->isRead = $value;
    }

    public function getIsRead() {
        return $this->isRead;
    }
    
    public function setAdded($added) {
        $this->added = $added;
    }

    public function getAdded() {
        return $this->added;
    }

}