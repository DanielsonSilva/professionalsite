<?php
namespace App\Controllers;

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use danielsonsilva\FindMe\FindMe;

define('DS', DIRECTORY_SEPARATOR);
define('UP', '..');
define('CITYFILE', __DIR__ . DS . UP . DS . UP . DS . UP . DS . UP . DS . UP . DS . 'etc' . DS . 'citiesinformation.csv');

class FindMeController extends BaseController
{

    /**
     * Initiate the application welcome page
     * @return string Index page
     */
	public function index()
	{
	    $citiesAvailable = $this->getCitiesSelect();
	    $configSelect = [
	        'class' => 'fstdropdown-select',
	        'id' => 'citySelectNumber',
	    ];
	    $buttonData = [
	        'content' => 'Confirm',
	        'type' => 'submit',
	        'class' => 'btn btn-primary',
	        'method' => 'post'
	    ];
	    $data = [
	        'cities' => $citiesAvailable['cities'],
	        'configSelect' => $configSelect,
	        'buttonData' => $buttonData
	    ];
		return view('findme', $data);
	}
	
	public function checkResult()
	{
	    $indexCitySelected = $this->request->getVar('citySelect');
	    $data = [
	        'indexCaptured' => $indexCitySelected
	    ];
	    // TODO: https://stackoverflow.com/questions/45116011/generate-a-google-map-link-with-directions-using-latitude-and-longitude
	    // TODO: https://stackoverflow.com/questions/30544268/create-google-maps-links-based-on-coordinates
	    return view('result', $data);
	}
	
	private function getCitiesSelect() : array
	{
	    try {
	        $citiesInformation = [];
	        $options = [];
	        $file = fopen(CITYFILE, "r");
	        while (($content = fgetcsv($file)) !== FALSE) {
	            $citiesInformation[] = $content[0] . ', ' . $content[7] . ', ' . $content[4];
	            $options[] = 'data-tokens="' . $content[0] . '"';
	        }
	        return [
	            'cities' => $citiesInformation,
	            'options' => $options
	        ];
	    } catch (Exception $e) {
	        die($e->getMessage());
	    }
	}
}
