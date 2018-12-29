<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yarn
 *
 * @ORM\Table(name="yarns")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\YarnRepository")
 */
class Yarn
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="fiber", type="string", length=255)
     */
    private $fiber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pattern_id", type="integer", nullable=true)
     */
    private $patternId;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Yarn
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set brand.
     *
     * @param string $brand
     *
     * @return Yarn
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand.
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set fiber.
     *
     * @param string $fiber
     *
     * @return Yarn
     */
    public function setFiber($fiber)
    {
        $this->fiber = $fiber;

        return $this;
    }

    /**
     * Get fiber.
     *
     * @return string
     */
    public function getFiber()
    {
        return $this->fiber;
    }

    /**
     * Set patternId.
     *
     * @param int|null $patternId
     *
     * @return Yarn
     */
    public function setPatternId($patternId = null)
    {
        $this->patternId = $patternId;

        return $this;
    }

    /**
     * Get patternId.
     *
     * @return int|null
     */
    public function getPatternId()
    {
        return $this->patternId;
    }
}
