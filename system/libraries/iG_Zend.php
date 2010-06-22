<?php
class iG_Zend {
	
	/**
	 * Zend Class Loader
	 * @param String $class class name
	 */
	function load($class)
	{
		ini_set('include_path',ini_get('include_path').PATH_SEPARATOR.SYSROOT.'libraries'.PATH_SEPARATOR);
		load($class);
	}
}
?>