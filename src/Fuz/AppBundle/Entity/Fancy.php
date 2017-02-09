<?php

namespace Fuz\AppBundle\Entity;

class Fancy
{
    private $a;
    private $b;
    private $c;

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->c;
    }

    public function setA($a)
    {
        $this->a = $a;
        return $this;
    }

    public function setB($b)
    {
        $this->b = $b;
        return $this;
    }

    public function setC($c)
    {
        $this->c = $c;
        return $this;
    }
}
