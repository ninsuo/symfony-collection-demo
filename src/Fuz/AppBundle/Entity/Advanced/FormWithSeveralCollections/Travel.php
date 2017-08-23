<?php

namespace Fuz\AppBundle\Entity\Advanced\FormWithSeveralCollections;

use Doctrine\Common\Collections\ArrayCollection;

class Travel
{
    protected $contact;
    protected $cities;
    protected $hobbies;
    protected $comments;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return ArrayCollection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @return ArrayCollection
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}
