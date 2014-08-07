<?php
/**
 * Created by PhpStorm.
 * User: rafiberlin
 * Date: 05.08.14
 * Time: 16:50
 */

namespace Blog\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserLogin extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("login", "text", array("required" => true))
            ->add("password", "password", array("required" => true))
            ->add("submit", "submit");

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(
            array(
                'data_class' => 'Blog\UserBundle\Entity\Credential',
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
        return "UserLogin";
    }
} 