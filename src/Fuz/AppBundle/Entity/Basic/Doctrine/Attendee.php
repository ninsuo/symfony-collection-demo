<?php

namespace Fuz\AppBundle\Entity\Basic\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Tests\Fixtures\Person;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Attendee
 *
 * @ORM\Table(name="attendee")
 * @ORM\Entity()
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Attendee
{
    /**
     * @var Track
     *
     * @ORM\ManyToOne(targetEntity="Track", inversedBy="attendees")
     * @ORM\JoinColumn(name="track_id", referencedColumnName="id", onDelete="cascade")
     * @ORM\Id
     * @Assert\Type(type="Track")
     */
    protected $track;

    /**
     * @var Individual
     *
     * @ORM\OneToMany(targetEntity="Individual", mappedBy="attendee", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"name" = "DESC"})
     * @Assert\Valid()
     */
    protected $person;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Choice({"Teacher", "Student"})
     * @Assert\NotBlank
     */
    protected $title;

    /**
     * Attendee constructor.
     */
    public function __construct()
    {
        $this->person = new Person();
    }

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
