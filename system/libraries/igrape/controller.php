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
 * @subpackage	controller
 * @category	Front-controller
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */
class Controller {

	public $argv = array();
	public $data = array();
	
	public $layout = 'default';
	public $_layout;
	public $action = '';
	public $name = '';

	public function __construct()
    {
    }

	public function missing()
	{
		exit("missing ".$this->action." on controller ".$this->name);
	}

	public function render($_action = null)
	{
		AppController::before();
		if(!$_action)
			$_action = $this->action;

		$_view = APPBASE.'views'.DS.$this->name.DS.$_action.EXT;
		
		if(!is_file($_view))
		{
			$this->action = $_action;
			iGrape::missingView($this);
		}else
		{			
			iGrape::renderFile($_view, $this->layout, $this->data);
		}
		AppController::after();
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function __isset($name)
	{
		return isset($this->data[$name]);
    }
	
	public function __unset($name)
	{
		unset($this->data[$name]);
    }
	
	public function __destruct()
    {
    }

}
?>