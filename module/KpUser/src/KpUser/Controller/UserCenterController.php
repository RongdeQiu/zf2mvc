<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/24/18
 * Time: 1:26 PM
 */

namespace KpUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UserCenterController extends AbstractActionController{
    public function indexAction()
    {
        echo "UserConter - Index view.";
        exit();
    }
}