<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/24/2018
 * Time: 1:17 AM
 */

namespace KpUser;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface,
    AutoloaderProviderInterface,
    DependencyIndicatorInterface,
    ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getModuleDependencies()
    {
        return [
            'KpBase',
        ];
    }

    public function getServiceConfig()
    {
        return ['factories' => [
            'UserModuleOptions' => 'KpUser\Service\Factory\UserModuleOptions'
            ]
        ];
    }
}