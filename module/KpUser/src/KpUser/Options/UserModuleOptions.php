<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/26/2018
 * Time: 12:02 AM
 */

// UserModuleOptions的使用不能直接通过new UserModelOptions()方法
// 来实现,因为需要用到module.config.php里面的配置数组
// 所以要用service manager来实现
namespace KpUser\Options;

use Zend\Stdlib\AbstractOptions;

class UserModuleOptions extends AbstractOptions
{
    //定义常量为module.config.php里面的'kp_user'
    //以方便Service\Factory下面的servicemanager->setFactory调用
    const CONFIG_KEY = 'kp_user';
    protected $disabledRegister;
    protected $disabledLogin;

    /**
     * @return mixed
     */
    public function getDisabledRegister()
    {
        return $this->disabledRegister;
    }

    /**
     * @param mixed $disabledRegister
     */
    public function setDisabledRegister($disabledRegister): void
    {
        $this->disabledRegister = $disabledRegister;
    }

    /**
     * @return mixed
     */
    public function getDisabledLogin()
    {
        return $this->disabledLogin;
    }

    /**
     * @param mixed $disabledLogin
     */
    public function setDisabledLogin($disabledLogin): void
    {
        $this->disabledLogin = $disabledLogin;
    }


}