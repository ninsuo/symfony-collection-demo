<?php

namespace Fuz\AppBundle\Entity\Basic\PositionField;

use Symfony\Component\Validator\Constraints as Assert;

class Beer
{
    /**
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @Assert\Range(
     *      min = 1,
     *      max = 15,
     *      minMessage = "This is a beer, not a glass of water!",
     *      maxMessage = "This is a beer, not a glass of champagne!"
     * )
     */
    private $price;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
