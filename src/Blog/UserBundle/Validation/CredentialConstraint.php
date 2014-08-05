<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:40
 */

namespace Blog\UserBundle\Validation;


use Symfony\Component\Validator\Constraint;

class CredentialConstraint extends  Constraint{

    public $message = "The given password does not match";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
} 