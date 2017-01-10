<?php
Class NX_Url Extends NX_Config{
	public $className, $functionName, $dataTotal, $checkData;
	
	
	function base($apge){
		$page = $this->check_injection($apge);
		$page = str_replace(BASE, "", $page);
		$page = ltrim($page, "/");
		$page = rtrim($page, "/");
	return $page;
	}
	function substr_data($pageArray,$pageR,$class){
			$countShar 	= strlen($pageArray);
			$salash 	= str_replace($class, "!^__", $pageR);
			$i			= strcspn($salash,"!^__",0,1000);
			$l 			= strlen($pageR)-$i;
			$ext 		= substr($pageR,$i+$countShar,$l);
	return $ext;
	}
	
	
  }
?>