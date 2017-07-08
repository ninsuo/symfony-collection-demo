<?php

namespace Fuz\AppBundle\Entity\Basic\InATable;

class Discount
{
    private $quantityFrom;
    private $quantityTo;
    private $discount;

    public function getQuantityFrom()
    {
        return $this->quantityFrom;
    }

    public function setQuantityFrom($quantityFrom)
    {
        $this->quantityFrom = $quantityFrom;

        return $this;
    }

    public function getQuantityTo()
    {
        return $this->quantityTo;
    }

    public function setQuantityTo($quantityTo)
    {
        $this->quantityTo = $quantityTo;

        return $this;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }
}
