<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/26/2018
 * Time: 11:19 PM
 */

namespace KpUser\Options;


interface UserModuleOptionsAwareInterface
{
    public function setUserModuleOptions(UserModuleOptions $userModuleOptions);
    public function getUserModuleOptions();
}