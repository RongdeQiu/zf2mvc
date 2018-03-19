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
use Album\Model\AlbumTable;

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
        $albumTable = $this->getServiceLocator()->get('Album\Model\AlbumTable');
        $albumSet = $albumTable->fetchAll();
        // \Zend\Debug\Debug::dump(iterator_to_array($album));
        // exit();
        $viewModel = new ViewModel();
        $viewModel->setVariables(
            array(
                'albumSet' => $albumSet
            )
        );
        return $viewModel;
    }

    public function addAction()
    {
        echo "<p>Album controller --> add view</p>";
        exit();
    }

    public function editAction()
    {
        echo "<p>Album controller --> edit view</p>";
        exit();
    }

    public function deleteAction()
    {
        echo "<p>Album controller --> delete view</p>";
        exit();
    }

}

