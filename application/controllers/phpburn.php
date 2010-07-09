<?php
class PhpburnController extends AppController {
	
	public $test = array();
	
	function __construct()
	{
	}
	function index()
	{
		$this->test = new Test();
		$this->test->find();
		$this->layout = 'igrape';
	}
	function save()
	{
		$this->test = new Test();
		$this->test->nome2 = "Avelino_".rand(100, 200);
		$this->test->save();
	}
	function __destruct()
	{
	}
}
?>