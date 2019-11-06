<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pokemon;


class CharacterController extends AbstractController
{
    /**
     * @Route("/pokemon",
     *      name="pokemon_redirect_index",
     *      methods={"GET", "HEAD"}
     *)
     */
    public function redirectIndex()
    {
        return $this->redirectToRoute('pokemon_index');
    }

    /**
         * @Route("/pokemon/index",
         *      name="pokemon_index",
         *      methods={"GET", "HEAD"}
         *)
    */
    public function index()
    {
        $this->denyAccessUnlessGranted('pokemonIndex', null);

        $pokemons = $this->pokemonService->getAll();

        return new JsonResponse($characters);
    }

    private $characterService;

    public function __construct(PokemonServiceInterface $pokemonService)
    {
        $this->pokemonService=$pokemonService;
    }
