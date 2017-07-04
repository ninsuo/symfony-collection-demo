<?php

namespace Fuz\AppBundle\Form\Basic\PositionField;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // you'd not expose id normally, but you need to see that id
        // won't change, only position will be updated
        $builder->add('id', TextType::class, [
            'attr' => [
                'readonly' => true,
                'autocomplete' => 'off',
            ],
        ]);

        $builder->add('name', TextType::class, [
            'attr' => [
                'autocomplete' => 'off',
            ]
        ]);

        // position would usually be stored in a hidden type, but here we want
        // you to see the result explicitely
        $builder->add('position', TextType::class, [
            'attr' => [
                'readonly' => true,
                'class'    => 'my-position', // selector is the one used on the js side
                'autocomplete' => 'off',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Basic\PositionField\Action',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'ActionType';
    }
}
