<?php

namespace Fuz\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('addresses', CollectionType::class, [
            'label'        => 'Address',
            'entry_type'   => AddressType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'prototype'    => true,
            'required'     => false,
            'by_reference' => true,
            'delete_empty' => true,
            'attr'         => [
                'class' => 'collection',
            ],
        ]);

        $builder->add('save', SubmitType::class, [
                'label' => 'See my addresses',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Addresses',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'AddressesType';
    }
}
