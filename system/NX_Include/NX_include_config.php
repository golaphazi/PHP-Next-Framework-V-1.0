<?php
	
	/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Next Framework
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 * 
 * @since	Version 2.0.0
 * @ V2
 */
	define("APP_URL", $server_location);
	
	
	#### Base Config ------------------>
	/*applicatin config file added
	this file is constant value pass
	*/
	if (file_exists($server_location.'application/config/constants.php')){
		get_content_refrash($server_location.'application/config/constants.php');
		require($server_location.'application/config/constants.php');
	} else {
		show_error($server_location.'application/config/constants.php');
	}
	
	
	/*NX_Core cnstant file  added
	this file is constant value pass
	*/
	
	if (file_exists($server_location.'system/NX_Core/NX_Constants.php')){
		get_content_refrash($server_location.'system/NX_Core/NX_Constants.php');
		require($server_location.'system/NX_Core/NX_Constants.php');
	} else {
		show_error($server_location.'system/NX_Core/NX_Constants.php');
	}

	#------------------Framework Config Page ------------#
	if (file_exists($server_location.'system/NX_Base/NX_Query_Config.php')){
		get_content_refrash($server_location.'system/NX_Base/NX_Query_Config.php');
		require($server_location.'system/NX_Base/NX_Query_Config.php');
	} else {
		show_error($server_location.'system/NX_Base/NX_Query_Config.php');
	}
	#------------------Framework Config Page ------------#
	if (file_exists($server_location.'system/NX_Config/NX_Base_Config.php')){
		get_content_refrash($server_location.'system/NX_Config/NX_Base_Config.php');
		require($server_location.'system/NX_Config/NX_Base_Config.php');
	} else {
		show_error($server_location.'system/NX_Config/NX_Base_Config.php');
	}
	
	if (file_exists($server_location.'system/NX_Base/NX_Base.php')){
		get_content_refrash($server_location.'system/NX_Base/NX_Base.php');
		require($server_location.'system/NX_Base/NX_Base.php');
	} else {
		show_error($server_location.'system/NX_Base/NX_Base.php');
	}
	
	if (file_exists($server_location.'system/NX_Base/NX_Query.php')){
		get_content_refrash($server_location.'system/NX_Base/NX_Query.php');
		require($server_location.'system/NX_Base/NX_Query.php');
	} else {
		show_error($server_location.'system/NX_Base/NX_Query.php');
	}

	#------------------Framework Config Page ------------#
	if (file_exists($server_location.'system/NX_Config/NX_Configaration.php')){
		get_content_refrash($server_location.'system/NX_Config/NX_Configaration.php');
		require($server_location.'system/NX_Config/NX_Configaration.php');
	} else {
		show_error($server_location.'system/NX_Config/NX_Configaration.php');
	}
	/*NX_Core base file  added
	*/
	
	#---------------- Framework Structure Formet ------------->
	
	if (file_exists($server_location.'system/NX_Formet/NX_Structure.php')){
		get_content_refrash($server_location.'system/NX_Formet/NX_Structure.php');
		require($server_location.'system/NX_Formet/NX_Structure.php');
	} else {
		show_error($server_location.'system/NX_Formet/NX_Structure.php');
	}

	
	
	
	#----------Set Language ----------------#
	if (file_exists($server_location.'system/NX_Library/NX_Languages.php')){
		get_content_refrash($server_location.'system/NX_Library/NX_Languages.php');
		require($server_location.'system/NX_Library/NX_Languages.php');
	} else {
		show_error($server_location.'system/NX_Library/NX_Languages.php');
	}
	#----------------- Action Page -------------#

	if (file_exists($server_location.'system/NX_setting/NX_Action.php')){
		require($server_location.'system/NX_setting/NX_Action.php');
	} else {
		show_error($server_location.'system/NX_setting/NX_Action.php');
	}

	#------------Setting For Framework --------------#
	if (file_exists($server_location.'system/NX_setting/NX_Setting.php')){
		get_content_refrash($server_location.'system/NX_setting/NX_Setting.php');
		require($server_location.'system/NX_setting/NX_Setting.php');
	} else {
		show_error($server_location.'system/NX_setting/NX_Setting.php');
	}
	
	#-----------Form Layout Page-------------------#
	
	
   /*library file add*/
	if (file_exists($server_location.'system/NX_Library/NX_Form.php')){
		get_content_refrash($server_location.'system/NX_Library/NX_Form.php');
		require($server_location.'system/NX_Library/NX_Form.php');
	} else {
		show_error($server_location.'system/NX_Library/NX_Form.php');
	}
	#-------------Url Page-----------------#
	if (file_exists($server_location.'system/NX_Core/NX_Url.php')){
		get_content_refrash($server_location.'system/NX_Core/NX_Url.php');
		require($server_location.'system/NX_Core/NX_Url.php');
	} else {
		show_error($server_location.'system/NX_Core/NX_Url.php');
	}
	#-------------- Database Config -----------------------#

	if (file_exists($server_location.'application/config/config.php')){
		get_content_refrash($server_location.'application/config/config.php');
		require($server_location.'application/config/config.php');
	} else {
		show_error($server_location.'application/config/config.php');
	}
	#---------------------Header Config------------------------#

	if (file_exists($server_location.'application/config/header.php')){
		get_content_refrash($server_location.'application/config/header.php');
		require($server_location.'application/config/header.php');
	} else {
		show_error($server_location.'application/config/header.php');
	}
	
	#---------------- Framework Structure Formet ------------->
	
	if (file_exists($server_location.'system/NX_Formet/NX_header.php')){
		get_content_refrash($server_location.'system/NX_Formet/NX_header.php');
		require($server_location.'system/NX_Formet/NX_header.php');
	} else {
		show_error($server_location.'system/NX_Formet/NX_header.php');
	}

	
	/*#------------- main file include --------------#*/
	if (file_exists($server_location.'system/NX_Include/NX_Class_include.php')){
		get_content_refrash($server_location.'system/NX_Include/NX_Class_include.php');
		require($server_location.'system/NX_Include/NX_Class_include.php');
	} else {
		show_error($server_location.'system/NX_Include/NX_Class_include.php');
	}
	
?>

