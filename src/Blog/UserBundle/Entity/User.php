<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:14
 */

namespace Blog\UserBundle\Entity;


use Blog\UserBundle\Validation\UserConstraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{

    private $login;
    private $id;
    private $password;
    private $repeatPassword;
    private $salt;
    /**
     * @var \DateTime
     */
    private $creationDate;

    function __construct()
    {
        $this->creationDate = new \DateTime();
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }


    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $repeatPassword
     */
    public function setRepeatPassword($repeatPassword)
    {
        $this->repeatPassword = $repeatPassword;
    }


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRepeatPassword()
    {
        return $this->repeatPassword;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata
            ->addPropertyConstraint("login", new NotBlank())
            ->addPropertyConstraint("login", new Length(array("min" => 4)))
            ->addPropertyConstraint("password", new NotBlank())
            ->addPropertyConstraint("password", new Length(array("min" => 6)))
            ->addPropertyConstraint("repeatPassword", new NotBlank())
            ->addPropertyConstraint("repeatPassword", new Length(array("min" => 6)))
            ->addConstraint(new UserConstraint());
    }
}