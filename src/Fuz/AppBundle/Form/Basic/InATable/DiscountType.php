<?php

namespace Fuz\AppBundle\Form\Basic\InATable;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantityFrom', IntegerType::class, [
                'label' => false,
            ])
            ->add('quantityTo', IntegerType::class, [
                'label' => false,
            ])
            ->add('discount', PercentType::class, [
                'label' => false,
                'type' => 'integer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Fuz\AppBundle\Entity\Basic\InATable\Discount',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'DiscountType';
    }
}
