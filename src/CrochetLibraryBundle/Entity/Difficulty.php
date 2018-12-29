<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Difficulty
 *
 * @ORM\Table(name="difficulty_levels")
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
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

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
     * Set userId.
     *
     * @param int $userId
     *
     * @return Difficulty
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set patternId.
     *
     * @param int $patternId
     *
     * @return Difficulty
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
