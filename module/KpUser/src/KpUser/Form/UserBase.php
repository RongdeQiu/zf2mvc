<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/2/2018
 * Time: 11:12 PM
 */

namespace KpUser\Form;

use KpUser\Entity\UserEntity;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserBase extends Form
{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct($name, $options);

        // 设置hydrator使用ClassMethods方法来实现,
        // 同时设置数据原型为Entity\UserEntity类
        $this->setHydrator(new ClassMethods())->setObject(new UserEntity());

        $this->add([
            'type' => 'text',
            'name' => 'username',
            'options' => [
                'label' => 'Username'
            ],
            // attributes主要是给HTML/CSS格式化用的属性
            'attributes' => [
                'class' => 'username',
                'id' => 'username',
                'value' => 'Choose your username'
            ]
        ], ['priority' => 99]);

        $this->add([
            'type' => 'password',
            'name' => 'password',
            'options' => [
                'label' => 'Password'
            ],
            'attributes' => [

            ]
        ], ['priority' => 98]);

        $this->add([
            'type' => 'email',
            'name' => 'email',
            'options' => [
                'label' => 'Email',
            ]
        ], ['priority' => 97]);

    }
}