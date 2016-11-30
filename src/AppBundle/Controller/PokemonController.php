<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PokemonController extends Controller
{
    /**
     * @Route("/dummy", name="dummy")
     */
    public function dummyAction()
    {
        return new JsonResponse('test');
    }
}