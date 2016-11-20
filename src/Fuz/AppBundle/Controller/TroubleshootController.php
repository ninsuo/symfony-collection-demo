<?php

namespace Fuz\AppBundle\Controller;

use Fuz\AppBundle\Base\BaseController;
use Fuz\AppBundle\Entity\Task;
use Fuz\AppBundle\Entity\Tasks;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/troubleshoot")
 */
class TroubleshootController extends BaseController
{
    /**
     * Basic usage
     *
     * @Route("/hide-form-labels", name="hideFormLabels")
     * @Template()
     */
    public function hideFormLabelsAction(Request $request)
    {
        $dataA = new Tasks();
        $dataB = new Tasks();
        $dataC = new Tasks();

        $task = new Task();
        $task->setTask('Eat');
        $task->setDueDate(new \DateTime("2016-03-22"));
        $dataA->getTasks()->add($task);
        $dataB->getTasks()->add($task);
        $dataC->getTasks()->add($task);

        $task = new Task();
        $task->setTask('Sleep');
        $task->setDueDate(new \DateTime("2016-03-23"));
        $dataA->getTasks()->add($task);
        $dataB->getTasks()->add($task);
        $dataC->getTasks()->add($task);

        $formA = $this->get('form.factory')->createNamed('havingLabels', 'Fuz\AppBundle\Form\TasksType', $dataA);
        $formB = $this->get('form.factory')->createNamed('withoutLabels', 'Fuz\AppBundle\Form\TasksType', $dataB);
        $formC = $this->get('form.factory')->createNamed('withFormTheme', 'Fuz\AppBundle\Form\TasksType', $dataB);

        if ($request->isMethod('POST')) {
            $formA->handleRequest($request);
            $formB->handleRequest($request);
            $formC->handleRequest($request);
        }

        return array(
            'formA' => $formA->createView(),
            'dataA' => $dataA,
            'formB' => $formB->createView(),
            'dataB' => $dataB,
            'formC' => $formC->createView(),
            'dataC' => $dataC,
        );
    }

    /**
     * A form having a theme and containing several fields
     *
     * @Route(
     *      "/custom-jquery-version",
     *      name = "customJqueryVersion"
     * )
     * @Template()
     */
    public function customJqueryVersionAction(Request $request)
    {
        $data = array('values' => ['a', 'b', 'c']);

        $form = $this
           ->get('form.factory')
           ->createNamedBuilder('form', 'form', $data)
           ->add('url', 'text')
           ->add('values', 'collection', array(
               'type'         => 'text',
               'label'        => 'Add, move, remove values and press Submit.',
               'options'      => array(
                   'label' => 'Value',
               ),
               'allow_add'    => true,
               'allow_delete' => true,
               'prototype'    => true,
               'attr'         => array(
                   'class' => "form-collection",
               ),
           ))
           ->add('submit', 'submit')
           ->getForm()
        ;

        $jquery = '';
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $jquery = $form->getData()['url'];
        }

        return [
            'jquery' => $jquery,
            'form'   => $form->createView(),
            'data'   => $data,
        ];
    }
}
