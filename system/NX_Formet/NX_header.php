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
 /****Add header function ****/
 
 function get_header(){
	$headerAction			= New NX_Header();
	$header 				= $headerAction->header();
	//$titleM = $base_con->getSession('titleM');	
	//$discritopnM = DISCRIPTION;
	//$discritopnM = $base_con->getSession('disM');
	page_view($header);
 }
 /**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 function get_fotter(){
	$headerAction			= New NX_Header();
	$fotter 		= $headerAction->fotter();
	page_view($fotter);
 }
 /**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
function get_socket(){
	$headerAction			= New NX_Header();
	$fotter 		= $headerAction->socket();
	page_view($fotter);
 } 
 
 /**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
 function page_view($pageView){
	$contentFile 		= 'templates/'.$pageView.'.php';
	if(file_exists($contentFile)) {
		$fh 			= fopen($contentFile, 'r');
		$contentData 	= fread($fh, filesize($contentFile));
		ftruncate($fh,100);
		fclose($fh);	
		clearstatcache(); 
		include($contentFile);
	} else {
		show_error(''.HOST.'/templates/'.$pageView.'.php');
		
	}
 }
 
 /**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
 
function get_title(){
	$base_con				= New NX_Action();
	$title 					= $base_con->getSession('userID2');
	if(strlen($title)>0){
		$title = $title;
	}else{
		$title = TITLE;
	}
	return $title;
}

/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
 
function get_favicon(){
	$base_con				= New NX_Action();
	$shortcutIcon = $base_con->getSession('short');
	if(strlen($shortcutIcon)>0){
		$shortcutIcon = $shortcutIcon;
	}else{
		$shortcutIcon = SHORTICON;
	}
	return $shortcutIcon;
}


/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
 
function get_dis(){
	$base_con				= New NX_Action();
	$discritopn = $base_con->getSession('dis');
	if(strlen($discritopn)>0){
		$discritopn = $discritopn;
		
	}else{
		$discritopn = DISCRIPTION;
		
	}
	return $discritopn;
}
/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
function get_keyword(){
	$base_con				= New NX_Action();
	$keyWord = $base_con->getSession('keyword');
	if(strlen($keyWord)>0){
		$keyWord = $keyWord;			
	}else{
		$keyWord = DISCRIPTION;	
	}
	return $keyWord;
}

/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
 
function get_css(){
	$headerAction			= New NX_Header();
	$css_link 		= $headerAction->linkCss();
	
	return $css_link;
}
/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
function get_script(){
	$headerAction			= New NX_Header();
	$js_link 		= $headerAction->linkJs();
	return $js_link;
}

/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 */
?>