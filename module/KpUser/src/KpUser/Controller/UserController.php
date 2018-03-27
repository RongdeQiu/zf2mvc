<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 1:23 PM
 */

namespace KpUser\Controller;

use KpUser\Options\UserModuleOptions;
use KpUser\Options\UserModuleOptionsAwareInterface;
use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController
    implements UserModuleOptionsAwareInterface
{
    protected $userModuleOptions;

    public function setUserModuleOptions(UserModuleOptions $userModuleOptions)
    {
        $this->userModuleOptions = $userModuleOptions;
    }

    public function getUserModuleOptions()
    {
        return $this->userModuleOptions;
    }

    public function registerAction()
    {
        // var_dump($this->getServiceLocator()); -->ServiceManager

        //通过serviceLocator调用程序在module.config.php中
        //注册的service_manager服务(UserModuleOptions)
        /* 通过依赖注入来实现
        $userModuleOptions = $this->getServiceLocator()->get('UserModuleOptions');
        var_dump($userModuleOptions);
        */


        // 在UserController实例化时, 在
        // KpUser\Service\Initializer\UserModuleOptions.php中 完成依赖注入,
        // 这里只要直接使用就行
        // var_dump($this->getUserModuleOptions());

        if ($this->getUserModuleOptions()->getDisabledLogin()) {
            echo "Login disabled. Dependency Injection Successful.<br>";
        } else {
            echo "Login enabled. Dependency Injection Successful.<br>";
        }

        echo "User - Register index view.";
        exit();
    }

}