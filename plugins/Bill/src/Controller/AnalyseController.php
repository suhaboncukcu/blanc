<?php
namespace Bill\Controller;

use Google\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Utility\Xml;


class AnalyseController extends AppController
{
	/*
    * {@inherit}
    */
    public function initialize()
    {
        parent::initialize();
        $this->autoRender = false;
        $this->response->header('Content-Type', 'application/json');
    }

    public function index()
    {
    	$path = WWW_ROOT . 'bills' . DS . '3.JPG';


        $apikey = 'aeb2d411a988957';

        $url = 'https://api.ocr.space/parse/image';


        $post = [
            'apikey' => $apikey,
            'language' => 'dut', 
            'isOverlayRequired' => 'true',
            'file' => new \CurlFile( $path )
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

       

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response



        $this->response->body($response);
    }
}