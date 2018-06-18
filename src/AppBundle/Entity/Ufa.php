<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Ufa
 *
 * @ORM\Table(name="ufa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UfaRepository")
 */
class Ufa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=8, scale=6)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=8, scale=6)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="urlsite", type="string", length=255)
     */
    private $urlsite;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="cedex", type="integer")
     */
    private $cedex;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=255)
     */
    private $town;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Formation", inversedBy="ufas")
     */
    private $formations;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * @param mixed $formations
     */
    public function setFormations($formations): void
    {
        $this->formations = $formations;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Ufa
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
     * Set urlsite
     *
     * @param string $urlsite
     *
     * @return Ufa
     */
    public function setUrlsite($urlsite)
    {
        $this->urlsite = $urlsite;

        return $this;
    }

    /**
     * Get urlsite
     *
     * @return string
     */
    public function getUrlsite()
    {
        return $this->urlsite;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ufa
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
     * Set address
     *
     * @param string $address
     *
     * @return Ufa
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
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Ufa
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set cedex
     *
     * @param string $cedex
     *
     * @return Ufa
     */
    public function setCedex($cedex)
    {
        $this->cedex = $cedex;

        return $this;
    }

    /**
     * Get cedex
     *
     * @return string
     */
    public function getCedex()
    {
        return $this->cedex;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return Ufa
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @return $this
     */

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Ufa constructor.
     */
    public function __construct()
    {
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
