<?php
/**
 * Created by PhpStorm.
 * User: Steve Curran
 * Date: 07/04/2016
 * Time: 13:01
 */

namespace Itb;



use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class for Admin
 * and user login
 * Class Login
 * @package Itb
 */

class Login extends DatabaseTable
{
    /*
     * user login roles
     * student =0
     * admin =1
     */
    const ROLE_USER=0;
    const ROLE_ADMIN=1;


    /**
     * login id
     * @var integer
     */
    private $id;

    /**
     * login  password
     * @var varcar
     */
    private $password;

    /**
     *login role for student and admin
     * @var text
     */
    private $role;

    /**
     * user name
     * @var
     * student and admin
     */
    private $username;

    /**
     * get student/admin
     * @return mixed
     * get Username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * set student/admin
     * @param mixed $username
     * set Username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * get the student id
     * @return mixed
     * get user Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set the id
     * @param mixed $id
     * set user Id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get password
     * @return mixed
     * get user Password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * users password
     * @param mixed $password
     * hashed's users password
     */
    public function setPassword($password)
    {
        $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

    /**
     * get user Role
     * admin/student
     * @return mixed
     *
     *
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * set user Roles
     * admin/student
     * @param mixed $username
     *
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * looking for matching username and password
     * @param $username
     * @param $password
     * @return bool
     * @codeCoverageIgnore
     *
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = Login::getOneByUsername($username);
       // var_dump($user);
        //die();
        // if no record has this username, return FALSE
        if(null == $user)
        {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        return password_verify($password, $hashedStoredPassword);
    }

    /**
     * finds role of user by name
     * @param $username
     * @return bool
     * @codeCoverageIgnore
     *
     */
    public static function FindingRole($username)
    {
        $user = Login::getOneByUsername($username);

        if(null == $user)
        {
            return false;
        }

        // hashed correct password
        //$hashedStoredPassword = $user->getPassword();

        return $user->getRole();
    }


    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     *
     * @return mixed|null
     * @codeCoverageIgnore
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM logins WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch())
        {
            return $object;
        } else {
            return null;
        }
    }

}