<?php

namespace CrochetLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="CrochetLibraryBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio", type="text", nullable=true)
     */
    private $portfolio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="text", nullable=true)
     */
    private $picture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pattern_id", type="integer", nullable=true)
     */
    private $patternId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="like_id", type="integer", nullable=true)
     */
    private $likeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="difficulty_rate_id", type="integer", nullable=true)
     */
    private $difficultyRateId;


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
     * @return User
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
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set portfolio.
     *
     * @param string|null $portfolio
     *
     * @return User
     */
    public function setPortfolio($portfolio = null)
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    /**
     * Get portfolio.
     *
     * @return string|null
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set picture.
     *
     * @param string|null $picture
     *
     * @return User
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
     * Set patternId.
     *
     * @param int|null $patternId
     *
     * @return User
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

    /**
     * Set categoryId.
     *
     * @param int|null $categoryId
     *
     * @return User
     */
    public function setCategoryId($categoryId = null)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId.
     *
     * @return int|null
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set likeId.
     *
     * @param int|null $likeId
     *
     * @return User
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
     * Set difficultyRateId.
     *
     * @param int|null $difficultyRateId
     *
     * @return User
     */
    public function setDifficultyRateId($difficultyRateId = null)
    {
        $this->difficultyRateId = $difficultyRateId;

        return $this;
    }

    /**
     * Get difficultyRateId.
     *
     * @return int|null
     */
    public function getDifficultyRateId()
    {
        return $this->difficultyRateId;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
