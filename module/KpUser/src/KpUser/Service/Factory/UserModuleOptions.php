<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/26/2018
 * Time: 12:19 AM
 */

namespace KpUser\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use KpUser\Options\UserModuleOptions as UserModuleOptionsOptions;

class UserModuleOptions implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // 获取整个程序等待配置文件,由程序运行时合并所有配置文件自动产生
        $config = $serviceLocator->get('config');

        // 获取UserModuleOptions需要的配置键值,如果用户没有配置则返回空数组
        $userConfig = isset($config[UserModuleOptionsOptions::CONFIG_KEY])?
            $config[UserModuleOptionsOptions::CONFIG_KEY]:[];

        // 通过serviceManager 的setFactory方法注册服务
        return new UserModuleOptionsOptions($userConfig);
    }
}