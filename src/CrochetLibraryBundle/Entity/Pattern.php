<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pattern
 *
 * @ORM\Table(name="patterns")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\PatternRepository")
 */
class Pattern
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
     * @var string|null
     *
     * @ORM\Column(name="prize", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prize;

    /**
     * @var int
     *
     * @ORM\Column(name="designer_id", type="integer")
     */
    private $designerId;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published_date", type="datetime")
     */
    private $publishedDate;

    /**
     * @var int
     *
     * @ORM\Column(name="yarn_id", type="integer")
     */
    private $yarnId;

    /**
     * @var string
     *
     * @ORM\Column(name="gauge", type="text")
     */
    private $gauge;

    /**
     * @var int
     *
     * @ORM\Column(name="hook_id", type="integer")
     */
    private $hookId;

    /**
     * @var string
     *
     * @ORM\Column(name="yardage", type="string", length=255)
     */
    private $yardage;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern_text", type="text")
     */
    private $patternText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="text", nullable=true)
     */
    private $picture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="file", type="text", nullable=true)
     */
    private $file;

    /**
     * @var int|null
     *
     * @ORM\Column(name="like_id", type="integer", nullable=true)
     */
    private $likeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="difficulty_id", type="integer", nullable=true)
     */
    private $difficultyId;


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
     * @return Pattern
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
     * Set prize.
     *
     * @param string|null $prize
     *
     * @return Pattern
     */
    public function setPrize($prize = null)
    {
        $this->prize = $prize;

        return $this;
    }

    /**
     * Get prize.
     *
     * @return string|null
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * Set designerId.
     *
     * @param int $designerId
     *
     * @return Pattern
     */
    public function setDesignerId($designerId)
    {
        $this->designerId = $designerId;

        return $this;
    }

    /**
     * Get designerId.
     *
     * @return int
     */
    public function getDesignerId()
    {
        return $this->designerId;
    }

    /**
     * Set categoryId.
     *
     * @param int $categoryId
     *
     * @return Pattern
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set publishedDate.
     *
     * @param \DateTime $publishedDate
     *
     * @return Pattern
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    /**
     * Get publishedDate.
     *
     * @return \DateTime
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * Set yarnId.
     *
     * @param int $yarnId
     *
     * @return Pattern
     */
    public function setYarnId($yarnId)
    {
        $this->yarnId = $yarnId;

        return $this;
    }

    /**
     * Get yarnId.
     *
     * @return int
     */
    public function getYarnId()
    {
        return $this->yarnId;
    }

    /**
     * Set gauge.
     *
     * @param string $gauge
     *
     * @return Pattern
     */
    public function setGauge($gauge)
    {
        $this->gauge = $gauge;

        return $this;
    }

    /**
     * Get gauge.
     *
     * @return string
     */
    public function getGauge()
    {
        return $this->gauge;
    }

    /**
     * Set hookId.
     *
     * @param int $hookId
     *
     * @return Pattern
     */
    public function setHookId($hookId)
    {
        $this->hookId = $hookId;

        return $this;
    }

    /**
     * Get hookId.
     *
     * @return int
     */
    public function getHookId()
    {
        return $this->hookId;
    }

    /**
     * Set yardage.
     *
     * @param string $yardage
     *
     * @return Pattern
     */
    public function setYardage($yardage)
    {
        $this->yardage = $yardage;

        return $this;
    }

    /**
     * Get yardage.
     *
     * @return string
     */
    public function getYardage()
    {
        return $this->yardage;
    }

    /**
     * Set patternText.
     *
     * @param string $patternText
     *
     * @return Pattern
     */
    public function setPatternText($patternText)
    {
        $this->patternText = $patternText;

        return $this;
    }

    /**
     * Get patternText.
     *
     * @return string
     */
    public function getPatternText()
    {
        return $this->patternText;
    }

    /**
     * Set picture.
     *
     * @param string|null $picture
     *
     * @return Pattern
     */
    public function setPicture($picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return string|null
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set file.
     *
     * @param string|null $file
     *
     * @return Pattern
     */
    public function setFile($file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file.
     *
     * @return string|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set likeId.
     *
     * @param int|null $likeId
     *
     * @return Pattern
     */
    public function setLikeId($likeId = null)
    {
        $this->likeId = $likeId;

        return $this;
    }

    /**
     * Get likeId.
     *
     * @return int|null
     */
    public function getLikeId()
    {
        return $this->likeId;
    }

    /**
     * Set difficultyId.
     *
     * @param int|null $difficultyId
     *
     * @return Pattern
     */
    public function setDifficultyId($difficultyId = null)
    {
        $this->difficultyId = $difficultyId;

        return $this;
    }

    /**
     * Get difficultyId.
     *
     * @return int|null
     */
    public function getDifficultyId()
    {
        return $this->difficultyId;
    }
}
