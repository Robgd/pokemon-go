<?php

namespace AppBundle\Behavior;

use AppBundle\Entity\Pokemon\UserPokemonStats;
use Doctrine\ORM\EntityManager;

class PokemonBehavior
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function createRandomPokemon()
    {
        $userPokemonStats = new UserPokemonStats();

        $pokemonRespository = $this->em->getRepository('AppBundle:Pokemon\Pokemon');
        $pokemons = $pokemonRespository->findAll();
        shuffle($pokemons);
        $pokemon = $pokemons[0];

        $userPokemonStats
            ->setPokemon($pokemon)
            ->setCombatPoint(mt_rand(10, 1500))
            ->setHp(rand(50, 1500))
            ->setSize(rand(1, 8))
        ;
    }
}