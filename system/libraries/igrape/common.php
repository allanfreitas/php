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
 * @subpackage	common
 * @category	Front-controller
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */
function __autoload($class) {
	if(file_exists(LIB.$class.EXT))
	{
		require LIB.$class.EXT;
	}else
	{
		$dir = dir(LIB);
		while (false !== ($entry=$dir->read())) {
			if(($entry!="." && $entry!=".." && $entry!="igrape") && $entry == $class)
			{
				if(file_exists(LIB.$class.DS.$class.EXT))
					require LIB.$class.DS.$class.EXT;
				else
				{
					//$_class = explode(".",$class);
					//require LIB.$_class[0].DS.$_class[1].EXT;
					//if(file_exists(LIB))
				}
			}
		}
		$dir->close();
	}
}

/**
 * Loads a file from system/libraries/
 * @return
 */
function load($class)
{
	static $objects			= array();
	static $_class			= array();
	static $count			= NULL;
	$path					= NULL;
	
	if(isset($objects[$class]))
		return $objects[$class];
	else
		$objects[$class] = $class;
	
	$_class					= explode(".",$class);
	$count					= count($_class)-1;
	foreach($_class AS $n=>$value)
	{
		if($count!=$n)
			$path .= $value.DS;
	}
	if($path)
	{
		if(file_exists(LIB.$path.$_class[$count].EXT))
		{
			include LIB.$path.$_class[$count].EXT;
			if(class_exists($_class[$count]))
				return new $_class[$count];
			else
				return $objects[$class];
		}
		else
			exit("Error load file/class [".$class."], please check documentation.");
	}else
	{
		if(file_exists(LIB.$_class[$count].EXT))
		{
			include LIB.$_class[$count].EXT;
			if(class_exists($_class[$count]))
				return new $_class[$count];
			else
				return $objects[$class];
		}else
			exit("Error load class [".$class."], please check documentation.");
	}
}

/**
 * Loads a element from application/views/_elements/
 * @param Element
 * @param Var constant
 * @param Folder (Path)
 */
function load_element($file,$_this=NULL,$path=NULL)
{
	if(is_file(APPBASE."views".DS."_elements".DS.$path.DS.$file.EXT))
	{
		include APPBASE."views".DS."_elements".DS.$path.DS.$file.EXT;
	}else
	{
		include APPBASE."views".DS."_elements".DS.$file.EXT;
	}
	
	return false;
}

function get_conf()
{
	//static $_conf = array();

	if (!isset($_conf))
	{
		if(!file_exists(CONFBASE.'_conf'.EXT))
		{
			exit("The _conf".EXT." file wasn't found.");
		}
		
		include CONFBASE.'_conf'.EXT;
		
		print_r($_conf);
		if (!isset($conf) OR !is_array($conf))
		{
			exit("You must configure the file _conf".EXT);
		}

		//$_conf[0] =& $config;
	}
	return $_conf;
}
?>