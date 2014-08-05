<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 24.07.14
 * Time: 11:16
 */

namespace Test\FirstBundle\Entity;


use Symfony\Component\Serializer\Tests\Fixtures\Dummy;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Test\FirstBundle\Validator\TestConstraint;

class Task
{
    protected $task;

    protected $dueDate;

    /**
     * @var $dummy MyDummy
     */
    protected  $dummy;

    function __construct(){
        $this->dummy = new MyDummy("Rafi");
    }
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata
            ->addConstraint(new TestConstraint());
    }
    /**
     * @param MyDummy $dummy
     */
    public function setDummy(MyDummy $dummy)
    {
        $this->dummy = $dummy;
    }

    /**
     * @return Dummy|MyDummy
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($dueDate = null)
    {
        $this->dueDate = $dueDate;
    }



}