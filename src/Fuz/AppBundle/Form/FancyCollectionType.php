<?php

namespace Fuz\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FancyCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fancyCollection', Type\CollectionType::class, [
            'entry_type'   => FancyType::class,
            'label'        => 'Add, move, remove values and press Submit.',
            'allow_add'    => true,
            'allow_delete' => true,
            'prototype'    => true,
            'required'     => false,
            'attr'         => [
                'class' => 'collection',
            ],
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'See my data',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\FancyCollection',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'FancyCollectionType';
    }
}
