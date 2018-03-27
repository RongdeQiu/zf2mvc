<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/27/2018
 * Time: 12:37 AM
 */

/**
 * Trait在php5.4以后加入, 用来简化代码
 * 和解决多继承问题
 */
namespace KpUser\Options;


trait UserModuleOptionsTrait
{
    protected $userModuleOptions;

    public function setUserModuleOptions(UserModuleOptions $userModuleOptions)
    {
        $this->userModuleOptions = $userModuleOptions;
    }

    public function getUserModuleOptions()
    {
        return $this->userModuleOptions;
    }
}