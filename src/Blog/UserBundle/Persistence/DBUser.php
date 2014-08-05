<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 11:45
 */

namespace Blog\UserBundle\Persistence;


use Blog\UserBundle\Entity\User;
use Blog\UserBundle\Interfaces\UserDao;
use Doctrine\DBAL\Connection;

class DBUser implements UserDao
{

    /**
     * @var Connection
     */
    private $dbConnection;

    function __construct(Connection $c)
    {
        $this->dbConnection = $c;
    }

    /**
     * @param $user User
     */
    function save($user)
    {
        $salt = openssl_random_pseudo_bytes(22);
        $this->dbConnection->insert(
            "user",
            array(
                "username" => $user->getLogin(),
                "password" => $this->getEncryptedPassword($user->getPassword(), $salt),
                "salt" => $salt,
                "last_change" => $user->getCreationDate()->format('Y-m-d H:i:s')
            )
        );

    }

    /**
     * @param $password
     * @param $salt
     * @return bool|string
     * @throws \InvalidParameterException
     */
    public function getEncryptedPassword($password, $salt)
    {
        if (!empty($password) && !empty($salt)) {

            return password_hash(
                $password,
                PASSWORD_BCRYPT,
                array(
                    'salt' => $salt,
                )
            );
        }

        throw new \InvalidParameterException("Password and salt cannot be empty");
    }

    function authenticate($login, $password){

    }

    function load($login)
    {
        // TODO: Implement load() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function update($user)
    {
        // TODO: Implement update() method.
    }
}