<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PokePHP\PokeApi;

class PokemonController extends Controller
{
    /** 
     * get names of all pokeman
     */
    public function index($pageNo = null)
    {
        $api = new PokeApi;
        $limit = 20;
        $offset = 20 * $pageNo;

        //pagination
        if ($pageNo == -1 || empty($pageNo) || $pageNo == 0) {
            $previousLink = '#';
        } else {
            $previousPage = $pageNo - 1;
            $previousLink = '/previous/' . $previousPage;
        }

        $nextPage = $pageNo + 1;
        $nextLink = '/next/' . $nextPage;

        //get pokemon resources from pokemon api
        $json = $api->resourceList('pokemon', $limit, $offset);
        $pokemonData = json_decode($json, true);

        //pokemon search suggestion 
        $selectData = $this->searchBoxPrefill();
        return view('pokedex', ['pokemons' => $pokemonData, 'select' => $selectData, 'next' =>  $nextLink, 'previous' => $previousLink]);
    }

    /**
     * Search for pokeman name
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $name = $request->input("name");
        return Redirect::to('getpokemon/' . $name);
    }

    /**
     * Get pokeman details
     * 
     */
    public function getPokemon($name)
    {
        $api = new PokeApi;
        $json = $api->pokemon($name);
        $pokemonData = json_decode($json, true);

        //pokemon search suggestion 
        $selectData = $this->searchBoxPrefill();
        return view('search', ['pokemons' => $pokemonData, 'name' => $name, 'select' => $selectData]);
    }

    /**
     * Get search suggestions for pokemon
     * 
     */
    public function searchBoxPrefill()
    {
        $api = new PokeApi;
        $json = $api->resourceList('pokemon', -1, 0);
        $pokemonData = json_decode($json, true);
        return $pokemonData;
    }
}
