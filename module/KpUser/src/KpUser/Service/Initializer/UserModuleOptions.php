<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/26/2018
 * Time: 11:06 PM
 */

namespace KpUser\Service\Initializer;

use KpUser\Options\UserModuleOptionsAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserModuleOptions implements
    InitializerInterface
{
    /**
     * @param $instance ControllerManager产生的controller instance, 如UserController
     * @param ServiceLocatorInterface $serviceLocator 这里的$serviceLocator指向的是
     *        ControllerManager.不同的类里$serviceLocator指向的是不同的对象
     *        比如在Controller里面, 指向的就是ServiceManager
     *
     * @return mixed|void\
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        // var_dump($serviceLocator); -->ControllerManager
        // var_dump($instance); --> UserController

        // DI: Dependency Injection 实现依赖注入
        // 只有当Controller Manager生成的instance (Controller)实现了
        // UserModuleOptionsAwareInterface的时候,才注入
        if ($instance instanceof UserModuleOptionsAwareInterface) {
            //ControllerManger (serviceLocator)--> ServiceManager(serviceLocator) -->'UserModuleOptions'
            $userModuleOptions = $serviceLocator->getServiceLocator()->get('UserModuleOptions');
            $instance->setUserModuleOptions($userModuleOptions);
        }
    }
}