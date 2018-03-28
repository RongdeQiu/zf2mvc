<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/27/2018
 * Time: 11:19 PM
 */

namespace KpBase\Service\AbstractFactory;


use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Controller implements AbstractFactoryInterface
{

    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // 判断$requestName中是否含有\Controller\, 由此作为验证有效性的依据之一
        if (strpos($requestedName, '\Controller\\') !== false && class_exists($requestedName . 'Controller'))
            return true;
        else
            return false;
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $controllerClassName=$requestedName.'Controller';
        $controllerInstance = new $controllerClassName;
        return $controllerInstance;
    }
}