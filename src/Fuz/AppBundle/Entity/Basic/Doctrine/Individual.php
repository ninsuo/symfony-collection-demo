<?php

namespace Fuz\AppBundle\Entity\Basic\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Individual
 *
 * @ORM\Table(name="individual")
 * @ORM\Entity()
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Individual
{
    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Attendee", inversedBy="person")
     * @ORM\JoinColumn(referencedColumnName="track_id", onDelete="cascade")
     * @ORM\Id
     */
    protected $attendee;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
