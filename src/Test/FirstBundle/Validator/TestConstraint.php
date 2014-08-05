<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 24.07.14
 * Time: 16:13
 */

namespace Test\FirstBundle\Validator;


class TestConstraint extends \Symfony\Component\Validator\Constraint{

    public $message = "My custom message";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
} 