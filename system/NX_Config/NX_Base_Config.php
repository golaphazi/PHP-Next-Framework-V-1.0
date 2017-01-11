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
Class NX_BaseConfig Extends NX_QueryConfig{
	private $className, $functionName, $dataTotal, $checkData;
	
	public function session(){
			$action 	= $this->coreFunction('NX_Action');
			return $action;
		}
		
	public function url($array){
		$action 	= $this->coreFunction('NX_Controllers');
		$url		= $action->url();
		if(!empty($array) AND array_key_exists($array,$url)){
			$data		= $array;
		}else{
			$data = '';
		}
		return $data;
	}
		#--------- from ---------#
		public function form($array,$label=""){
			$this->from = $this->coreFunction('form');
			$data = $this->from->input($array,$label);
			return $data;
		}
		#---------- check imjection data start -----------#
		public function check_injection($target) {
			//$constraints = array('|',',','"',"'",'<','>','!^','^','!','$','&','*','#','+','=','|',"%");
			$constraints = array('!^__','mysql_query','mysqli_query');
			for($i=0;$i<sizeof($constraints);$i++) {
				$target = str_replace($constraints[$i],'',$target);
			}
			return $target;
		}
		
		#--------------end check injection data ---------#
		
		#----------------------#
		# Page Redirect Method #
		#----------------------#
		
		
		#### check keycode
		public function keyCheck($data){
			$this->sett = $this->coreFunction('NX_Setting');
			$reslut = $this->sett->check_key_code($data);
			return $reslut;
		}
		
		public function view($pageView, $data=''){
			if(is_array($data)){
				$array = '';
				$dataTotal = '';
				foreach($data AS $key=>$value){
					$$key = $data[$key];
				}
			}else{
				show_massage($data);
			}
			$contentFile 		= $this->app_url.'application/view/'.$pageView.'.php';
			if(file_exists($contentFile)) {
				$fh 			= fopen($contentFile, 'r');
				$contentData 	= fread($fh, filesize($contentFile));
				ftruncate($fh,100);
				fclose($fh);	
				clearstatcache(); 
				include($contentFile);
			} else {
				show_error(''.$this->host().'/application/view/'.$pageView.'.php');
				
			}
		
		}
		#-----------------------#
		# File Extension Method #
		#-----------------------#
		
		
		#---css link function---#
		public function css($link){
			$pageCount = sizeof($link);
			$csss = '';
			for($j=0;$j<$pageCount;$j++){
				$page = $this->app_url.'styles/'.rtrim($link[$j], ".css").'.css';
				if(file_exists($page)){
					$fh 			= fopen($page, 'r');
					ftruncate($fh,100);
					clearstatcache();
					$csss .= '<link rel="stylesheet" type="text/css" href="'.$this->host().'/'.$page.'"/>';
				}else{
					show_error($this->host().'/'.$page);
				}
			}
			
			return $csss;
		}		
		#---css link function stop---# 
		
		#---css link function---#
		public function script($link){
			$pageCount = sizeof($link);
			$script = '';
			for($j=0;$j<$pageCount;$j++){
				$page = $this->app_url.'scripts/'.rtrim($link[$j], ".js").'.js';
				if(file_exists($page)){
					$fh 			= fopen($page, 'r');
					ftruncate($fh,100);
					clearstatcache();
					$script .= '<script type="text/javascript" src="'.$this->host().'/'.$page.'"/></script>';
				}else{
					show_error($this->host().'/'.$page);
				}
			}
			
			return $script;
		}		
		#---css link function stop---# 
		
		#---------- core function link ---------#
		public function load($link){
			$link 	= $this->check_injection($link);
			$type 	= explode("/", $link);
			$count 	= sizeof($type);
			$page 	= $type[$count-1];
			$folder = rtrim($link, $page);
			if(!empty($folder)){
				$folder = ltrim($folder, "/");
			}else{
				$folder ='';
			}
			$pages 	= $this->app_url."application/model/".$folder.$page.".php";
			if(file_exists($pages)){
					$fh 			= fopen($pages, 'r');
					ftruncate($fh,100);
					clearstatcache();
					require_once($pages);
					$class = ucfirst($page);
					if(class_exists($class)){
						return new $class;
					}else{
						show_error('Sorry Not Found "'.$class.'" Class'); 
					}
				
			}else{
			  show_error('Sorry Not Found '.$pages.' page');
			}
				
		}
		
		
		public function library($link){
			$link 	= $this->check_injection($link);
			$type 	= explode("/", $link);
			$count 	= sizeof($type);
			$page 	= $type[$count-1];
			$folder = rtrim($link, $page);
			if(!empty($folder)){
				$folder = ltrim($folder, "/");
			}else{
				$folder ='';
			}
			$pages 	= $this->app_url."system/NX_Library/".$folder.$page.".php";
			if(file_exists($pages)){
					$fh 			= fopen($pages, 'r');
					ftruncate($fh,100);
					clearstatcache();
					require_once($pages);
					$class = ucfirst($page);
					if(class_exists($class)){
						return new $class;
					}else{
						show_error('Sorry Not Found "'.$class.'" Library Class'); 
					}
				
			}else{
			  show_error('Sorry Not Found '.$folder.$page.' Libery Function');
			}
				
		}
		
		public function coreFunction($function){
			$function = ucfirst($function);
			$data = new $function;
		return $data;
		}
		public function get_file_extension($strr)  {
			$nameCon = explode(".", $strr);
			$countImage = sizeof($nameCon);
			$extension = $nameCon[$countImage-1];
			return $extension;
		}
		public function title($value){
			if(strlen($value)>0){
				$title = $this->realData($value);
			}else{
				$title = TITLE;
			}
			$session = $this->session();
			$titled   = $session->setSession($title,'title');
			return $titled;
		}
		public function fevicon($icon){
			if(strlen($icon)>0){
				$title = $this->realData($icon);
			}else{
				$title = SHORTICON;
			}
			$session = $this->session();
			$titled   = $session->setSession($title,'short');
			return $titled;
		}
		public function discription($icon,$type=""){
			if(strlen($icon)>0){
				$this->sett = $this->coreFunction('NX_Setting');
				$title = $this->realData($icon);
				$title  = $this->sett->discriptionData($title,$type);
			}else{
				$title = DISCRIPTION;
			}
			$session = $this->session();
			$titled   = $session->setSession($title,'dis');
			return $titled;
		}
		public function keyword($icon){
			if(strlen($icon)>0){
				$this->sett = $this->coreFunction('setting');
				$title = $this->realData($icon);
			}else{
				$title = DISCRIPTION;
			}
			$session = $this->session();
			$titled   = $session->setSession($title,'keyword');
			return $titled;
		}
	#---------------------- loder 
	public function loader(){
			$dataw = '<img src="'.$this->host().'/images/preloader2.gif" width="60px" height="50px">';
			return $dataw;
		}
	public function lightbox($data){
			$datawl = $this->loader();
			
			$dataw = '
						<div style="position:relative;">
							<div class="overlay" >
								<div class="popup">
									<div class="iconRight"><span onclick="hideLightBox(2);">&#9747</span></div>
									<div class="loderShow">'.$datawl.'</div>
									<div class="dataShow">'.$data.'</div>
							 </div>
							</div>
						</div>
					';
			return $dataw;
		}
	public function BaseConfig() {
			if(DB_STATUS == 'Yes'){			
				$this->connection();
			}
		}
	#------------------ time NX_Setting ----------------------#
	public function getTime(){
		return time();
	}
	public function convertDate($date="",$tpye=""){
		$this->sett = $this->coreFunction('NX_Setting');
		$data		= $this->sett->getDateData($date,$tpye);
		return $data;
	}
	public function createDate($date,$tpye=""){
		$this->sett = $this->coreFunction('NX_Setting');
		$data		= $this->sett->createDateTime($date,$tpye);
		return $data;
	}
	
	public function timeDiff($date,$date2){
		$this->sett = $this->coreFunction('NX_Setting');
		$data		= $this->sett->time_diff($date,$date2);
		return $data;
	}
	
	public function country($type=""){
		$this->sett = $this->coreFunction('NX_Action');
		$data		= $this->sett->country_select($type);
		return $data;
	}
	
	public function getIpAddress(){
		$this->sett = $this->coreFunction('NX_Action');
		$data		= $this->sett->get_ip_address();
		return $data;
	}
	public function mail($to,$subject,$message,$header){
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
		$headers .= $header;
		if(mail($to, $subject, $message, $headers)){
			$mass = 'Mail Sent Successfully';
		}else{
			$mass = 'Mail failed';
		}
		return $mass;
	}
	public function get($name){
		if(isset($_GET[$name])){
			$data = $_GET[$name];
		}else{
			$data = $_GET[$name];
		}
		return $data;
	}
	
	public function post($name){
		if(isset($_POST[$name])){
			$data = $_POST[$name];
		}else{
			$data = $_POST[$name];
		}
		return $data;
	}
	public function request($name){
		if(isset($_REQUEST[$name])){
			$data = $_REQUEST[$name];
		}else{
			$data = $_REQUEST[$name];
		}
		return $data;
	}
	public function server($name){
		if(isset($_SERVER[$name])){
			$data = $_SERVER[$name];
		}else{
			$data = $_SERVER[$name];
		}
		return $data;
	}
	
  }
?>
