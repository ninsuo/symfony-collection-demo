<?php

namespace Fuz\AppBundle\Controller\Basic;

use Fuz\AppBundle\Base\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/doctrine")
 */
class DoctrineController extends BaseController
{
    /**
     * Using a table instead of a div
     *
     * @Route("/", name="doctrine")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return [
        ];
    }
}
