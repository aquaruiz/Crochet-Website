<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hook
 *
 * @ORM\Table(name="hooks")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\HookRepository")
 */
class Hook
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
     * @ORM\Column(name="size", type="string", length=255, unique=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="letter", type="string", length=255)
     */
    private $letter;

    /**
     * @var int
     *
     * @ORM\Column(name="pattern_id", type="integer")
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
     * Set size.
     *
     * @param string $size
     *
     * @return Hook
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size.
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set letter.
     *
     * @param string $letter
     *
     * @return Hook
     */
    public function setLetter($letter)
    {
        $this->letter = $letter;

        return $this;
    }

    /**
     * Get letter.
     *
     * @return string
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Set patternId.
     *
     * @param int $patternId
     *
     * @return Hook
     */
    public function setPatternId($patternId)
    {
        $this->patternId = $patternId;

        return $this;
    }

    /**
     * Get patternId.
     *
     * @return int
     */
    public function getPatternId()
    {
        return $this->patternId;
    }
}
