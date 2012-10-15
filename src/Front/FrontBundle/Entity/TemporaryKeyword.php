<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\TemporaryKeyword
 */
class TemporaryKeyword {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $keywordId
     */
    private $keywordId;

    /**
     * @var string $keyword
     */
    private $keyword;

    /**
     * @var integer $googlePosition
     */
    private $googlePosition;

    /**
     * @var integer $bingPosition
     */
    private $bingPosition;

    /**
     * @var integer $yahooPosition
     */
    private $yahooPosition;

    /**
     * @var integer $competitorId
     */
    private $competitorId;

    /**
     * @var string $ipServer
     */
    private $ipServer;

    /**
     * @var integer $instanceId
     */
    private $instanceId;

    /**
     * @var string $domainName
     */
    private $domainName;

    /**
     * @var string $pageLinkGoogle
     */
    private $pageLinkGoogle;

    /**
     * @var string $pageLinkBing
     */
    private $pageLinkBing;

    /**
     * @var string $pageLinkYahoo
     */
    private $pageLinkYahoo;

    /**
     * @var string $googleDescription
     */
    private $googleDescription;

    /**
     * @var string $bingDescription
     */
    private $bingDescription;

    /**
     * @var string $yahooDescription
     */
    private $yahooDescription;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set keywordId
     *
     * @param integer $keywordId
     */
    public function setKeywordId($keywordId) {
        $this->keywordId = $keywordId;
    }

    /**
     * Get keywordId
     *
     * @return integer 
     */
    public function getKeywordId() {
        return $this->keywordId;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     */
    public function setKeyword($keyword) {
        $this->keyword = $keyword;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword() {
        return $this->keyword;
    }

    /**
     * Set googlePosition
     *
     * @param integer $googlePosition
     */
    public function setGooglePosition($googlePosition) {
        $this->googlePosition = $googlePosition;
    }

    /**
     * Get googlePosition
     *
     * @return integer 
     */
    public function getGooglePosition() {
        return $this->googlePosition;
    }

    /**
     * Set bingPosition
     *
     * @param integer $bingPosition
     */
    public function setBingPosition($bingPosition) {
        $this->bingPosition = $bingPosition;
    }

    /**
     * Get bingPosition
     *
     * @return integer 
     */
    public function getBingPosition() {
        return $this->bingPosition;
    }

    /**
     * Set yahooPosition
     *
     * @param integer $yahooPosition
     */
    public function setYahooPosition($yahooPosition) {
        $this->yahooPosition = $yahooPosition;
    }

    /**
     * Get yahooPosition
     *
     * @return integer 
     */
    public function getYahooPosition() {
        return $this->yahooPosition;
    }

    /**
     * Set competitorId
     *
     * @param integer $competitorId
     */
    public function setCompetitorId($competitorId) {
        $this->competitorId = $competitorId;
    }

    /**
     * Get competitorId
     *
     * @return integer 
     */
    public function getCompetitorId() {
        return $this->competitorId;
    }

    /**
     * Set ipServer
     *
     * @param string $ipServer
     */
    public function setIpServer($ipServer) {
        $this->ipServer = $ipServer;
    }

    /**
     * Get ipServer
     *
     * @return string 
     */
    public function getIpServer() {
        return $this->ipServer;
    }

    /**
     * Set instanceId
     *
     * @param integer $instanceId
     */
    public function setInstanceId($instanceId) {
        $this->instanceId = $instanceId;
    }

    /**
     * Get instanceId
     *
     * @return integer 
     */
    public function getInstanceId() {
        return $this->instanceId;
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
     * Set pageLinkGoogle
     *
     * @param string $pageLinkGoogle
     */
    public function setPageLinkGoogle($pageLinkGoogle) {
        $this->pageLinkGoogle = $pageLinkGoogle;
    }

    /**
     * Get pageLinkGoogle
     *
     * @return string 
     */
    public function getPageLinkGoogle() {
        return $this->pageLinkGoogle;
    }

    /**
     * Set pageLinkBing
     *
     * @param string $pageLinkBing
     */
    public function setPageLinkBing($pageLinkBing) {
        $this->pageLinkBing = $pageLinkBing;
    }

    /**
     * Get pageLinkBing
     *
     * @return string 
     */
    public function getPageLinkBing() {
        return $this->pageLinkBing;
    }

    /**
     * Set pageLinkYahoo
     *
     * @param string $pageLinkYahoo
     */
    public function setPageLinkYahoo($pageLinkYahoo) {
        $this->pageLinkYahoo = $pageLinkYahoo;
    }

    /**
     * Get pageLinkYahoo
     *
     * @return string 
     */
    public function getPageLinkYahoo() {
        return $this->pageLinkYahoo;
    }

    /**
     * Set googleDescription
     *
     * @param string $googleDescription
     */
    public function setGoogleDescription($googleDescription) {
        $this->googleDescription = $googleDescription;
    }

    /**
     * Get googleDescription
     *
     * @return string 
     */
    public function getGoogleDescription() {
        return $this->googleDescription;
    }

    /**
     * Set bingDescription
     *
     * @param string $bingDescription
     */
    public function setBingDescription($bingDescription) {
        $this->bingDescription = $bingDescription;
    }

    /**
     * Get bingDescription
     *
     * @return string 
     */
    public function getBingDescription() {
        return $this->bingDescription;
    }

    /**
     * Set yahooDescription
     *
     * @param string $yahooDescription
     */
    public function setYahooDescription($yahooDescription) {
        $this->yahooDescription = $yahooDescription;
    }

    /**
     * Get yahooDescription
     *
     * @return string 
     */
    public function getYahooDescription() {
        return $this->yahooDescription;
    }

}