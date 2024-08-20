<?php

/**
 * Class ilReadSpeakerUIHookGUI
 * @author Daniel Dahme <dahmeatqualitus.de>
 */
class ilReadSpeakerUIHookGUI extends ilUIHookPluginGUI
{
        function getHTML(string $a_comp, string $a_part, array $a_par = array()): array {

		global $DIC;
		global $RSINIT;

		if (!isset($DIC["tpl"])) {
			return array("mode" => ilUIHookPluginGUI::KEEP, "html" => "");
		}
		$tpl = $DIC["tpl"];

		$tpl->addJavaScript('Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/ReadSpeaker/script/readspeaker.js?v=0.1l&sid=' . session_id());

		$inContext = isset($a_par['tpl_id']) && strpos($a_par['tpl_id'], 'menu') !== false;
		if ($RSINIT != 1 && $inContext) {
			$rsdata = array(
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
				'drImageAlt' => ilReadSpeakerSettings::getInstance()->getdrImageAlt(),
			);

			$html = '<script>var rsData = ' . json_encode($rsdata) . '</script>';
			if (strlen($rsdata['wrInlineConfig'])) $html .= '<script>window.rsConf = ' . $rsdata['wrInlineConfig'] . '</script>';

			$RSINIT = 1;

			return array("mode" => ilUIHookPluginGUI::APPEND, "html" => $html);
		}

		return array("mode" => ilUIHookPluginGUI::KEEP, "html" => '');
	}

}
