<?php
namespace App\Controllers;

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use danielsonsilva\FindMe\FindMe;
use Vectorface\Whip\Whip;

define('DS', DIRECTORY_SEPARATOR);
define('UP', '..');
define('PATHETC', __DIR__ . DS . UP . DS . UP . DS . UP . DS . UP . DS . UP . DS . 'etc' . DS);
define('CITYFILE', PATHETC . 'citiesinformation.csv');
define('PROPERTYFILE', PATHETC . 'properties.xml');

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
	    $latlon = $this->getLatLongCity($indexCitySelected);
	    $data = [
	        'indexCaptured' => $indexCitySelected
	    ];

	    $findMe = new FindMe($this->getApiId());
	    $clientAddress = $this->request->getIPAddress();
	    $findMe->setInformationFromIp($clientAddress);

	    $googleMapsLink = 'https://www.google.com/maps/dir/?api=1&origin=%s,%s&destination=%s,%s';
	    $googleMapsLink = sprintf($googleMapsLink, $findMe->getLatitude(), $findMe->getLongitude(), $latlon['lat'], $latlon['lon']);
	    $data = [
	        'distance' => $findMe->getDistanceTo($latlon['lat'], $latlon['lon']),
	        'distanceHav' => $findMe->getDistanceToHaversine($latlon['lat'], $latlon['lon'])/1000,
	        'distanceVic' => $findMe->getDistanceToVicenty($latlon['lat'], $latlon['lon'])/1000,
	        'googleMapsLink' => $googleMapsLink
	    ];
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
	
	private function getLatLongCity($index)
	{
	    try {
	        $citiesInformation = [];
	        $options = [];
	        $file = fopen(CITYFILE, "r");
	        $result = [];
	        $count = 0;
	        while (($content = fgetcsv($file)) !== FALSE) {
	            if ($count == $index) {
	                $result = [
	                    'lat' => $content[2],
	                    'lon' => $content[3]
	                ];
	                break;
	            }
	            $count++;
	        }
	        return $result;
	    } catch (Exception $e) {
	        die($e->getMessage());
	    }
	}
	
	private function getApiId()
	{
	    if (file_exists(PROPERTYFILE)) {
	        $xml = simplexml_load_file(PROPERTYFILE);
	    }
	    return $xml->property[0]->id;
	}
	
}
