<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 10:00 AM
 */

return array(

    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:action].html',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'KpUser\Controller',
                        'controller' => 'user',
                        'action' => 'register'
                    ),
                ),
            ),
            'user-center' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user-center[/:action].html',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'KpUser\Controller',
                        'controller' => 'UserCenter',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'KpUser\Controller\User' => 'KpUser\Controller\UserController',
            'KpUser\Controller\UserCenter' => 'KpUser\Controller\UserCenterController'
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    // New style after php 5.4, use [] to replace array()
    // 使用UserModuleOption功能,可以在controller里面判断是否禁止了注册和登录
    // Zend\Stdlib\AbstractOptions
    'kp_user'=>[
        'disabled_register'=>false,
        'disabled_login'=>true
    ],

    // 也可以定义在Module.php中
    /*
    'service_manager'=>[
        'factories'=>[
            'UserModuleOptions'=>'KpUser\Service\Factory\UserModuleOptions'
        ]
    ]
    */
);