<?php

namespace Fuz\AppBundle\Controller\Basic;

use Fuz\AppBundle\Base\BaseController;
use Fuz\AppBundle\Entity\Basic\Entities\Action;
use Fuz\AppBundle\Entity\Basic\Entities\Actions;
use Fuz\AppBundle\Form\Basic\Entities\ActionsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/basic")
 */
class EntitiesController extends BaseController
{
    /**
     * Storing the element position on a field of your entity.
     *
     * @Route("/entities", name="entities")
     * @Template()
     */
    public function entitiesAction(Request $request)
    {
        $actions = new Actions();
        for ($i = 0; $i <= 3; $i++) {
            $action = new Action();
            $action->setId(42 + $i); // just to distinguish id and position

            switch ($i) {
                case 0:
                    $action->setName('walk the dog');
                    break;
                case 1:
                    $action->setName('eat breakfast');
                    break;
                case 2:
                    $action->setName('take a shower');
                    break;
                case 3:
                    $action->setName('yawn loudly');
                    break;
            }

            $action->setPosition($i);

            $actions->getActions()->add($action);
        }

        $form = $this->createForm(ActionsType::class, $actions);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
        }

        return [
            'form' => $form->createView(),
            'data' => $actions,
        ];
    }
}
