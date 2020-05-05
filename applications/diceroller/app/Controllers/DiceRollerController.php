<?php
namespace App\Controllers;

require_once(__DIR__ . '\\..\\..\\..\\..\\vendor\\autoload.php');

use CodeIgniter\HTTP\RequestInterface;
use phpDocumentor\Reflection\Types\Boolean;
use danielsonsilva\DiceRoller\DiceRoller;

class DiceRollerController extends BaseController
{
    /**
     * @var DiceRoller The dice roller object to roll dice
     */
    private DiceRoller $diceRoller;

	public function index()
	{
	    $this->diceRoller = new DiceRoller();
	    //$this->saveDiceRollerState($this->diceRoller);
		return view('diceroller');
	}

	public function addDice()
    {
        $valueReceived = $this->request->getVar("value");
        $data = [];
        if ($this->validateDie($valueReceived)) {
            $this->response->setStatusCode(200);
            //$this->loadDiceRollerState();
            $this->diceRoller->addDice(1, $valueReceived);
            $data["current_roll"] = strval($this->diceRoller);
            //$this->saveDiceRollerState();
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

    private function validateDie($numberOfDie) : bool
    {
        $whiteList = [4, 6, 8, 10, 12, 20];
        return in_array($numberOfDie, $whiteList);
    }

    private function saveDiceRollerState()
    {
        set_cookie('diceRoller', serialize($this->diceRoller));
    }

    private function loadDiceRollerState(): DiceRoller
    {
        $this->diceRoller = unserialize(get_cookie('diceRoller'));
    }

}
