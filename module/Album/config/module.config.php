<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/15/2018
 * Time: 12:11 AM
 */

return array(
    'router' => array(
        'routes' => array(

            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            /*
            'album' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/album',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Album\Controller',
                        'controller'    => 'album',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            */

            'album' => array(
                'type'    => 'Segment',
                'options' => array(
                    //[]optional
                    //:define type
                    // 有许多的路由设置方法， Segment只是比较常用的一种方法
                    //其他还有很多， 比如Literal, Regex, Scheme, Method, Hostname
                    //Chain,Wildcard等待，具体参考
                    // Zend/Mvc/Router/Http/
                    'route'    => '/album[/[:controller[/[:action[/[:id]]]]]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'        =>'[0-9]+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Album\Controller',
                        // 在Zend/Mvc/ModuleRouteListener.php中
                        // 为了简化路由，定义了__NAMESPACE__参数等，这样
                        // 'controller'=>'album'中的album服务名会被ModuleRouteListener
                        // 自动翻译成：Album\Controller\album，
                        // 这个服务名正好对应下面controllers里面的‘invokables'里面定义的
                        // 服务
                        // 注意服务名不区分大小写
                        // ModuleRouteListener的调用是在缺省的Application完成了，
                        // 如果要删除Application模块， 一定要把Module.php里面的以下代码
                        // 拷贝到Album\Module.php里面
                        /*
                         *     public function onBootstrap(MvcEvent $e)
                         * {
                         *     $eventManager        = $e->getApplication()->getEventManager();
                         *     $moduleRouteListener = new ModuleRouteListener();
                         *     $moduleRouteListener->attach($eventManager);
                         * }
                         *
                         *
                         */
                        'controller'    => 'album',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController'
        ),
    ),

    //定义view层所在的路径，以找到相应的文件
    'view_manager' => array(
        'doctype'    => 'HTML5',
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);