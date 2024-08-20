<?php

require_once("./Services/Component/classes/class.ilPluginConfigGUI.php");
require_once("./Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/ReadSpeaker/classes/class.ilReadSpeakerSettings.php");

/**
 * Class ilReadSpeakerConfigGUI
 * @author Daniel Dahme <dahmeatqualitus.de>
 */
class ilReadSpeakerConfigGUI extends ilPluginConfigGUI {

	private $tpl;
	private $ilCtrl;
	private $lng;

	public function __construct() {
		global $DIC;

		$this->ilCtrl = $DIC->ctrl();
		$this->lng = $DIC->language();
		$this->tpl = $DIC->ui()->mainTemplate();
	}

	/**
	 * @param string $cmd
	 * @return void
	 */
	function performCommand($cmd) {

		switch ($cmd) {

			case 'saveConfiguration':
				$this->saveConfiguration();
				break;

			case 'showConfigurationForm':
			default:
				$this->showConfigurationForm();
				break;

		}
	}

	/**
	 * @param ilPropertyFormGUI|null $form
	 */
	private function showConfigurationForm(ilPropertyFormGUI $form = null): void {
		if (!$form instanceof ilPropertyFormGUI) {
			$form = $this->initConfigurationForm();
			$form->setValuesByArray(array(
				'wrScriptUrl' => ilReadSpeakerSettings::getInstance()->getWrScriptUrl(),
				'wrAPIUrl' => ilReadSpeakerSettings::getInstance()->getWrAPIUrl(),
				'wrCustomerId' => ilReadSpeakerSettings::getInstance()->getWrCustomerId(),
				'wrInlineConfig' => ilReadSpeakerSettings::getInstance()->getWrInlineConfig(),
				'wrReadingLang' => ilReadSpeakerSettings::getInstance()->getWrReadingLang(),
				'wrVoice' => ilReadSpeakerSettings::getInstance()->getWrVoice(),
				'wrReadId' => ilReadSpeakerSettings::getInstance()->getWrReadId(),
				'wrReadClass' => ilReadSpeakerSettings::getInstance()->getWrReadClass(),
				'wrListenLabel' => ilReadSpeakerSettings::getInstance()->getWrListenLabel(),
				'wrListenAltText' => ilReadSpeakerSettings::getInstance()->getWrListenAltText(),
				'drEnable' => ilReadSpeakerSettings::getInstance()->getDrEnable(),
				'drCustomerId' => ilReadSpeakerSettings::getInstance()->getDrCustomerId(),
				'drReadingLang' => ilReadSpeakerSettings::getInstance()->getDrReadingLang(),
				'drListenLabel' => ilReadSpeakerSettings::getInstance()->getDrListenLabel(),
				'drImageUrl' => ilReadSpeakerSettings::getInstance()->getDrImageUrl(),
				'drImageAlt' => ilReadSpeakerSettings::getInstance()->getDrImageAlt(),
			));
		}
		$this->tpl->setContent($form->getHTML());
	}

	/**
	 * @return ilPropertyFormGUI
	 */
	private function initConfigurationForm(): ilPropertyFormGUI {

		$form = new ilPropertyFormGUI();
		$form->setTitle($this->lng->txt('settings'));
		$form->setFormAction($this->ilCtrl->getFormAction($this, 'showConfigurationForm'));
		$form->setShowTopButtons(false);

		$wrScriptUrl = new ilTextInputGUI($this->getPluginObject()->txt('wrScriptUrl'), 'wrScriptUrl');
		$wrScriptUrl->setInfo($this->getPluginObject()->txt('wrScriptUrlInfo'));
		$wrScriptUrl->setRequired(true);
		$wrScriptUrl->setSize(120);
		$wrScriptUrl->setMaxLength(512);
		$form->addItem($wrScriptUrl);

		$wrAPIUrl = new ilTextInputGUI($this->getPluginObject()->txt('wrApiUrl'), 'wrAPIUrl');
		$wrAPIUrl->setInfo($this->getPluginObject()->txt('wrApiUrlInfo'));
		$wrAPIUrl->setRequired(true);
		$wrAPIUrl->setSize(120);
		$wrAPIUrl->setMaxLength(512);
		$form->addItem($wrAPIUrl);

		$wrCustomerId = new ilTextInputGUI($this->getPluginObject()->txt('wrCustomerId'), 'wrCustomerId');
		$wrCustomerId->setInfo($this->getPluginObject()->txt('wrCustomerIdInfo'));
		$wrCustomerId->setRequired(true);
		$wrCustomerId->setSize(120);
		$wrCustomerId->setMaxLength(512);
		$form->addItem($wrCustomerId);

		$wrInlineConfig = new ilTextInputGUI($this->getPluginObject()->txt('wrInlineConfig'), 'wrInlineConfig');
		$wrInlineConfig->setInfo($this->getPluginObject()->txt('wrInlineConfigInfo'));
		$wrInlineConfig->setRequired(false);
		$wrInlineConfig->setSize(120);
		$wrInlineConfig->setMaxLength(512);
		$form->addItem($wrInlineConfig);

		$wrReadingLang = new ilTextInputGUI($this->getPluginObject()->txt('wrReadingLang'), 'wrReadingLang');
		$wrReadingLang->setInfo($this->getPluginObject()->txt('wrReadingLangInfo'));
		$wrReadingLang->setRequired(true);
		$wrReadingLang->setSize(120);
		$wrReadingLang->setMaxLength(512);
		$form->addItem($wrReadingLang);

		$wrVoice = new ilTextInputGUI($this->getPluginObject()->txt('wrVoice'), 'wrVoice');
		$wrVoice->setInfo($this->getPluginObject()->txt('wrVoiceInfo'));
		$wrVoice->setRequired(false);
		$wrVoice->setSize(120);
		$wrVoice->setMaxLength(512);
		$form->addItem($wrVoice);

		$wrReadId = new ilTextInputGUI($this->getPluginObject()->txt('wrReadId'), 'wrReadId');
		$wrReadId->setInfo($this->getPluginObject()->txt('wrReadIdInfo'));
		$wrReadId->setRequired(false);
		$wrReadId->setSize(120);
		$wrReadId->setMaxLength(512);
		$form->addItem($wrReadId);

		$wrReadClass = new ilTextInputGUI($this->getPluginObject()->txt('wrReadClass'), 'wrReadClass');
		$wrReadClass->setInfo($this->getPluginObject()->txt('wrReadClassInfo'));
		$wrReadClass->setRequired(false);
		$wrReadClass->setSize(120);
		$wrReadClass->setMaxLength(512);
		$form->addItem($wrReadClass);

		$wrListenLabel = new ilTextInputGUI($this->getPluginObject()->txt('wrListenLabel'), 'wrListenLabel');
		$wrListenLabel->setInfo($this->getPluginObject()->txt('wrListenLabelInfo'));
		$wrListenLabel->setRequired(true);
		$wrListenLabel->setSize(120);
		$wrListenLabel->setMaxLength(512);
		$form->addItem($wrListenLabel);

		$wrListenAltText = new ilTextInputGUI($this->getPluginObject()->txt('wrListenAltText'), 'wrListenAltText');
		$wrListenAltText->setInfo($this->getPluginObject()->txt('wrListenAltTextInfo'));
		$wrListenAltText->setRequired(true);
		$wrListenAltText->setSize(120);
		$wrListenAltText->setMaxLength(512);
		$form->addItem($wrListenAltText);

		$drEnable = new ilCheckboxInputGUI($this->getPluginObject()->txt('drEnable'), "drEnable");
		$drEnable->setInfo($this->getPluginObject()->txt('drEnableInfo'));
		$drEnable->setValue('1');
		$form->addItem($drEnable);

		$drCustomerId = new ilTextInputGUI($this->getPluginObject()->txt('drCustomerId'), 'drCustomerId');
		$drCustomerId->setInfo($this->getPluginObject()->txt('drCustomerIdInfo'));
		$drCustomerId->setRequired(false);
		$drCustomerId->setSize(120);
		$drCustomerId->setMaxLength(512);
		$form->addItem($drCustomerId);

		$drReadingLang = new ilTextInputGUI($this->getPluginObject()->txt('drReadingLang'), 'drReadingLang');
		$drReadingLang->setInfo($this->getPluginObject()->txt('drReadingLangInfo'));
		$drReadingLang->setRequired(false);
		$drReadingLang->setSize(120);
		$drReadingLang->setMaxLength(512);
		$form->addItem($drReadingLang);

		$drListenLabel = new ilTextInputGUI($this->getPluginObject()->txt('drListenLabel'), 'drListenLabel');
		$drListenLabel->setInfo($this->getPluginObject()->txt('drListenLabelInfo'));
		$drListenLabel->setRequired(false);
		$drListenLabel->setSize(120);
		$drListenLabel->setMaxLength(512);
		$form->addItem($drListenLabel);

		$drImageUrl = new ilTextInputGUI($this->getPluginObject()->txt('drImageUrl'), 'drImageUrl');
		$drImageUrl->setInfo($this->getPluginObject()->txt('drImageUrlInfo'));
		$drImageUrl->setRequired(false);
		$drImageUrl->setSize(120);
		$drImageUrl->setMaxLength(512);
		$form->addItem($drImageUrl);

		$drImageAlt = new ilTextInputGUI($this->getPluginObject()->txt('drImageAlt'), 'drImageAlt');
		$drImageAlt->setInfo($this->getPluginObject()->txt('drImageAltInfo'));
		$drImageAlt->setRequired(false);
		$drImageAlt->setSize(120);
		$drImageAlt->setMaxLength(512);
		$form->addItem($drImageAlt);

		$form->addCommandButton('saveConfiguration', $this->lng->txt('save'));

		return $form;
	}

	private function saveConfiguration() {
		$form = $this->initConfigurationForm();
		if ($form->checkInput()) {
			ilReadSpeakerSettings::getInstance()->setWrScriptUrl($form->getInput('wrScriptUrl'));
			ilReadSpeakerSettings::getInstance()->setWrAPIUrl($form->getInput('wrAPIUrl'));
			ilReadSpeakerSettings::getInstance()->setWrCustomerId($form->getInput('wrCustomerId'));
			ilReadSpeakerSettings::getInstance()->setWrInlineConfig($form->getInput('wrInlineConfig'));
			ilReadSpeakerSettings::getInstance()->setWrReadingLang($form->getInput('wrReadingLang'));
			ilReadSpeakerSettings::getInstance()->setWrVoice($form->getInput('wrVoice'));
			ilReadSpeakerSettings::getInstance()->setWrReadId($form->getInput('wrReadId'));
			ilReadSpeakerSettings::getInstance()->setWrReadClass($form->getInput('wrReadClass'));
			ilReadSpeakerSettings::getInstance()->setWrListenLabel($form->getInput('wrListenLabel'));
			ilReadSpeakerSettings::getInstance()->setWrListenAltText($form->getInput('wrListenAltText'));
			ilReadSpeakerSettings::getInstance()->setDrEnable($form->getInput('drEnable'));
			ilReadSpeakerSettings::getInstance()->setDrCustomerId($form->getInput('drCustomerId'));
			ilReadSpeakerSettings::getInstance()->setDrReadingLang($form->getInput('drReadingLang'));
			ilReadSpeakerSettings::getInstance()->setDrListenLabel($form->getInput('drListenLabel'));
			ilReadSpeakerSettings::getInstance()->setDrImageUrl($form->getInput('drImageUrl'));
			ilReadSpeakerSettings::getInstance()->setDrImageAlt($form->getInput('drImageAlt'));
			try {
				ilReadSpeakerSettings::getInstance()->save();
				$this->tpl->setOnScreenMessage("success", $this->lng->txt('saved_successfully'), true);
			} catch(ilException $e) {
				$this->tpl->setOnScreenMessage("failure", $this->lng->txt('form_input_not_valid'));
			}

		}
		$form->setValuesByPost();
		$this->showConfigurationForm($form);
	}
}

