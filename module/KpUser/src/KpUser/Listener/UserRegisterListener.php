<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/5/2018
 * Time: 5:41 PM
 */

namespace KpUser\Listener;


use KpUser\Event\UserEvent;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

class UserRegisterListener implements ListenerAggregateInterface
{

    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->getSharedManager()->attach('*',
            UserEvent::USER_REGISTER_PRE, [$this, 'checkUsername']);
        $this->listeners[] = $events->getSharedManager()->attach('*',
            UserEvent::USER_REGISTER_PRE, [$this, 'regData']);
        $this->listeners = $events->getSharedManager()->attach('*',
            UserEvent::USER_REGISTER_PRE, [$this, 'regIp']);
    }

    public function checkUsername(EventInterface $event)
    {
        //var_dump($event->getServiceLocator());
        var_dump($event->getUserEntity());
        //var_dump($event->getForm());
        var_dump($event->getUserModuleOptions());
        echo __FUNCTION__ . '<br>';
    }

    public function regData(EventInterface $event)
    {
        echo __FUNCTION__ . '<br>';
    }

    public function regIp(EventInterface $event)
    {
        echo __FUNCTION__ . '<br>';
    }
}