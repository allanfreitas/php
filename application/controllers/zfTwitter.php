<?php
class ZftwitterController extends AppController {
	
	public $response = array();
	
	function __construct()
	{
	}
	function index()
	{
		iG_Zend::load("Zend.Service.Twitter");
		
		$twitter = new Zend_Service_Twitter('avelino0','');
		$this->response = $twitter->status->friendsTimeline();
		
		$this->layout = 'igrape';
	}
	function __destruct()
	{
	}
}
?>