<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 11:45
 */

namespace Blog\UserBundle\Persistence;


use Blog\UserBundle\Entity\Credential;
use Blog\UserBundle\Entity\User;
use Blog\UserBundle\Interfaces\UserDao;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Statement;

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
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
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
     * @param Credential $credential
     */
    function authenticate($credential)
    {
        $success = false;
        /**
         * @var User $user
         */
        $user = $this->load($credential->getLogin());
        $savedPassword = $this->getEncryptedPassword($credential->getPassword(), $user->getSalt());
        if ($user->getPassword() == $savedPassword) {
            $success = true;
        }
        return $success;
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


    function load($login)
    {
        $slq = "SELECT * FROM user WHERE username = '" . $login . "'";
        /**
         * @var $stmt Statement
         */
        $stmt = $this->dbConnection->executeQuery($slq);
        $res = $stmt->fetchAll();
        $user = new User();
        if (count($res) > 0) {
            $userInfo = $res[0];
            $user->setLogin($userInfo["username"]);
            $user->setPassword($userInfo["password"]);
            $user->setSalt($userInfo["salt"]);
            $user->setCreationDate($userInfo["last_change"]);
        } else {
            throw new \Exception("User does not exist");
        }

        return $user;
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