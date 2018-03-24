<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/14/2018
 * Time: 11:56 PM
 */

/*
 * 1. 告诉ModuleManager我的模块配置是什么
 * 2. 注册一些服务
 * 3. 告诉ModuleManager我怎么去自动加载我的Module你的文件
 * 1
 */

namespace Album;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface, ServiceProviderInterface
{
    //通过getConfig去调取当前模块Album目录下的config文件夹下面的module.config.php
    //配置文件。
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    //自动加载的psr-0规范
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

    //使用service manager来设置访问数据库
    //一般配置在Module下面的Module.php里面，或者是config/module.config.php里面
    //最后都会合并成一个完成的config文件
    /*
     * 1. 当第一次访问“Album\Model\AlbumTable"的时候，会执行下面的第一个代理工厂内的匿名函数
     * 2. 因为匿名函数调用了“AlbumTableGateway”内，所以会去执行一下的第二个代理工厂内的匿名函数
     * 3. 第二个代理类内部的匿名函数，访问了“Zend\Db\Adapter\Adapter”类，这个类在Global.php里面
     *     指向了Zend\Db\Adapter\AdapterServiceFactory
     * 4. AdapterServiceFactory类里面有如下函数来生成servie
     *     public function createService(ServiceLocatorInterface $serviceLocator)
     *           {
     *                $config = $serviceLocator->get('Config');
     *                   return new Adapter($config['db']);
     *           }
     * 5. 生成service需要的db在global.php里面有手工定义
     * 6. 在需要访问数据库的地方，采用以下方法实现
     *         $albumTable = $this->getServiceLocator()->get('Album\Model\AlbumTable');
     *         $album = $albumTable->fetchAll();
     *
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' => function (ServiceLocatorInterface $sm) {
                    $tableGateway = $sm->get('AlbumTableGateway');
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },
                'AlbumTableGateway' => function (ServiceLocatorInterface $sm) {
                    //通过代理工厂生成db adapter
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');

                    //ResultSet()就是定义result的数据原型，也就是讲result保存在
                    //new Album()数据类型的array里面
                    //会用到Album类里面的exchangeArray()函数
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->getArrayObjectPrototype(new Album());

                    //返回TableGateway数据类型
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}