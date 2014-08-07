<?php
/**
 * Created by PhpStorm.
 * User: rafiberlin
 * Date: 05.08.14
 * Time: 09:58
 */

namespace Blog\UserBundle\Validation;


use Blog\UserBundle\Entity\User;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UserConstraintValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param User $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        $password = $value->getPassword();
        $repeatPasssword = $value->getRepeatPassword();
        $login = $value->getLogin();

        if (empty($password) || $password != $repeatPasssword) {
            $this->context->addViolation("Password is either empty or does not match");
        }

        if (empty($login)) {
            $this->context->addViolation("login can't be empty");
        }

    }
}