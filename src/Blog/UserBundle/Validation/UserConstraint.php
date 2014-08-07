<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:58
 */

namespace Blog\UserBundle\Validation;


use Symfony\Component\Validator\Constraint;

class UserConstraint extends Constraint
{

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
} 