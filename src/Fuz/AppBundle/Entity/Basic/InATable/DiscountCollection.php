<?php

namespace Fuz\AppBundle\Entity\Basic\InATable;

use Doctrine\Common\Collections\ArrayCollection;

class DiscountCollection
{
    protected $productName;
    protected $discounts;

    public function __construct()
    {
        $this->discounts = new ArrayCollection();
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    public function getDiscounts()
    {
        return $this->discounts;
    }
}
