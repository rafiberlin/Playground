<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:14
 */

namespace Blog\UserBundle\Entity;


use Blog\UserBundle\Validation\UserConstraint;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{

    private $login;
    private $password;
    private $repeatPassword;
    /**
     * @var \DateTime
     */
    private $creationDate;

    function __construct()
    {
        $this->creationDate = new \DateTime();
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
            ->addPropertyConstraint("login",new NotBlank())
            ->addPropertyConstraint("password",new NotBlank())
            ->addPropertyConstraint("repeatPassword",new NotBlank())
            ->addConstraint(new UserConstraint());
    }

}