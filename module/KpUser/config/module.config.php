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
);