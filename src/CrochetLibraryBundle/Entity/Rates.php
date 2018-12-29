<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rates
 *
 * @ORM\Table(name="rates")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\RatesRepository")
 */
class Rates
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
     * Set userId.
     *
     * @param int $userId
     *
     * @return Rates
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
     * @return Rates
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
