<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 1:23 PM
 */

namespace KpUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController{
    public function registerAction(){
        //通过serviceLocator调用程序在module.config.php中
        //注册的service_manager服务(UserModuleOptions)
        $userModuleOptions = $this->serviceLocator->get('UserModuleOptions');
        var_dump($userModuleOptions);
        echo "User - Register index view.";
        exit();
    }
}