<?php

namespace laminas\Bootstrapdatepicker;

use Laminas\ModuleManager\Feature\DependencyIndicatorInterface;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
class Module implements ConfigProviderInterface ,DependencyIndicatorInterface{
    public function onBootstrap(MvcEvent $e) {

        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $ViewHelperManager=$e->getApplication()->getServiceManager()->get('ViewHelperManager');
        $e->getApplication()->getServiceManager()->get('ViewHelperManager')->setFactory('datepicker', function($sm) use ($ViewHelperManager) {
            $viewHelper = new \laminas\Bootstrapdatepicker\Form\View\Helper\Datepicker();
            $viewHelper->setInlineScript($ViewHelperManager->get('inlinescript'));
            $viewHelper->setHeadLink($ViewHelperManager->get('HeadLink'));
            $viewHelper->setUrl($ViewHelperManager->get('url'));
            return $viewHelper;
        });
    }

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerPluginConfig() {

    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(

            ),
        );
    }


    /**
     * Expected to return an array of modules on which the current one depends on
     *
     * @return array
     */
    public function getModuleDependencies()
    {
        return ['Laminas\Form'];
    }
}
