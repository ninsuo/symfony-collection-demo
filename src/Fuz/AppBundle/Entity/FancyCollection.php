<?php

namespace Fuz\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class FancyCollection
{
    protected $fancyCollection;

    public function __construct()
    {
        $this->fancyCollection = new ArrayCollection();
    }

    public function getFancyCollection()
    {
        return $this->fancyCollection;
    }
}
