<?php 
/**
 * iGrape Framework
 *
 * @category	iGrape
 * @author		iGrape Dev Team
 * @copyright	Copyright (c) 2007-2010 iGrape Framework. (http://www.igrape.org)
 * @license		LICENSE New BSD License
 * @version		0.2.1
 *
 * ---------------------------------------------------------------
 *
 * System Front Controller
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @category	isgd
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */

class isgd { 
	
	public $url_long, $url_short, $error, $error_msg = NULL;
	private $curl;
	
	public function __construct()
	{
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
	}
	
	public function encode($url)
	{
		$urlCode = rawurlencode($url);
		$urlApi = 'http://is.gd/api.php?longurl='.$urlCode;
		curl_setopt($this->curl, CURLOPT_URL, $urlApi);
		$return = curl_exec($this->curl);
		$data = curl_getinfo($this->curl);
		
		if ($data['http_code'] == 200 && strlen($return) < 20)
		{
			$this->error = false;
			$this->error_msg = NULL;
			$this->url_short = $return;
		}else
		{
			$this->error = true;
			$this->error_msg = $return;
			$this->url_short = NULL;
		}
		
		$this->url_long = $url;
		
		return $this->error;
	}
	
	public function decode($url)
	{
		if (substr($url, 0, 13) == 'http://is.gd/' || substr($url, 0, 6) == 'is.gd/')
		{
			curl_setopt($this->curl, CURLOPT_URL, $url);
			curl_exec($this->curl);
			$data = curl_getinfo($this->curl);
			if ($data['http_code'] == 200 && $url != $data['url'])
			{
				return $data['url'];
			}
		}
		return false;
	}
}
?>