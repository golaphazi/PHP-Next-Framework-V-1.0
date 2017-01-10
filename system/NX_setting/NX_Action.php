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
		
	
	Class NX_Action Extends NX_Base {
		function __construct(){
			$this->con	= $this->NX_Base();
		}
		
		###### start country detials
		public function iptocountry($ip) {
			$numbers = preg_split( "/\./", $ip);
			include("ip_files/".$numbers[0].".php");
			$code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
			foreach($ranges as $key => $value){
				if($key<=$code){
					if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
					}
			}
			if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
			return $two_letter_country_code;
		}
		
		public function get_ip_address(){
			 if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}else{
					$ip = $_SERVER['REMOTE_ADDR'];
				}
			return $ip;
		}
		
		public function country_select($type=""){
			$IPaddress= $this->get_ip_address();
			$idCOunt1 = strlen($IPaddress);
			
			if($idCOunt1>11 AND $_SERVER['HTTP_HOST'] != ' localhost'){
				$two_letter_country_code= $this->iptocountry($IPaddress);
			 }else{
				$two_letter_country_code= $this->iptocountry("173.208.123.220");
			 }
			include("ip_files/countries.php");
			$three_letter_country_code=$countries[$two_letter_country_code][0];
			$country_name=$countries[$two_letter_country_code][1];
			$host = $this->host();
			$file_to_check="flags/$two_letter_country_code.gif";
			if (file_exists($file_to_check)){
				$flag = '<img src="'.$host.'/'.$file_to_check.'" width="30px" height="15px" title="'.$country_name.'" alt="'.$country_name.'"> &nbsp';
			}else{
				$flag = '<img src="'.$host.'/flags/noflag.gif" width="30px" height="15px"> &nbsp ';
			}
			
			if($type == 'name'){
				return $country_name;
			}else if($type == 'code'){
				return $two_letter_country_code;
			}else if($type == 'code_three'){
				return $three_letter_country_code;
			}else if($type == 'flag'){
				return $flag;
			}else if($type == 'fevicon'){
				return ''.$host.'/'.$file_to_check.'';
			}else if($type == 'fc'){
				$all = ''.$flag.' '.$country_name.'';
				return $all;
			}else if($type == 'fcode'){
				$all = ''.$flag.' '.$two_letter_country_code.'';
				return $all;
			}else if($type == 'fcodethree'){
				$all = ''.$flag.' '.$three_letter_country_code.'';
				return $all;
			}else{
				$all = ''.$flag.' '.$three_letter_country_code.' '.$country_name.'';
				return $all;
			}
			
		}
		
		#####end country detials
		
		#############3 start page information
		
		public function pageDirection($opID = ""){
			$page = PHPSELF;
			$pageInfoShow = '';
			$pageInfo = '';
			$pageInfo .= '<li><a href="'.$this->host().'/">&#8687 Home</a></li>';
			
			$page 			= ltrim($page, BASE);
			$page 			= rtrim($page, "/");
			$page 			= explode("/", $page);
			$pageCount 		= count($page);
			if(intval($page[$pageCount-1])){	
				$pageCount = $pageCount-1;
			}else{
				$pageCount = $pageCount;
			}
			for($j=1;$j<$pageCount;$j++){
				$pageInclude= '';
				
				for($i=0;$i<$j;$i++){
					$pageInclude 	.= strtolower($page[$i+1])."/";
				}
				
				$pageInfo .= '<li><a href="'.$this->host().'/'.$pageInclude.'">&#8680; '.ucfirst($page[$j]).' </a></li>';
			}
			
				$pageInfoShow = '<div class="box">
							  <ul class="pageInfo">
							  '.$pageInfo.'
							  </ul>
							</div>
							  ';
							
		return $pageInfoShow;
		}
		########### end page information
		#--------- set session data---------#
		public function setSession($data,$name){
		  $_SESSION[$name] = $data;
		}
		public function unsetSession($name){
		  unset($_SESSION[$name]);
		}
		public function getSession($name){
		  if(isset($_SESSION[$name])) {
				$opId 				= $_SESSION[$name];
			}else{
				$opId = '';
			}
		 return $opId; 
		}
		public function sessionDestroy(){
		  session_destroy();
		}
		#-------- end set session data ------#
		#------------- cookie set -----------#
		public function setCookie($file,$name,$time=""){
			if(!empty($time)){
				$time = ($time);
			}else{
				$time = (86400 * 30);
			}
			setcookie($name,$file, time() + $time, "/");
		}
		public function getCookie($name){
			if(isset($_COOKIE[$name])){
				$lang = $_COOKIE[$name];
			}else{
				$lang = ''; 
			}
			return $lang;
		}
		#--------- end set cookie ------------#
		#----------------- login option start --------------#
		public function login($tabe,$filed,$query){
			$logina 	= $this->where($tabe,$query);
			$row 		= $this->rowCount($logina);
			$datas		= $this->fetch($logina);
			if($row>0){
				if(!empty($filed) AND sizeof($filed)>0){
					foreach($filed AS $key=>$value){						
						$dataf = @$this->setSession($datas[$key],$value);
					}	
				}
				$data = 1;
			}else{
				$data = 0;
			}
		 return $data;
		}
		#----------------- login option end --------------#
		#------------- logout data ------------------------#
		public function logout(){
			$data = $this->sessionDestroy();
			return $data;
		}
	}
	
?>