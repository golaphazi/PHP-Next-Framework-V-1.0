<?php
/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solutions by Golap Hazi - golaphazi@gmail.com
 * skype and facebook: golap.hazi
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
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solutions by Golap Hazi - golaphazi@gmail.com
 * skype and facebook: golap.hazi(golap.smlmhs.edu.bd)
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solutions by Golap Hazi - golaphazi@gmail.com
 * skype and facebook: golap.hazi
 * 
 * @since	Version 2.0.0
 * @ V2
 */
	session_start();
	$server_location	= "";
	/*#------------- main file include --------------#*/
	if (file_exists($server_location.'system/NX_Include/NX_include_config.php')){
		get_content_refrash($server_location.'system/NX_Include/NX_include_config.php');
		require($server_location.'system/NX_Include/NX_include_config.php');
	} else {
		show_error($server_location.'system/NX_Include/NX_include_config.php');
	}
	
	
	
	$loginMsg 		= '';
	
	function show_error($mass){
		if (file_exists($mass)){
			$fh 			= fopen($mass, 'r');
			$contentData 	= fread($fh, filesize($mass));
			ftruncate($fh,100);
			fclose($fh);	
			clearstatcache();
		} 
		echo '<h1 style="color:red; font-size:15px;text-align:center;margin:10% auto; padding:10px; border:1px solid #ccc; background:#eeeeee; border-radius:5px;"> '.$mass.' is wrong</h1>';		   
		die();
		
	}
	/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solutions by Golap Hazi - golaphazi@gmail.com
 * skype and facebook: golap.hazi
 */
	function show_massage($mass){
		echo '<h1 style="width:100%;margin:10% auto; padding:10px; border:1px solid #ccc; background:#eeeeee; border-radius:5px;"> '.$mass.'</h1>';		   
		
	}
	/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solutions by Golap Hazi - golaphazi@gmail.com
 * skype and facebook: golap.hazi
 */
 
 function get_content_refrash($content){
	if (file_exists($content)){
			$fh 			= fopen($content, 'r');
			$contentData 	= fread($fh, filesize($content));
			ftruncate($fh,100);
			fclose($fh);	
			clearstatcache();
			return $content;
		} 
 }
	
date_default_timezone_get();
?>