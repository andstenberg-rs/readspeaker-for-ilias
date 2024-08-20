<?php declare(strict_types=1);
use ILIAS\GlobalScreen\Scope\Layout\Provider\AbstractModificationPluginProvider;
use ILIAS\GlobalScreen\ScreenContext\ContextRepository;
use ILIAS\GlobalScreen\ScreenContext\Stack\ContextCollection;

/**
 *
 */
class ilRSModificationProvider extends AbstractModificationPluginProvider
{

    public function isInterestedInContexts(): ContextCollection
    {
        // TODO: Implement isInterestedInContexts() method.
        return new ContextCollection(new ContextRepository());
    }
}