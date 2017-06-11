<?php

namespace Fuz\AppBundle\Controller\Basic;

use Fuz\AppBundle\Base\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/basic")
 */
class SimpleCollectionController extends BaseController
{
    /**
     * A simple collection that even don't use an entity.
     *
     * @Route("/simple-collection", name="basic")
     * @Template()
     */
    public function simpleCollectionAction(Request $request)
    {
        $data = ['values' => ['a', 'b', 'c']];

        $form = $this
           ->createFormBuilder($data)
           ->add('values', Type\CollectionType::class, [
               'entry_type'    => Type\TextType::class,
               'entry_options' => [
                   'label' => 'Value',
               ],
               'label'        => 'Add, move, remove values and press Submit.',
               'allow_add'    => true,
               'allow_delete' => true,
               'prototype'    => true,
               'required'     => false,
               'attr'         => [
                   'class' => 'my-selector',
               ],
           ])
           ->add('submit', Type\SubmitType::class)
           ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
        }

        return [
                'form' => $form->createView(),
                'data' => $data,
        ];
    }
}
