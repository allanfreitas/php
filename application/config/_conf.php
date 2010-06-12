<?php
/**
 * iGrape Framework
 *
 * @category	iGrape
 * @author		iGrape Dev Team
 * @copyright	Copyright (c) 2007-2010 iGrape Inc. (http://www.igrape.org)
 * @license		/LICENSE.txt New BSD License
 * @version		$Id: _conf.php 10096 2010-03-08 14:05:09Z $
 *
 * ---------------------------------------------------------------
 *
 * System Front Controller
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @subpackage	conf
 * @category	Front-controller
 * @author		iGrape Dev Team
 * @link		http://code.google.com/p/igrape/wiki/UserGuide
 */

	/**
	* ---------------------------------------------------------------
	*	Variables global application
	* ---------------------------------------------------------------
	*/
	$conf['base_url'] 			= "http://localhost/igrape";
	$conf['index_controllers']	= "run";
	$conf['index_function']		= "index";
	$conf['index_page']			= $conf['index_controllers'].DS.$conf['index_function'];
	$conf['language']			= "english";
	$conf['lang'] 				= "en";
	$conf['charset'] 			= "UTF-8";
	$conf['time_now']			= date("H:i:s");
	$conf['date_now']			= date("Y-m-d");
	$conf['d_all_now']			= $conf['date_now']." ".$conf['time_now'];
	
	/**
	* ---------------------------------------------------------------
	*	Functions CLEAN
	* ---------------------------------------------------------------
	*/
	$conf['ig_functions'] 	= TRUE;
	
	include CONFBASE."database".EXT;
?>