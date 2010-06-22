<?php
class ZfflickrController extends AppController {
	
	public $results = array();
	
	function __construct()
	{
	}
	function index()
	{
		iG_Zend::load("Zend.Service.Flickr");
		
		$flickr = new Zend_Service_Flickr('55f19b1be9c7f496fe33b45d1915fa03');
		$this->results = $flickr->tagSearch("PHPSP");
		
		$this->layout = 'igrape';
	}
	function __destruct()
	{
	}
}
?>