<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 24.07.14
 * Time: 17:46
 */

namespace Test\FirstBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MyDummyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('vorname');
    }

    public function getName()
    {
        return 'dummy';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(
            array(
                'data_class' => 'Test\FirstBundle\Entity\MyDummy',
                'cascade_validation' => true,
            )
        );
    }
} 