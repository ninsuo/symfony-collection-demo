<?php

namespace Fuz\AppBundle\Entity\Basic\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Attendee
 *
 * @ORM\Table(name="track")
 * @ORM\Entity()
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Track
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     * @Assert\NotBlank
     */
    protected $subject;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Attendee", mappedBy="track", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"title" = "DESC"})
     * @Assert\Count(max = 10, maxMessage = "You can't have more than 10 people in a track.")
     * @Assert\Valid()
     */
    protected $attendees;

    /**
     * Track constructor.
     */
    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->attendees->add(new Attendee());
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
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttendees()
    {
        return $this->attendees;
    }
}
