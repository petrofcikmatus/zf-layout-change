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
     * Config key under which this module looks for layouts to change.
     */
    const CONFIG_KEY = 'module-layouts';

    /**
     * Listen to the bootstrap event.
     *
     * @param EventInterface|MvcEvent $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        // Get config array.
        $config = $e->getApplication()->getServiceManager()->get('Config');

        // If in config array exists array with different module layouts...
        if (isset($config[self::CONFIG_KEY]) && is_array($config[self::CONFIG_KEY])) {

            // Get event manager.
            $eventManager = $e->getApplication()->getEventManager();

            // Attach new (changing) event listener to dispatch event.
            $eventManager->attach(MvcEvent::EVENT_DISPATCH, function (EventInterface $e) use ($config) {

                // Get target (controller).
                $controller = $e->getTarget();

                // Get controller class name.
                $controllerClass = get_class($controller);

                // Get controller namespace from controller class name.
                $controllerNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

                // If there is layout (key) in config array matching controller namespace...
                if (isset($config[self::CONFIG_KEY][$controllerNamespace])) {

                    // Set (change) layout.
                    $controller->layout($config[self::CONFIG_KEY][$controllerNamespace]);
                }
            });
        }

        return [];
    }
}
