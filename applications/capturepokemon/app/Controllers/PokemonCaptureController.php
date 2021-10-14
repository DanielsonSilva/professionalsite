<?php
namespace App\Controllers;

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use CodeIgniter\HTTP\RequestInterface;
use phpDocumentor\Reflection\Types\Boolean;
use danielsonsilva\CapturePokemon\PokemonGame;

class PokemonCaptureController extends BaseController
{
    /** @var PokemonGame The game of pokemon */
    private $pokemonGame;

    /** @var string directions of the pokemon game */
    private $directions;

    /**
     * Initiate a new PokemonGame
     * @return string Index page
     */
	public function index()
	{
	    $this->pokemonGame = new PokemonGame();
        $this->directions = "";
	    $this->savePokemonGameState();
		return view('pokemongame');
	}

    /**
     * Adds a dice corresponding to the var 'value' in post request
     */
	public function addDirection()
    {
        $direction = $this->request->getVar("value");
        $data = [];
        if ($this->validateDirection($direction)) {
            $this->loadPokemonGameState();
            $this->directions .= $direction;
            $data["current_direction"] = "Current movement: " . strval($this->directions);
            $this->savePokemonGameState();
            $this->response->setStatusCode(200);
        } else {
            // Bad Request
            $this->response->setStatusCode(400);
            $data['message'] = "Sorry, Bad Request. <br /> ";
            $data['message'] .= "Select another direction from the list and try again <br />";
            $data['message'] .= "Resetting the roller";
            $this->pokemonGame = new PokemonGame();
        }
        echo json_encode($data);
    }

    /**
     * Apply the movement to the player and check how many pokemon the Player
     * had catch.
     * @return int how many pokemon has the player caught
     */
    public function catchPokemon()
    {
        $this->loadPokemonGameState();
        $data = array();
        if (strlen($this->directions)) {
             $result = $this->pokemonGame->walkDirections($this->directions);
             $data['message'] = "Pokemon caught: " . $result;
        } else {
             $data['message'] = "Add directions and try to catch'em all again";
        }
        $this->response->setStatusCode(200);
        echo json_encode($data);
    }

    /**
     * Resets the direction to be taken by the player.
     */
    public function resetDirection()
    {
        $this->pokemonGame = new PokemonGame();
        $this->savePokemonGameState();
        $this->response->setStatusCode(200);
        echo json_encode(['status' => 'success']);
    }

    /**
     * Validate if the direction is one of the available ones
     * @param string $direction Direction
     * @return bool true if is valid, False otherwise
     */
    private function validateDirection($direction) : bool
    {
        $whiteList = ["N", "E", "O", "S"];
        return in_array($direction, $whiteList);
    }

    /**
     * Saves the pokemon's state into session data
     */
    private function savePokemonGameState()
    {
        $this->session->set('pokemonGame', $this->pokemonGame);
        $this->session->set('directions', $this->directions);
    }

    /**
     * Loads the pokemon's state into session data
     */
    private function loadPokemonGameState()
    {
        $this->pokemonGame = $this->session->get('pokemonGame');
        $this->directions = $this->session->get('directions');
    }

}
