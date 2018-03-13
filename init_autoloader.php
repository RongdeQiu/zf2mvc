<?php
/*
 * Delete composer autoload
 * Manually initialize autoload with Zend/Loader/AutoloaderFactory.php
 *
 */
include  'vendor/zendframework/zendframework/library/Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        'autoregister_zf' => true
    )
));



