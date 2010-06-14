<?php
class RunModel extends Model {
	
	private $_db = array();
	private $_ORM = array();
	private $sql = array();
	private $run = array();
	
	function __construct()
	{
		global $conf;
		if(is_file(CONFBASE."_conf".EXT)) include CONFBASE."_conf".EXT;
		if(is_array($conf)) $this->_conf = $conf;
		if(is_array($db)) $this->_db = $db;
		
		$this->_ORM = new orm();
		foreach($this->_db AS $database => $info)
		{
			$this->_ORM->database = $database;
			foreach($info AS $_info => $conn)
			{
				$this->_ORM->$_info = $conn;
			}
		}
	}
	
	public function index()
	{
	}
}
?>