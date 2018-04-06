<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/5/2018
 * Time: 5:23 PM
 */

namespace KpUser\Event;


use KpUser\Entity\UserEntity;
use KpUser\Options\UserModuleOptions;
use Zend\EventManager\Event;
use Zend\Form\FormInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserEvent extends Event implements ServiceLocatorAwareInterface
{
    const USER_REGISTER_PRE = 'user.register.pre';
    const USER_REGISTER_FAIL = 'user.register.fail';
    const USER_REGISTER_POST = 'user.register.post';

    public function setUserModuleOptions(UserModuleOptions $userModuleOptions){
        $this->setParam('UserModuleOptions', $userModuleOptions);
        return $this;
    }

    public function getUserModuleOptions(){
        return $this->getParam('UserModuleOptions');
    }

    public function setUserEntity(UserEntity $userEntity){
        $this->setParam('UserEntity', $userEntity);
        return $this;
    }

    public function getUserEntity(){
        return $this->getParam('UserEntity');
    }

    public function setForm(FormInterface $form){
        $this->setParam('Form', $form);
        return $this;
    }

    public function getForm(){
        return $this->getParam('Form');
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->setParam('ServiceLocator', $serviceLocator);
        return $this;
    }

    public function getServiceLocator()
    {
        return $this->getParam('ServiceLocator');
    }
}