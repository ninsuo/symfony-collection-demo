<?php

namespace Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections;

class Hobby
{
    private $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
