<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 04.08.14
 * Time: 15:50
 */

namespace Blog\UserBundle\Entity;


use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Credential
{

    private $login;
    private $password;

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata
            ->addPropertyConstraint("login", new NotBlank())
            ->addPropertyConstraint("login", new Length(array("min" => 4)))
            ->addPropertyConstraint("password", new NotBlank())
            ->addPropertyConstraint("password", new Length(array("min" => 6)));

    }
}