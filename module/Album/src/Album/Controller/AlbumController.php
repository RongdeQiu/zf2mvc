<?php
/**
 * Created by PhpStorm.
 * User: rongde
 * Date: 3/15/18
 * Time: 12:55 PM
 */

namespace Album\Controller;

use Album\Form\AlbumForm;
use Album\Model\Album;
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
        $albumForm = new AlbumForm();

        $request = $this->getRequest();

        //当某个变量没有代码提示的时候
        //可以通过使用get_class来显示使用的是哪个类
        //由此进入这个类去查看具体的使用方法
        //var_dump(get_class($request));

        if ($request->isPost()) {
            //是POST回来的表单
            //新的PHP版本使用下面的方法来获取POST数据
            $postParameters = $request->getContent();

            //获取的是string类型的uri，将string转换成array
            parse_str($postParameters,$postArray);

            //表单验证
            $albumForm->setData($postArray);
            $album = new Album();
            $albumForm->setInputFilter($album->getInputFilter());

            if($albumForm->isValid()){
                $album->exchangeArray($albumForm->getData());
                $albumTable = $this->getServiceLocator()->get('Album\Model\AlbumTable');
                $albumTable->saveAlbum($album);
                $this->redirect()->toRoute('album');
            }
            else{
               // todo
            }


        } else {

            //不是POST回来的表单， 需要将空表单提交给前端

            //用来改变某个element的特定属性
            $albumForm->get('submit')->setValue('Add');
            //用来改变post回来的表单指向的action
            $albumForm->setAttribute('action', 'add');
        }

        $viewModel = new ViewModel();
        $viewModel->setVariables(
            array(
                'form' => $albumForm,
            )
        );
        return $viewModel;
        //echo "<p>Album controller --> add view</p>";
        //exit();
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

