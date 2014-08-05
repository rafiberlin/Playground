<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:40
 */

namespace Blog\UserBundle\Validation;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CredentialConstraintValidator extends ConstraintValidator{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        // TODO: Implement validate() method.
    }
}