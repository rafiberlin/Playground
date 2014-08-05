<?php
/**
 * Created by PhpStorm.
 * User: rlatif
 * Date: 05.08.14
 * Time: 09:30
 */

namespace Blog\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserCreation extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("login", "text", array("required"=>true))
            ->add("password", "password",array("required"=>true))
            ->add("repeatPassword", "password",array("required"=>true))
            ->add("submit","submit");

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(
            array(
                'data_class' => 'Blog\UserBundle\Entity\User',
                'cascade_validation' => true,
            )
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "UserCreation";
    }
}