<?php

namespace Fuz\AppBundle\Controller\Advanced;

use Fuz\AppBundle\Base\BaseController;
use Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections\City;
use Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections\Hobby;
use Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections\Travel;
use Fuz\AppBundle\Form\Advanced\FormWithSeveralCollections\TravelType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class FormWithSeveralCollectionsController extends BaseController
{
    /**
     * Advanced usage
     *
     * You can reference your form collection in the view, instead of
     * putting a selector in the form type.
     *
     * @Route("/form-with-several-collections", name="formWithSeveralCollections")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $travel = new Travel();

        $city = new City();
        $city->setName('Chamberry');
        $travel->getCities()->add($city);

        $city = new City();
        $city->setName('Olden Norway');
        $travel->getCities()->add($city);

        $city = new City();
        $city->setName('Annecy');
        $travel->getCities()->add($city);

        $hobby = new Hobby();
        $hobby->setType('Sightseeing');
        $travel->getHobbies()->add($hobby);

        $hobby = new Hobby();
        $hobby->setType('Skiing');
        $travel->getHobbies()->add($hobby);

        $hobby = new Hobby();
        $hobby->setType('Eating mountain food');
        $travel->getHobbies()->add($hobby);

        $form = $this->createForm(TravelType::class, $travel);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
        }

        return [
            'form' => $form->createView(),
            'data' => $travel,
        ];
    }

}