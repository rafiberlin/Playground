<?php
/**
 * Created by PhpStorm.
 * User: rafiberlin
 * Date: 24.07.14
 * Time: 11:43
 */

namespace Test\FirstBundle\Entity;


use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Test\FirstBundle\Validator\TestConstraint;

class MyDummy
{

    private $name;
    private $vorname;


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    function  __construct($name)
    {
        $this->name = $name;
    }
} 