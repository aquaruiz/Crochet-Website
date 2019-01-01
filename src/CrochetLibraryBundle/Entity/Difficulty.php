<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Difficulty
 *
 * @ORM\Table(name="difficulties")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\DifficultyRepository")
 */
class Difficulty
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
     * @ORM\Column(name="level", type="string", length=255)
     */
    private $level;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CrochetLibraryBundle\Entity\User", inversedBy="difficulties")
     */
    private $user;

    /**
     * @var Pattern
     *
     * @ORM\ManyToOne(targetEntity="CrochetLibraryBundle\Entity\Pattern", inversedBy="difficulties")
     */
    private $pattern;


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
     * Set level.
     *
     * @param string $level
     *
     * @return Difficulty
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set user
     *
     * @param User|null $user
     * @return Difficulty
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pattern
     *
     * @param Pattern $pattern
     * @return Difficulty
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * Get pattern
     * @return Pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }
}
