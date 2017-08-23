<?php

namespace Fuz\AppBundle\Form\Advanced\FormWithSeveralCollections;

use Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'city';
    }
}
