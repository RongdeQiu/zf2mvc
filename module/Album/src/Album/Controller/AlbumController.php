<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/15/18
 * Time: 12:55 PM
 */

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
        echo "<p>Album controller --> index view</p>";
        exit();
        return new ViewModel();
    }

    public function addAction(){
        echo "<p>Album controller --> add view</p>";
        exit();
    }

    public function editAction(){
        echo "<p>Album controller --> edit view</p>";
        exit();
    }

    public function deleteAction(){
        echo "<p>Album controller --> delete view</p>";
        exit();
    }
}

