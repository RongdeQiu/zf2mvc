<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/3/2018
 * Time: 12:25 AM
 */

namespace KpUser\Form;


class UserLogin extends UserBase
{
public function __construct()
{
    parent::__construct();
    $this->remove('email');
    $this->add([
       'type'=>'submit',
       'name'=>'submit',
       'attributes'=>[
           'value'=>'Login'
       ]
    ]);
}
}