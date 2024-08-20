<?php

/**
 * Class ilReadSpeakerSettings
 * @author Daniel Dahme <dahmeatqualitus.de>
 */
class ilReadSpeakerSettings {

	private static $instance;

	private $wrScriptUrl;
	private $wrAPIUrl;
	private $wrCustomerId;
	private $wrInlineConfig;
	private $wrReadingLang;
	private $wrVoice;
	private $wrReadId;
	private $wrReadClass;
	private $wrListenLabel;
	private $wrListenAltText;
	private $drEnable;
	private $drCustomerId;
	private $drReadingLang;
	private $drListenLabel;
	private $drImageUrl;
	private $drImageAlt;

	protected ilSetting $settings;

	private function __construct() {
		$this->settings = new ilSetting('readspeaker');
		$this->read();
	}

	public static function getInstance() {
		if (null !== self::$instance) {
			return self::$instance;
		}
		return (self::$instance = new self());
	}

	protected function read() {
		$this->setWrScriptUrl($this->settings->get('wrScriptUrl'));
		$this->setWrAPIUrl($this->settings->get('wrAPIUrl'));
		$this->setWrCustomerId($this->settings->get('wrCustomerId'));
		$this->setWrInlineConfig($this->settings->get('wrInlineConfig'));
		$this->setWrReadingLang($this->settings->get('wrReadingLang'));
		$this->setWrVoice($this->settings->get('wrVoice'));
		$this->setWrReadId($this->settings->get('wrReadId'));
		$this->setWrReadClass($this->settings->get('wrReadClass'));
		$this->setWrListenLabel($this->settings->get('wrListenLabel'));
		$this->setWrListenAltText($this->settings->get('wrListenAltText'));
		$this->setDrEnable($this->settings->get('drEnable'));
		$this->setDrCustomerId($this->settings->get('drCustomerId'));
		$this->setDrReadingLang($this->settings->get('drReadingLang'));
		$this->setDrListenLabel($this->settings->get('drListenLabel'));
		$this->setdrImageUrl($this->settings->get('drImageUrl'));
		$this->setDrImageAlt($this->settings->get('drImageAlt'));
	}

	public function save() {
		$this->settings->set('wrScriptUrl', $this->getWrScriptUrl());
		$this->settings->set('wrAPIUrl', $this->getWrAPIUrl());
		$this->settings->set('wrCustomerId', $this->getWrCustomerId());
		$this->settings->set('wrInlineConfig', $this->getWrInlineConfig());
		$this->settings->set('wrReadingLang', $this->getWrReadingLang());
		$this->settings->set('wrVoice', $this->getWrVoice());
		$this->settings->set('wrReadId', $this->getWrReadId());
		$this->settings->set('wrReadClass', $this->getWrReadClass());
		$this->settings->set('wrListenLabel', $this->getWrListenLabel());
		$this->settings->set('wrListenAltText', $this->getWrListenAltText());
		$this->settings->set('drEnable', $this->getDrEnable());
		$this->settings->set('drCustomerId', $this->getDrCustomerId());
		$this->settings->set('drReadingLang', $this->getDrReadingLang());
		$this->settings->set('drListenLabel', $this->getDrListenLabel());
		$this->settings->set('drImageUrl', $this->getDrImageUrl());
		$this->settings->set('drImageAlt', $this->getDrImageAlt());
	}

	public function setWrScriptUrl($wrScriptUrl) {
		$this->wrScriptUrl = $wrScriptUrl;
	}

	public function getWrScriptUrl() {
		return $this->wrScriptUrl;
	}

	public function setWrAPIUrl($wrAPIUrl) {
		$this->wrAPIUrl = $wrAPIUrl;
	}

	public function getWrAPIUrl() {
		return $this->wrAPIUrl;
	}

	public function setWrCustomerId($wrCustomerId) {
		$this->wrCustomerId = $wrCustomerId;
	}

	public function getWrCustomerId() {
		return $this->wrCustomerId;
	}

	public function setWrInlineConfig($wrInlineConfig) {
		$this->wrInlineConfig = $wrInlineConfig;
	}

	public function getWrInlineConfig() {
		return $this->wrInlineConfig;
	}

	public function setWrReadingLang($wrReadingLang) {
		$this->wrReadingLang = $wrReadingLang;
	}

	public function getWrReadingLang() {
		return $this->wrReadingLang;
	}

	public function setWrVoice($wrVoice) {
		$this->wrVoice = $wrVoice;
	}

	public function getWrVoice() {
		return $this->wrVoice;
	}

	public function setWrReadId($wrReadId) {
		$this->wrReadId = $wrReadId;
	}

	public function getWrReadId() {
		return $this->wrReadId;
	}

	public function setWrReadClass($wrReadClass) {
		$this->wrReadClass = $wrReadClass;
	}

	public function getWrReadClass() {
		return $this->wrReadClass;
	}

	public function setWrListenLabel($wrListenLabel) {
		$this->wrListenLabel = $wrListenLabel;
	}

	public function getWrListenLabel() {
		return $this->wrListenLabel;
	}

	public function setWrListenAltText($wrListenAltText) {
		$this->wrListenAltText = $wrListenAltText;
	}

	public function getWrListenAltText() {
		return $this->wrListenAltText;
	}

	public function setDrEnable($drEnable) {
		$this->drEnable = $drEnable;
	}

	public function getDrEnable() {
		return $this->drEnable;
	}

	public function setDrCustomerId($drCustomerId) {
		$this->drCustomerId = $drCustomerId;
	}

	public function getDrCustomerId() {
		return $this->drCustomerId;
	}

	public function setDrReadingLang($drReadingLang) {
		$this->drReadingLang = $drReadingLang;
	}

	public function getDrReadingLang() {
		return $this->drReadingLang;
	}

	public function setDrListenLabel($drListenLabel) {
		$this->drListenLabel = $drListenLabel;
	}

	public function getDrListenLabel() {
		return $this->drListenLabel;
	}

	public function setDrImageUrl($drImageUrl) {
		$this->drImageUrl = $drImageUrl;
	}

	public function getDrImageUrl() {
		return $this->drImageUrl;
	}

	public function setDrImageAlt($drImageAlt) {
		$this->drImageAlt = $drImageAlt;
	}

	public function getDrImageAlt() {
		return $this->drImageAlt;
	}
}

