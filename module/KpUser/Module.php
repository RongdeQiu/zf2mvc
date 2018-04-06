<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/24/2018
 * Time: 1:17 AM
 */

namespace KpUser;

use KpUser\Event\UserEvent;
use KpUser\Listener\UserRegisterListener;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface,
    AutoloaderProviderInterface,
    DependencyIndicatorInterface,
    ServiceProviderInterface,
    ControllerProviderInterface,
    BootstrapListenerInterface
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
        return [
            'factories' => [
                'UserModuleOptions' => 'KpUser\Service\Factory\UserModuleOptions'
            ]
        ];
    }

    // Zend\Mvc\Controller\ControllerManager.php
    // Controller是通过ControllerManager创建出来的
    public function getControllerConfig()
    {
        return [
            'invokables' => [
                //'KpUser\Controller\User' => 'KpUser\Controller\UserController',
                // 'KpUser\Controller\User' 服务,取消后,会去执行'abstract_factories'指定的操作
                // 'abstract_factories'在KpBase Module中指定了,但是这里也会找到
                'KpUser\Controller\UserCenter' => 'KpUser\Controller\UserCenterController'
            ],
            // 首先 Controller Manager会根据上面的invokables注册的服务名 'KpUser\Controller\User'
            // 去生成UserController实例(instance)
            // 然后Controller Manager会将生成的instance作为参数,传递给下面的'initializers'注册
            // 的服务, 也就是'KpUser\Service\Initializer\UserModuleOptions.php', 可以通过debug看到
            // 在'KpUser\Service\Initializer\UserModuleOptions.php'内,可以根据传入的instance
            // 是否实现了UserModuleOptionsAwareInterface接口来实现 依赖注入 (自动注入)
            'initializers' => [
                'KpUser\Service\Initializer\UserModuleOptions'
            ]
        ];
    }

    // Implement BootstrapListenerInterface
    public function onBootstrap(EventInterface $e)
    {
        // 添加以下注释来获得代码提示
        /**
         * @var \Zend\Mvc\Application $application
         */
        $application = $e->getApplication();
        $eventManager = $application->getEventManager();
        /*
        $shareEventManager = $eventManager->getSharedManager();
        $shareEventManager->attach('*',User::USER_REGISTER_PRE,function (){
            echo 'TO DO for preparation of user registration.<br>';
        });
        */

        //使用实现了ListenerAggregateInterface的类来添加多个事件监听
        $eventManager->attach(new UserRegisterListener());
    }
}