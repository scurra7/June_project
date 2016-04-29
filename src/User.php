<?php
/**
 * Created by PhpStorm.
 * User: Steve Curran
 * Date: 07/04/2016
 * Time: 11:33
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Holds user role and password
 * Class User
 * @package Itb
 *
 *
 */
class User extends DatabaseTable
{
    /**
     * User id
     * @var integer
     */
    private $id;

    /**
     * User
     * @var mixed
     */
    private $users;

    /**
     * Password var
     * @var
     *
     */
    private $password;

    /**
     * Admin/student role
     * @var
     */
    private $role;

    /**
     * Gets user id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets user id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Gets user
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Gets user
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * Gets user password
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Gets user password
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Gets user role
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets user role
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}
