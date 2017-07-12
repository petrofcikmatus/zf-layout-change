<?php

namespace ZFLayoutChange;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package ZFLayoutChange
 */
class Module implements BootstrapListenerInterface
{

    /**
     *
     */
    const CONFIG_KEY = 'module-layouts';

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface|MvcEvent $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        $config = $e->getApplication()->getServiceManager()->get('Config');

        if (isset($config[self::CONFIG_KEY])) {
            $eventManager = $e->getApplication()->getEventManager();

            $eventManager->attach(MvcEvent::EVENT_DISPATCH, function (EventInterface $e) use ($config) {
                $controller = $e->getTarget();

                $controllerClass = get_class($controller);
                $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

                if (isset($config[self::CONFIG_KEY][$moduleNamespace])) {
                    $controller->layout($config[self::CONFIG_KEY][$moduleNamespace]);
                }
            });
        }

        return [];
    }
}
