<?php
namespace App\Controllers;

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use CodeIgniter\HTTP\RequestInterface;
use phpDocumentor\Reflection\Types\Boolean;
use danielsonsilva\DiceRoller\DiceRoller;

class DiceRollerController extends BaseController
{
    /**
     * @var DiceRoller The dice roller object to roll dice
     */
    private $diceRoller;

    /**
     * Initiate a new diceRoller
     * @return string Index page
     */
	public function index()
	{
	    $this->diceRoller = new DiceRoller();
	    $this->saveDiceRollerState();
		return view('diceroller');
	}

    /**
     * Adds a dice corresponding to the var 'value' in post request
     */
	public function addDice()
    {
        $valueReceived = $this->request->getVar("value");
        $data = [];
        if ($this->validateDie($valueReceived)) {
            $this->loadDiceRollerState();
            $this->diceRoller->addDice(1, $valueReceived);
            $data["current_roll"] = "Current roll: " . strval($this->diceRoller);
            $this->saveDiceRollerState();
            $this->response->setStatusCode(200);
        } else {
            // Bad Request
            $this->response->setStatusCode(400);
            $data['message'] = "Sorry, Bad Request. <br /> ";
            $data['message'] .= "Select another dice from the list and try again <br />";
            $data['message'] .= "Resetting the roller";
            $this->diceRoller = new DiceRoller();
        }
        echo json_encode($data);
    }

    /**
     * Rolls the dice and send the result to the browser
     */
    public function rollDice()
    {
        $this->loadDiceRollerState();
        if (!$this->diceRoller->isEmpty()) {
            $result = $this->diceRoller->roll();
            $data['message'] = "Dice result: " . $result . " (" . $this->diceRoller->getResultString() . ")";
            $data['value'] = $result;
            $this->response->setStatusCode(200);
        } else {
            $data['message'] = "Add dice and try to roll again";
            $this->response->setStatusCode(400);
        }
        echo json_encode($data);
    }

    public function resetDice()
    {
        $this->diceRoller = new DiceRoller();
        $this->saveDiceRollerState();
        $this->response->setStatusCode(200);
        echo json_encode(['status' => 'success']);
    }

    /**
     * Checks if the number of sides of the die is valid
     * @param $numberOfDie Number of sides chosen
     * @return bool true if is valid, False otherwise
     */
    private function validateDie($numberOfDie) : bool
    {
        $whiteList = [4, 6, 8, 10, 12, 20];
        return in_array($numberOfDie, $whiteList);
    }

    /**
     * Saves the dice's state into session data
     */
    private function saveDiceRollerState()
    {
        $this->session->set('diceRoller', $this->diceRoller);
    }

    /**
     * Loads the dice's state into session data
     */
    private function loadDiceRollerState()
    {
        $this->diceRoller = $this->session->get('diceRoller');
    }

}
