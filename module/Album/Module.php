<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/14/2018
 * Time: 11:56 PM
 */

/*
 * 1. 告诉ModuleManager我的模块配置是什么
 * 2. 注册一些服务
 * 3. 告诉ModuleManager我怎么去自动加载我的Module你的文件
 * 1
 */

namespace Album;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    //通过getConfig去调取当前模块Album目录下的config文件夹下面的module.config.php
    //配置文件。
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';

    }

    //自动加载的psr-0规范
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