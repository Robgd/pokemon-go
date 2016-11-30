<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class LoadPokemonData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();
        $typeSet = $loader->loadFile(__DIR__.'/../../Resources/fixtures/orm/pokemon/type.yml');

        foreach ($typeSet->getObjects() as $type) {
            $manager->persist($type);
        }

        $pokemonSet = $loader->loadFile(
            __DIR__.'/../../Resources/fixtures/orm/pokemon/pokemon.yml',
            $typeSet->getParameters(),
            $typeSet->getObjects()
        );

        foreach ($pokemonSet->getObjects() as $pokemon) {
            $manager->persist($pokemon);
        }

        $manager->flush();
    }
}