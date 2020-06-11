<?php
namespace App\Controllers;

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use danielsonsilva\FindMe\FindMe;

class FindMeController extends BaseController
{

    /**
     * Initiate the application welcome page
     * @return string Index page
     */
	public function index()
	{
		return view('findme');
	}
}
