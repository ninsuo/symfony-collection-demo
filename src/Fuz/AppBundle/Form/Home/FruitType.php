<?php

namespace Fuz\AppBundle\Form\Home;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FruitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('name', TextType::class, [
               'required' => true,
               'label'    => 'Fruit name',
           ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Home\Fruit',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'FruitType';
    }
}
