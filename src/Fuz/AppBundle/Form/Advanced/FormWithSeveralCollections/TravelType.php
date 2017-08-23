<?php

namespace Fuz\AppBundle\Form\Advanced\FormWithSeveralCollections;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contact', TextType::class, [
            'label' => 'Your contact information',
        ]);

        $builder->add('cities', CollectionType::class, [
            'label'         => 'Regions or cities you wish to visit',
            'entry_type'    => CityType::class,
            'entry_options' => [
                'label' => false,
            ],
            'allow_add'     => true,
            'allow_delete'  => true,
            'prototype'     => true,
            'required'      => false,
            'by_reference'  => true,
            'delete_empty'  => true,
            'attr'          => [
                // Here is the selector for "cities" collection
                'class' => 'collection-cities',
            ],
        ]);

        $builder->add('hobbies', CollectionType::class, [
            'label'         => 'Activities you wish to do during this trip',
            'entry_type'    => HobbyType::class,
            'entry_options' => [
                'label' => false,
            ],
            'allow_add'     => true,
            'allow_delete'  => true,
            'prototype'     => true,
            'required'      => false,
            'by_reference'  => true,
            'delete_empty'  => true,
            'attr'          => [
                // Here is the selector for "hobbies" collection
                'class' => 'collection-hobbies',
            ],
        ]);

        $builder->add('comments', TextareaType::class, [
            'label'    => 'Any comments?',
            'required' => false,
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Send my request',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections\Travel',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'travel';
    }
}
