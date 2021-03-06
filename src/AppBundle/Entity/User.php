<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

     /**
     * @ORM\OneToMany(targetEntity="Billing", mappedBy="billing")
     */


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $address;

    //nullable=true: hago que el campo sea null,para que pueda validar en blanco



    //genero este campo para relacionar un usario con multiples facturas
    /**
     * @ORM\OneToMany(targetEntity="Billing", mappedBy="user")
     */
    protected $billings;



    public function __construct()
    {
        parent::__construct();
        // your own logic
    }



    public function setEmail($email)
    {
         parent::setEmail($email);
         $this->setUsername($email);
    }



    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add billings
     *
     * @param \AppBundle\Entity\Billing $billings
     * @return User
     */
    public function addBilling(\AppBundle\Entity\Billing $billings)
    {
        $this->billings[] = $billings;

        return $this;
    }

    /**
     * Remove billings
     *
     * @param \AppBundle\Entity\Billing $billings
     */
    public function removeBilling(\AppBundle\Entity\Billing $billings)
    {
        $this->billings->removeElement($billings);
    }

    /**
     * Get billings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBillings()
    {
        return $this->billings;
    }
}
