<?php
namespace Google\Controller;

use Google\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Utility\Xml;


class GeoController extends AppController
{
	/*
    * {@inherit}
    */
    public function initialize()
    {
        parent::initialize();
        $this->autoRender = false;
        $this->response->header('Content-Type', 'application/json');
        header("Access-Control-Allow-Origin: *");
    }

    /*
	$timespan = [
		'year'	=> '2015',
		'month'=> '0',
		'day'	=> '28',
	];
	$path = 'https://www.google.com/maps/timeline/kml?authuser=0&pb=!1m8!1m3!1i'.$timespan['year'].'!2i'.$timespan['month'].'!3i'.$timespan['day'].'!2m3!1i'.$timespan['year'].'!2i'.$timespan['month'].'!3i'.$timespan['day'];
	*/
    public function index()
    {

    	$allDays = array();
    	$days = [1,2,3,4,5,6];
    	foreach ($days as $day) {
    		$path = WWW_ROOT . 'kmls' . DS . $day . '.kml';

    		$allDays[] = $this->extractData($path);
    	}
    	

        $this->response->body(json_encode($allDays));
    }

    public function extractData($path)
    {
    	$xml = Xml::build($path);
    	$kmlArray = Xml::toArray($xml);
    	$placeMarks = $kmlArray['kml']['Document']['Placemark'];
	
    	$collection = new Collection($placeMarks);
    	$collection = $collection->filter(function ($value, $key, $iterator) {
		    return $value['ExtendedData']['Data'][2]['value'] > 0;
		});
		$collection = $collection->extract('ExtendedData');
		$collection = $collection->extract('Data');

		$collection = $collection->map(function($row, $key) {
			$mrow = [ 'category' => $row[1]['value'], 'distance' => $row[2]['value'] ];
			return $mrow;
		});

		

		$collection = $collection->groupBy('category');

		$collection = $collection->map(function($row, $key){
			$row = collection($row)->sumOf('distance');
			return $row;
		});


		return $collection->toArray();
    }
}