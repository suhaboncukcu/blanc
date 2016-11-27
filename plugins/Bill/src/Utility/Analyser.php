<?php  
namespace Bill\Utility;

use Cake\Core\Configure;

/**
* 
*/
class Analyser
{
	public $path = '';


	function __construct($path)
	{
		$this->path = $path;
	}

	public function analyse()
	{
		$path = WWW_ROOT . $this->path;

        $apikey = Configure::read('Bill.ocr.key');
        $url = Configure::read('Bill.ocr.url');

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
        $response = curl_exec($ch);

        return $response;
	}
}