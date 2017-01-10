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
Class NX_Config Extends NX_Base{
	public $className, $functionName, $dataTotal, $checkData;
	
	public function __construct(){
		$this->NX_Base();
		$this->url = $this->coreFunction('NX_Controllers');
		
	}
	
	#----------------- check page url--------------------#
	public function pageLink($folder,$pageInclude,$server_location){
		if(strlen($folder)>0 and !is_null($folder)){
			$folder = ltrim($folder,"/");
		}else{
			$folder = "";
		}
		$page = $server_location."application/controllers/".$folder."".$pageInclude.".php";

		if(file_exists($page)){
			$fh 			= fopen($page, 'r');
			ftruncate($fh,100);
			clearstatcache();
			require_once($page);
		}else{
			show_error('Sorry Not Found '.$page.'');
		}
		
	}
	
	
	public function check_injection($target) {
			//$constraints = array('|',',','*',' ','"',"'",'<','>','!^','^','!','$','&','*','#','+','=','|',"%",'(',')','{','}','[',']','~','`',';',':','select','where','delete','update','insert into','order by','limit','mysql_query');
			$constraints = array('!^__','mysql_query','mysqli_query');
			for($i=0;$i<sizeof($constraints);$i++) {
				$target = str_replace($constraints[$i],'',$target);
			}
			return $target;
		}
	public function page_call($data){
			$deifne				= $this->url->url();
			$page				= $this->check_injection($data);
			$pageTotal 			= str_replace(BASE."/index.php/", "", $data);
			$pageR 				= rtrim($pageTotal, "/");
			$pageArray			= explode("/",$pageR);
			$pageCount			= sizeof($pageArray);
			for($i=0;$i<$pageCount;$i++){
				if(array_key_exists($pageArray[$i],$deifne) AND !is_null($deifne)){
					$key = $pageArray[$i];
					$dataS = $deifne[$key];
					$dataS 	= rtrim($dataS, "/");
				}
			}
			
			if(!empty($dataS) AND array_key_exists($key,$deifne)){
				$dataSyd = ltrim($pageR, $key);
				if(!empty($dataSyd)){
					$dataSyd = $dataSyd."/";					
				}else{
					$dataSyd = '';
				}
				$datav	= $dataS.$dataSyd;				
			}else{
				$datav = BASENAME;
			}
			
	   return $datav;
	  }
  
	  public function checkFunction($calss,$function,$data){
		$this->className 	= $calss;
		$this->functionName = $function;
		$this->dataTotal 	= '';
		if(is_array($data)){
			$this->dataTotal = $data;
		}else{
			$this->dataTotal 	= $data;
		}
		//echo $this->dataTotal;exit();
		if(class_exists($this->className)){
			if(method_exists($this->className,$this->functionName)){
				$action 		= New $this->className();
				$body 			= $action->$function($this->dataTotal);
			}else{
				$body = show_error('Sorry Not Found "'.$this->functionName.'" Method'); 
			}
		
		}else{
			$body = show_error('Sorry Not Found "'.$this->className.'" Class'); 
		}
	  
	  return $body;
	  }
	  public function checkUrl($pageArray){
		$pageCount 			= sizeof($pageArray);
		$router 			= $this->url->router();
		$mass = 0;
		for($j=0;$j<$pageCount;$j++){
			if(is_array($pageArray)){
				if(in_array($pageArray[$j], $router) AND !is_null($pageArray[$j])){
					$mass = 1;
				}
			}
		}
		return $mass;
	  }
	  public function checkRouter($data){
		$router 			= $this->url->router();
		$url 				= $this->url->url();
		$page				= $this->check_injection($data);
		$pageR 				= rtrim($page, "/");
		$pageArray 			= explode("/", $pageR);
		$pageCount 			= sizeof($pageArray);
		//echo $page;
		if($pageCount > 0){
				
				if($this->checkUrl($pageArray) == 1 OR(array_key_exists($pageArray[0],$url) AND !is_null($url))){
					$pageCount = 1;
				}else{
					$geturl 			= $this->url->create_url();
					if(is_array($geturl) AND strtolower(DB_CREATE) == strtolower('Yes')){
						$I = 0;
						foreach($geturl as $key=>$value){
							$pageCount ='';
							$table				= array($key);
							$query 				= array(''.$key.'.'.$value[0].' =' => $pageArray[0]);
							$where				= $this->db->where($table,$query);
							$fetch 				= $this->db->fetch($where);							
							if($this->db->rowCount($where) == 1){
								$pageCount = $value;	
							}else{
								$pageCount = 2;
							}
							
						}
						
					}else{
						$pageCount = 1;
					}
					
					
				}
		}else{
			$pageCount = 1;
		}
		return $pageCount;
	  }
	  public function userConfig($check,$data){
		$this->checkData = $data;
		$calss = $check[1];
		$function = $check[2];
		$body = $this->checkFunction($calss,$function,$this->checkData);
	  return $body;
	  }
  }
?>