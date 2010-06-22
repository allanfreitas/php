<?php
class RunController extends AppController {
	function __construct()
	{
	}
	function index()
	{
		iG_Zend::load("Zend.Service.Twitter");
		
		$twitter = new Zend_Service_Twitter('avelino0','4v3l1n005');
		$response = $twitter->status->friendsTimeline();
		
		foreach($response AS $key=>$value)
		{
			echo "<p>";
			echo "<b>".$value->user->name."</b> (".$value->user->screen_name.")<br />";
			echo "<b>Msg:</b> ".$value->text;
			echo "</p>";
		}
		
		$this->layout = 'igrape';
	}
	function __destruct()
	{
	}
}
?>