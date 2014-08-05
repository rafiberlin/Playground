<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 24.07.14
 * Time: 17:39
 */

namespace Test\FirstBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            ->add('dueDate')
            ->add('dummy', new MyDummyType())
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'task';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(
            array(
                'data_class' => 'Test\FirstBundle\Entity\Task',
                'cascade_validation' => true,
            )
        );
    }
}