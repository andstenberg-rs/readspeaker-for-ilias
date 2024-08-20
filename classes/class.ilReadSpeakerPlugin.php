<?php declare(strict_types=1);

/**
 * Class ilReadSpeakerPlugin
 * @author Daniel Dahme <dahmeatqualitus.de>
 * @ilCtrl_isCalledBy ilReadSpeakerPlugin: ilPCPluggedGUI
 */
class ilReadSpeakerPlugin extends ilUserInterfaceHookPlugin {

	/** @var string */
	const PLUGIN_ID = 'qu_readspeaker';

	/** @var string */
	const CTYPE = 'Services';

	/** @var string */
	const CNAME = 'UIComponent';

	/** @var string */
	const SLOT_ID = 'uihk';

	/** @var string */
	const PLUGIN_NAME = "ReadSpeaker";

	/** @var string */
	const PLUGIN_SETTINGS = "qu_readspeaker";

	/** @var ilPlugin|null */
	private static ?ilPlugin $instance = null;

	/** @var ilSetting|null */
	private ?ilSetting $settings = null;
/*
    public function __construct(ilDBInterface $db, ilComponentRepositoryWrite $component_repository, string $id)
    {
        global $DIC;

        parent::__construct($db, $component_repository, $id);
        if ($DIC->offsetExists("global_screen")) {
            $this->getGlobalScreenProviderCollection()->setModificationProvider(new ilRSModificationProvider($DIC, $this));
        }
    }*/

	/**
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}

	 /**
	 * @return ilSetting
	 */
	public function getSettings() : ilSetting {
		if ($this->settings === NULL) $this->settings = new ilSetting(self::PLUGIN_SETTINGS);
		return $this->settings;
	}

	 /**
	 * @return ilPlugin
	 */
	public static function getInstance(): ilPlugin {
	        global $DIC;

	        if (self::$instance instanceof self) {
			return self::$instance;
		}

		/** @var ilComponentRepository $component_repository */
		$component_repository = $DIC['component.repository'];
		/** @var ilComponentFactory $component_factory */
		$component_factory = $DIC['component.factory'];

		$plugin_info = $component_repository
			->getComponentByTypeAndName(self::CTYPE, self::CNAME)
			->getPluginSlotById(self::SLOT_ID)
			->getPluginByName(self::PLUGIN_NAME);

		self::$instance = $component_factory->getPlugin($plugin_info->getId());

		return self::$instance;
	}
}

