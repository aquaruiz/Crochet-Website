<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CrochetLibraryBundle\Entity\User", inversedBy="patterns")
     * @ORM\JoinColumn(name="designer_id", referencedColumnName="id")
     *
     */
    private $designer;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="CrochetLibraryBundle\Entity\Category")
     *
     * @ORM\JoinTable(name="patterns_categories",
     *     joinColumns={@ORM\JoinColumn(name="pattern_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *   )
     */
    private $categories;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published_date", type="datetime")
     */
    private $publishedDate;
//
//    /**
//     * @var Yarn
//     *
//     * @ORM\ManyToOne(targetEntity="CrochetLibraryBundle\Entity\Yarn", inversedBy="patterns")
//     * @ORM\JoinColumn(name="yarn_id", referencedColumnName="id")
//     *
//     */
//    private $yarn;

    /**
     * @var string
     *
     * @ORM\Column(name="gauge", type="text")
     */
    private $gauge;

    /**
     * @var Hook
     *
     * @ORM\ManyToOne(targetEntity="CrochetLibraryBundle\Entity\Hook", inversedBy="patterns")
     * @ORM\JoinColumn(name="hook_id", referencedColumnName="id")
     *
     */
    private $hook;

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
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="CrochetLibraryBundle\Entity\User")
     *
     * @ORM\JoinTable(name="likes",
     *     joinColumns={@ORM\JoinColumn(name="pattern_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *   )
     */
    private $likes;

    /**
     * @var ArrayCollection|Difficulty[]
     *
     * @ORM\OneToMany(targetEntity="CrochetLibraryBundle\Entity\Difficulty", mappedBy="pattern", cascade={"remove"})
     *
     */
    private $difficulty;

    /**
     * Pattern constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->publishedDate = new \DateTime('now');
        $this->categories = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->difficulty = new ArrayCollection();
    }

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
     * @param string|null $price
     *
     * @return Pattern
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get prize.
     *
     * @return string|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set designerId.
     *
     * @param int $designerId
     *
     * @return Pattern
     */

    /**
     * @return User
     */
    public function getDesigner()
    {
        return $this->designer;
    }

    /**
     * @param User $designer
     * @return Pattern
     */
    public function setDesigner($designer)
    {
        $this->designer = $designer;
        return $this;
    }

    /**
     * @return Category[]|ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category|null $category
     * @return Pattern
     */
    public function addCategory(Category $category = null)
    {
        $this->categories[] = $category;
        return $this;
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
//
//    /**
//     * @return Yarn
//     */
//    public function getYarn()
//    {
//        return $this->yarn;
//    }
//
//    /**
//     * @param Yarn $yarn
//     * @return Pattern
//     */
//    public function setYarn($yarn)
//    {
//        $this->yarn = $yarn;
//        return $this;
//    }

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
     * @return Hook
     */
    public function getHook()
    {
        return $this->hook;
    }

    /**
     * @param Hook $hook
     * @return Pattern
     */
    public function setHook($hook)
    {
        $this->hook = $hook;
        return $this;
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
     * @return string|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return User[]|ArrayCollection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param User|null $likes
     * @return Pattern
     */
    public function setLikes(User $likes = null)
    {
        $this->likes[] = $likes;
        return $this;
    }

    /**
     * @return Difficulty[]|ArrayCollection
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param Difficulty|null $difficulty
     * @return Pattern
     */
    public function setDifficulty(Difficulty $difficulty = null)
    {
        $this->difficulty[] = $difficulty;
        return $this;
    }
}
