<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 24.07.14
 * Time: 16:15
 */

namespace Test\FirstBundle\Validator;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TestConstraintValidator extends ConstraintValidator{

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
        var_dump($value);
        throw new \Exception();
    }
}