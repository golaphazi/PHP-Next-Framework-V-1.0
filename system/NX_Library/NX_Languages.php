<?php

// Copyright Sokial
// Created by Emmanuel Glajean
// Last Modification => 17.11.13
// Version 2.1.6
Class Language{
		
	  function langPage(){
		
			//header("Cache-Control: no-cache");

				$default_lang = 'en';
				$dir_lang = './languages/';
				$extension = '.php';

				$langues = array('bzh','fr','en','es','de','hi','pt','cn','ru','id','ar','bn');
				$lang = '';

				if(isset($_GET['lang']) && in_array($_GET['lang'],$langues)){
					$lang = $_GET['lang'];
				}

				else if(isset($_COOKIE['lang']) && in_array($_COOKIE['lang'],$langues)){
					$lang = $_COOKIE['lang'];
				}

				if(!empty($lang)){
					setcookie('lang',$lang);
				}

				include($dir_lang.$default_lang.$extension);

				if(!empty($lang) && $lang != $default_lang && is_file($dir_lang.$lang.$extension)){
					include($dir_lang.$lang.$extension);
				}
				//$arry=array("fg","gh","hj");

			 return $arry;
			}
	}

?>