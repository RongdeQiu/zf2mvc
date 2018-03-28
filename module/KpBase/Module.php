<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 1:14 PM
 */

namespace KpBase;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;

class Module implements ConfigProviderInterface,
ControllerProviderInterface,AutoloaderProviderInterface {


    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    //在这里定义controllers和在module.config.php里面定义效果
    //一样, 最后会合并到一块.
    public function getControllerConfig()
    {
        return [
            'invokables' =>[
                'KpBase\Controller\Index' => 'KpBase\Controller\IndexController',
            ],

            // 当invokables里面没有定义相关的controller服务时, 会去执行下面'abstract_factories'
            // 指定的操作
            'abstract_factories'=>[
                'KpBase\Service\AbstractFactory\Controller'
            ]
        ];
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
}