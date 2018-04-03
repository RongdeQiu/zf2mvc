<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/3/2018
 * Time: 12:19 AM
 */

namespace KpUser\Form;


class UserRegister extends UserBase
{
    public function __construct()
    {
        parent::__construct();

        $this->add([
            'type' => 'password',
            'name' => 'passwordConfirm',
            'options' => [
                'label' => 'Password Confirm'
            ],
            'attributes' => [

            ]
        ], ['priority' => 98]); //priority用来改变表单显示的位置

        $this->add([
           'type'=>'submit',
           'name'=>'submit',
           'attributes'=>[
               'value'=>'Register',
           ]
        ]);
    }
}