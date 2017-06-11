<?php

namespace Fuz\AppBundle\Form\Options\PositionField;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('actions', CollectionType::class, [
            'label'        => 'Actions to do after waking up (executed in the given order)',
            'entry_type'   => ActionType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'prototype'    => true,
            'required'     => false,
            'by_reference' => true,
            'delete_empty' => true,
            'attr'         => [
                'class' => 'actions-collection',
            ],
        ]);

        $builder->add('save', SubmitType::class, [
                'label' => 'See actions',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Options\PositionField\Actions',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'ActionsType';
    }
}
