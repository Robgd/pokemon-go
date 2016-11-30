<?php

namespace AppBundle\Entity\Pokemon;

use AppBundle\Entity\User\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserPokemonStats
 *
 * @ORM\Table(name="user_pokemon_stats")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Pokemon\UserPokemonStatsRepository")
 */
class UserPokemonStats
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var Pokemon
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pokemon\Pokemon", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pokemon;

    /**
     * @var int
     *
     * @ORM\Column(name="combatPoint", type="integer")
     */
    private $combatPoint;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float")
     */
    private $size;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float")
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="hp", type="integer")
     */
    private $hp;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pokemon\Skills", cascade={"persist"})
     */
    private $skills;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set combatPoint
     *
     * @param integer $combatPoint
     *
     * @return UserPokemonStats
     */
    public function setCombatPoint($combatPoint)
    {
        $this->combatPoint = $combatPoint;

        return $this;
    }

    /**
     * Get combatPoint
     *
     * @return int
     */
    public function getCombatPoint()
    {
        return $this->combatPoint;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return UserPokemonStats
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return UserPokemonStats
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set hp
     *
     * @param integer $hp
     *
     * @return UserPokemonStats
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get hp
     *
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set pokemon
     *
     * @param \AppBundle\Entity\Pokemon\Pokemon $pokemon
     *
     * @return UserPokemonStats
     */
    public function setPokemon(\AppBundle\Entity\Pokemon\Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;

        return $this;
    }

    /**
     * Get pokemon
     *
     * @return \AppBundle\Entity\Pokemon\Pokemon
     */
    public function getPokemon()
    {
        return $this->pokemon;
    }

    /**
     * Add skill
     *
     * @param \AppBundle\Entity\Pokemon\Skills $skill
     *
     * @return UserPokemonStats
     */
    public function addSkill(\AppBundle\Entity\Pokemon\Skills $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \AppBundle\Entity\Pokemon\Skills $skill
     */
    public function removeSkill(\AppBundle\Entity\Pokemon\Skills $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User\User $user
     *
     * @return UserPokemonStats
     */
    public function setUser(\AppBundle\Entity\User\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
