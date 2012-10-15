<?php

namespace Front\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front\FrontBundle\Entity\KeywordTrack
 */
class KeywordTrack {

    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var datetime $trackDate
     */
    private $trackDate;

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
     * @var integer $googleChange
     */
    private $googleChange;

    /**
     * @var integer $bingChange
     */
    private $bingChange;

    /**
     * @var integer $yahooChange
     */
    private $yahooChange;

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
     * @var integer $pageLinkGoogleChange
     */
    private $pageLinkGoogleChange;

    /**
     * @var integer $pageLinkBingChange
     */
    private $pageLinkBingChange;

    /**
     * @var integer $pageLinkYahooChange
     */
    private $pageLinkYahooChange;

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
     * @var integer $googleDescriptionChange
     */
    private $googleDescriptionChange;

    /**
     * @var integer $bingDescriptionChange
     */
    private $bingDescriptionChange;

    /**
     * @var integer $yahooDescriptionChange
     */
    private $yahooDescriptionChange;

    /**
     * @var Front\FrontBundle\Entity\Keyword
     */
    private $keyword;

    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set trackDate
     *
     * @param datetime $trackDate
     */
    public function setTrackDate($trackDate) {
        $this->trackDate = $trackDate;
    }

    /**
     * Get trackDate
     *
     * @return datetime 
     */
    public function getTrackDate() {
        return $this->trackDate;
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
     * Set googleChange
     *
     * @param integer $googleChange
     */
    public function setGoogleChange($googleChange) {
        $this->googleChange = $googleChange;
    }

    /**
     * Get googleChange
     *
     * @return integer 
     */
    public function getGoogleChange() {
        return $this->googleChange;
    }

    /**
     * Set bingChange
     *
     * @param integer $bingChange
     */
    public function setBingChange($bingChange) {
        $this->bingChange = $bingChange;
    }

    /**
     * Get bingChange
     *
     * @return integer 
     */
    public function getBingChange() {
        return $this->bingChange;
    }

    /**
     * Set yahooChange
     *
     * @param integer $yahooChange
     */
    public function setYahooChange($yahooChange) {
        $this->yahooChange = $yahooChange;
    }

    /**
     * Get yahooChange
     *
     * @return integer 
     */
    public function getYahooChange() {
        return $this->yahooChange;
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
     * Set pageLinkGoogleChange
     *
     * @param integer $pageLinkGoogleChange
     */
    public function setPageLinkGoogleChange($pageLinkGoogleChange) {
        $this->pageLinkGoogleChange = $pageLinkGoogleChange;
    }

    /**
     * Get pageLinkGoogleChange
     *
     * @return integer 
     */
    public function getPageLinkGoogleChange() {
        return $this->pageLinkGoogleChange;
    }

    /**
     * Set pageLinkBingChange
     *
     * @param integer $pageLinkBingChange
     */
    public function setPageLinkBingChange($pageLinkBingChange) {
        $this->pageLinkBingChange = $pageLinkBingChange;
    }

    /**
     * Get pageLinkBingChange
     *
     * @return integer 
     */
    public function getPageLinkBingChange() {
        return $this->pageLinkBingChange;
    }

    /**
     * Set pageLinkYahooChange
     *
     * @param integer $pageLinkYahooChange
     */
    public function setPageLinkYahooChange($pageLinkYahooChange) {
        $this->pageLinkYahooChange = $pageLinkYahooChange;
    }

    /**
     * Get pageLinkYahooChange
     *
     * @return integer 
     */
    public function getPageLinkYahooChange() {
        return $this->pageLinkYahooChange;
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

    /**
     * Set googleDescriptionChange
     *
     * @param integer $googleDescriptionChange
     */
    public function setGoogleDescriptionChange($googleDescriptionChange) {
        $this->googleDescriptionChange = $googleDescriptionChange;
    }

    /**
     * Get googleDescriptionChange
     *
     * @return integer 
     */
    public function getGoogleDescriptionChange() {
        return $this->googleDescriptionChange;
    }

    /**
     * Set bingDescriptionChange
     *
     * @param integer $bingDescriptionChange
     */
    public function setBingDescriptionChange($bingDescriptionChange) {
        $this->bingDescriptionChange = $bingDescriptionChange;
    }

    /**
     * Get bingDescriptionChange
     *
     * @return integer 
     */
    public function getBingDescriptionChange() {
        return $this->bingDescriptionChange;
    }

    /**
     * Set yahooDescriptionChange
     *
     * @param integer $yahooDescriptionChange
     */
    public function setYahooDescriptionChange($yahooDescriptionChange) {
        $this->yahooDescriptionChange = $yahooDescriptionChange;
    }

    /**
     * Get yahooDescriptionChange
     *
     * @return integer 
     */
    public function getYahooDescriptionChange() {
        return $this->yahooDescriptionChange;
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