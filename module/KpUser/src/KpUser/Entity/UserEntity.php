<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 4/5/2018
 * Time: 9:24 PM
 */

namespace KpUser\Entity;

class UserEntity
{
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $oldPassword;
    protected $lastPasswordChangeTime;
    protected $regDate;
    protected $lastLoginDate;
    protected $regIp;
    protected $lastLoginIp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @param mixed $oldPassword
     */
    public function setOldPassword($oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return mixed
     */
    public function getLastPasswordChangeTime()
    {
        return $this->lastPasswordChangeTime;
    }

    /**
     * @param mixed $lastPasswordChangeTime
     */
    public function setLastPasswordChangeTime($lastPasswordChangeTime): void
    {
        $this->lastPasswordChangeTime = $lastPasswordChangeTime;
    }

    /**
     * @return mixed
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @param mixed $regDate
     */
    public function setRegDate($regDate): void
    {
        $this->regDate = $regDate;
    }

    /**
     * @return mixed
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * @param mixed $lastLoginDate
     */
    public function setLastLoginDate($lastLoginDate): void
    {
        $this->lastLoginDate = $lastLoginDate;
    }

    /**
     * @return mixed
     */
    public function getRegIp()
    {
        return $this->regIp;
    }

    /**
     * @param mixed $regIp
     */
    public function setRegIp($regIp): void
    {
        $this->regIp = $regIp;
    }

    /**
     * @return mixed
     */
    public function getLastLoginIp()
    {
        return $this->lastLoginIp;
    }

    /**
     * @param mixed $lastLoginIp
     */
    public function setLastLoginIp($lastLoginIp): void
    {
        $this->lastLoginIp = $lastLoginIp;
    }


}