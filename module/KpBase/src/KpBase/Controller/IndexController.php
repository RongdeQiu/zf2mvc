<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/25/2018
 * Time: 12:57 PM
 */

namespace KpBase\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{
    public function indexAction()
    {
        echo "KpBase index view.";
        exit();
    }
}