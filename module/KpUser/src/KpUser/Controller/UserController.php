<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 1:23 PM
 */

namespace KpUser\Controller;

use KpUser\Form\UserBase;
use KpUser\Form\UserLogin;
use KpUser\Form\UserRegister;
use KpUser\Options\UserModuleOptions;
use KpUser\Options\UserModuleOptionsAwareInterface;
use KpUser\Options\UserModuleOptionsTrait;
use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController
    implements UserModuleOptionsAwareInterface
{
    //使用Trait来简化代码
    use UserModuleOptionsTrait;

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

        if ($this->getUserModuleOptions()->getDisabledRegister()) {
            echo "Register disabled.Please contact administrator for new account registration.<br>";
        }

        $form = new UserRegister();
        //$form->get('submit')->setValue('Register');
        $viewModel = [
            'form'=>$form
        ];

        return $viewModel;
    }

    public function loginAction(){
        if ($this->getUserModuleOptions()->getDisabledLogin()){
            echo 'Login disabled. Please contact administrator for login.';
        }
        $form = new UserLogin();
        $viewModel = [
            'loginForm'=>$form
        ];
        return $viewModel;
    }
}