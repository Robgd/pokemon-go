<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PokemonController extends Controller
{
    /**
     * @Route("/dummy", name="dummy")
     */
    public function dummyAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $pokemonRepository = $manager->getRepository('AppBundle:Pokemon\Pokemon');

        $pokemons = $pokemonRepository->find(13);

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($pokemons, 'json');

        return new JsonResponse($json, 200, [], true);
    }
}