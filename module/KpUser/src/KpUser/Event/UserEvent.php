<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/5/2018
 * Time: 5:23 PM
 */

namespace KpUser\Event;


class UserEvent
{
    const USER_REGISTER_PRE = 'user.register.pre';
    const USER_REGISTER_FAIL = 'user.register.fail';
    const USER_REGISTER_POST = 'user.register.post';
}