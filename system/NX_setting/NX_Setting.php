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
	
	Class NX_Setting Extends NX_Base{
			
		public function __construct(){
			$this->con	= $this->NX_Base();
		}
	// user agent start
	public function getUserAgent(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
	 return $user_agent;
	}
	
	public function getOS(){ 
			
			$user_agent = $this->getUserAgent();
			$os_platform = "Unknown";

			$os_array = array(
				'/windows nt 6.2/i' => 'Windows 8',
				'/windows nt 6.1/i' => 'Windows 7',
				'/windows nt 6.0/i' => 'Windows Vista',
				'/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
				'/windows nt 5.1/i' => 'Windows XP',
				'/windows xp/i' => 'Windows XP',
				'/windows nt 5.0/i' => 'Windows 2000',
				'/windows me/i' => 'Windows ME',
				'/win98/i' => 'Windows 98',
				'/win95/i' => 'Windows 95',
				'/win16/i' => 'Windows 3.11',
				'/macintosh|mac os x/i' => 'Mac OS X',
				'/mac_powerpc/i' => 'Mac OS 9',
				'/linux/i' => 'Linux',
				'/ubuntu/i' => 'Ubuntu',
				'/iphone/i' => 'iPhone',
				'/ipod/i' => 'iPod',
				'/ipad/i' => 'iPad',
				'/android/i' => 'Android',
				'/blackberry/i' => 'BlackBerry',
				'/webos/i' => 'Mobile'
			);

			foreach($os_array as $regex => $value){ 
				if(preg_match($regex, $user_agent)){
					$os_platform = $value;
				}
			}   
			return $os_platform;
		}

	// end windows
	
	// borswer start
	public function getBrowser(){
			
			$user_agent = $this->getUserAgent();
			$browser = "Unknown";

			$browser_array = array(
				'/msie/i' => 'Internet Explorer',
				'/firefox/i' => 'Firefox',
				'/safari/i' => 'Safari',
				'/chrome/i' => 'Chrome',
				'/opera/i' => 'Opera',
				'/netscape/i' => 'Netscape',
				'/maxthon/i' => 'Maxthon',
				'/konqueror/i' => 'Konqueror',
				'/mobile/i' => 'Handheld Browser'
			);

			foreach ($browser_array as $regex => $value){ 
				if (preg_match($regex, $user_agent)){
					$browser = $value;
				}
			}
			return $browser;
		}

	
	//end borwser
	
	// start link click
		public function link_click($text = ''){
			$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:",$text);
			$sharp = explode("#", $text);
			$click = ' '.$text;
			$click = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>",$click);
			$click = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>",$click);
			$click = preg_replace("#(^|[\n ])((\#)[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"$sharp[1]\" >\\2</a>",$click);
			$click = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>",$click);
			$click = substr($click, 1);
			return $click;
		}
	//end licnk click
	 public function discriptionData($data,$type=""){
		if($type == 1){
			$datad = $this->Data(mb_substr($data, 0, 160, "UTF-8"));
		}else if($type == 0){
			$datad = $this->Data(mb_substr($data, 0, 70, "UTF-8"));
		}else{
			$datad = $this->Data($data);
		}
		return $datad;
	}
	public function Url($str){
		$str = str_replace('&','et',$str);
		if($str !== mb_convert_encoding(mb_convert_encoding($str,'UTF-32','UTF-8'),'UTF-8','UTF-32')){
			$str = mb_convert_encoding($str,'UTF-8');
		}
		$str = $this->keyCheck($str);
		$str = str_replace(" ", "-", $str);
		return strtolower(trim($str,'-'));
	}
	public function Data($str){
		header('content-type: text/html; charset=utf-8');
		$str = str_replace('&','et',$str);
		if($str !== mb_convert_encoding(mb_convert_encoding($str,'UTF-32','UTF-8'),'UTF-8','UTF-32')){
			$str = mb_convert_encoding($str,'UTF-8');
		}
		$str = trim(htmlentities($str, ENT_NOQUOTES ,'UTF-8'));
		return $str;
	}
		//end white spece
		
		
			
		// end date month years
		public function time_diff($dateOld1,$dateNew1) {
					
					$date1=date_create($dateOld1);
					$date2=date_create($dateNew1);
					$diff=date_diff($date1,$date2);
					$diffrentS= $diff->format("%s");
					$diffrentI= $diff->format("%i");
					$diffrentH= $diff->format("%h");
					$diffrentD= $diff->format("%d");
					$diffrentM= $diff->format("%m");
					$diffrentY= $diff->format("%y");
					
					if($diffrentY == 0 && $diffrentM == 0 && $diffrentD ==0 && $diffrentH ==0 && $diffrentI ==0 && $diffrentS <= 60){
					$diffrent = 'just now';
					}else if($diffrentY == 0 && $diffrentM == 0 && $diffrentD ==0 && $diffrentH ==0 ){
						if($diffrentI<2){
							$diffrent = $diffrentI. ' minute ago';
						}else{
							$diffrent = $diffrentI. ' minutes ago';
						}						
					}else if($diffrentY == 0 && $diffrentM == 0 && $diffrentD ==0){
						
						if($diffrentH<2){
							$diffrent = $diffrentH.' hour ago';
						}else{
							$diffrent = $diffrentH.' h :'.$diffrentI.' m ago';
						}
						
					}else if($diffrentY == 0 && $diffrentM == 0){
						if($diffrentD ==1){
							$diffrent = 'yesterday';
						}else if($diffrentD >=2){
							$dateTime = date_create($dateOld1);
							$showTime = date_format($dateTime,"d.D - M h:m:s a");
							$diffrent = $showTime;
						}
						
						if($diffrentD<2){
							$diffrent = $diffrentD.' day ago';
						}else{
							$dateTime = date_create($dateOld1);
							$showTime = date_format($dateTime,"d.D - M h:m:s a");
							$diffrent = $showTime.' ';
						}
						
					}else if($diffrentY == 0 && $diffrentM <= 12){
						
						if($diffrentM<2){
							$dateTime = date_create($dateOld1);
							$showTime = date_format($dateTime,"d.D - M h:m:s a");
							$diffrent = $showTime.' ';
						}else{
							$dateTime = date_create($dateOld1);
							$showTime = date_format($dateTime,"d.D - M h:m:s a");
							$diffrent = $showTime.' ';
						}
						
					}else if($diffrentY >=1 && $diffrentM <= 12){
						$dateTime = date_create($dateOld1);
						$showTime = date_format($dateTime,"d.D - M - Y");
						$diffrent = $showTime.' ';
						
				}
			return $diffrent;
		}
		#------------ time public function --------#
		public function getDateData($date="",$tpye=""){
			if(!empty($tpye)){
				$tpye = $tpye;
			}else{
				$tpye = 'd-M-Y';
			}
			if(!empty($date)){
				$date = strtotime($date);
			}else{
				$date = time();
			}
			$newDate = date("$tpye", $date);
			return $newDate;	
		}
		
		public  function createDateTime($date,$type=""){
			if(!empty($tpye)){
				$tpye = $tpye;
			}else{
				$tpye = 'Y-m-d H:i:s';
			}
			
			return date("$tpye", $date);
		}
		#--------------- end time public function ------------#
	public function check_key_code($target) {
			$target = strtolower($target);
			$constraints = array('|',',','*','"',"'",'<','>','!^','^','!','$','&','*','#','+','=','|',"%",'(',')','{','}','[',']','~','`',';',':','/','?','select','where','delete','update','insert into','order by','limit','mysql_query');
			for($i=0;$i<sizeof($constraints);$i++) {
				$target = str_replace($constraints[$i],'',$target);
			}
			return $target;
		}
	
}

?>