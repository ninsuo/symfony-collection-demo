<?php

namespace Fuz\AppBundle\Entity\Basic\PositionField;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class Pub
{
    /**
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @Assert\Count(
     *      min = 1,
     *      minMessage = "Really? A pub without beers?",
     * )
     */
    protected $beers;

    public function __construct($name)
    {
        $this->name = $name;
        $this->beers = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBeers()
    {
        return $this->beers;
    }
}
