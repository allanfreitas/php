<?php
/**
 * iGrape Framework
 *
 * @category	iGrape
 * @author		iGrape Dev Team
 * @copyright	Copyright (c) 2007-2010 Chierry Inc. (http://www.igrape.org)
 * @license		/LICENSE.txt New BSD License
 * @version		0.1
 *
 * ---------------------------------------------------------------
 *
 * System Front Controller
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @subpackage	orm
 * @category	ORM
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/avelino/igrape/user-guide
 */
class orm_core {
	
	public $table = array();
	public $field = array();
	
	public function setTable($table)
	{
		$this->table = $table;
	}
	public function getTable()
	{
		return $this->table;
	}
	
	public function getMap()
	{
		return $this;
	}
	
	public function addField($field,$type,$lenght,$attr)
	{
		$this->field[$field]['field'] = $field;
		$this->field[$field]['type'] = $type;
		$this->field[$field]['lenght'] = $lenght;
		$this->field[$field]['attr'] = $attr;
		
		return toConvert($this->field,"obj");
	}
}
?>