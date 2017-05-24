<?php

namespace Fuz\AppBundle\Controller\Options;

use Fuz\AppBundle\Base\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type;

/**
 * @Route("/options")
 */
class CustomButtonsController extends BaseController
{
    /**
     * JavaScript options
     *
     * Customized buttons
     *
     * @Route("/customButtons", name="customButtons")
     * @Template()
     */
    public function customButtonsAction(Request $request)
    {
        $data = [
            'values' => ["a", "b", "c"],
        ];

        $form = $this
            ->get('form.factory')
            ->createNamedBuilder('form', Type\FormType::class, $data)
            ->add('values', Type\CollectionType::class, array(
                'entry_type' => Type\TextType::class,
                'label' => 'Add, move, remove values and press Submit.',
                'entry_options' => array(
                    'label' => 'Value',
                ),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'attr' => array(
                    'class' => "form-collection",
                ),
            ))
            ->add('submit', Type\SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
        }

        return [
            'form' => $form->createView(),
            'formData' => $data,
        ];
    }
}
