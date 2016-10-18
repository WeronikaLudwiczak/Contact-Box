<?php

namespace weronika\Bundle\ContactBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\ManyToOne(targetEntity="Address",inversedBy="users")
     * @ORM\JoinColumn(name="address_id",referencedColumnName="id", onDelete="CASCADE")
     */
    private $address;
    /**
     * @ORM\OneToMany(targetEntity="Email",mappedBy="user")
     */
    private $emails;
    /**
     * @ORM\OneToMany(targetEntity="Phone",mappedBy="user")
     */
    private $phones;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=60)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=60)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->firstName." ".$this->lastName;
    }

    /**
     * Set address
     *
     * @param \weronika\Bundle\ContactBoxBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\weronika\Bundle\ContactBoxBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \weronika\Bundle\ContactBoxBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add emails
     *
     * @param \weronika\Bundle\ContactBoxBundle\Entity\Email $emails
     * @return User
     */
    public function addEmail(\weronika\Bundle\ContactBoxBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \weronika\Bundle\ContactBoxBundle\Entity\Email $emails
     */
    public function removeEmail(\weronika\Bundle\ContactBoxBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add phones
     *
     * @param \weronika\Bundle\ContactBoxBundle\Entity\Phone $phones
     * @return User
     */
    public function addPhone(\weronika\Bundle\ContactBoxBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \weronika\Bundle\ContactBoxBundle\Entity\Phone $phones
     */
    public function removePhone(\weronika\Bundle\ContactBoxBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }
}
