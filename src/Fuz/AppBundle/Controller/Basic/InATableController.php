<?php

namespace Fuz\AppBundle\Controller\Basic;

use Fuz\AppBundle\Base\BaseController;
use Fuz\AppBundle\Entity\Basic\InATable\Discount;
use Fuz\AppBundle\Entity\Basic\InATable\DiscountCollection;
use Fuz\AppBundle\Form\Basic\InATable\DiscountCollectionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/basic")
 */
class InATableController extends BaseController
{
    /**
     * Using a table instead of a div
     *
     * @Route("/inATable", name="inATable")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $discounts = new DiscountCollection();

        $discounts->setProductName('Mug');

        // 5% discount when buying from 5 to 10 items
        $discountA = new Discount();
        $discountA->setQuantityFrom(5);
        $discountA->setQuantityTo(10);
        $discountA->setDiscount(5);
        $discounts->getDiscounts()->add($discountA);

        // 10% discount when buying from 11 to 25 items
        $discountB = new Discount();
        $discountB->setQuantityFrom(11);
        $discountB->setQuantityTo(25);
        $discountB->setDiscount(10); // 10%
        $discounts->getDiscounts()->add($discountB);

        // 20% discount when buying from 26 to 99 items
        $discountC = new Discount();
        $discountC->setQuantityFrom(26);
        $discountC->setQuantityTo(99);
        $discountC->setDiscount(20); // 20%
        $discounts->getDiscounts()->add($discountC);

        $form = $this->createForm(DiscountCollectionType::class, $discounts);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
        }

        return [
            'form' => $form->createView(),
            'data' => $discounts,
        ];
    }
}
