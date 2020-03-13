<?php
namespace extas\components\events;

use extas\components\SystemContainer;
use extas\interfaces\plugins\IPlugin;
use extas\interfaces\plugins\IPluginRepository;
use League\Event\ListenerAcceptorInterface;
use League\Event\ListenerProviderInterface;

/**
 * Class EventProvider
 *
 * @package extas\components\events
 * @author jeyroik <jeyroik@gmail.com>
 */
class EventProvider implements ListenerProviderInterface
{
    /**
     * @param ListenerAcceptorInterface $listenerAcceptor
     * @return ListenerProviderInterface|void
     */
    public function provideListeners(ListenerAcceptorInterface $listenerAcceptor)
    {
        /**
         * @var $repo IPluginRepository
         * @var $plugins IPlugin[]
         */
        $repo = SystemContainer::getItem(IPluginRepository::class);
        $plugins = $repo->all([]);

        foreach ($plugins as $plugin) {
            $listenerAcceptor->addListener($plugin->getStage(), $plugin->buildClassWithParameters([]));
        }
    }
}
