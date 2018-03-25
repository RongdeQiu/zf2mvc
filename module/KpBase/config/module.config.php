<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/25/2018
 * Time: 7:45 AM
 */

return array(
    'router' => array(
        'routes' => array(
            'base' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/base[/:action].html',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'KpBase\Controller',
                        'controller' => 'index',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),

// 已经在Module.php中进行设置. 功能相同
//    'controllers' => array(
//    'invokables' => array(
//          'KpBase\Controller\Index' => 'KpBase\Controller\IndexController',
//          ),
//    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);