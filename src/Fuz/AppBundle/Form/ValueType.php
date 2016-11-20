<?php

namespace Fuz\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('value', TextType::class,
              array(
                   'required' => true,
                   'label' => 'Value',
           ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Fuz\AppBundle\Entity\Value',
        ));
    }

    public function getBlockPrefix()
    {
        return 'ValueType';
    }
}
