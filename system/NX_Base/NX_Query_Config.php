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
Class NX_QueryConfig{
	public $db;
	
	#---------- start table -----------#
	public function tableData($table){
		$tableData = '';
		if(is_array($table) AND !empty($table[0])){
			foreach($table AS $value){
				$tableData .= $value.", ";
			}
			$tableData = rtrim($tableData, ", ");
		}else{
			$tableData = '';
			show_error('From Table ');
		}
		
		return $tableData;
	}
	#----------- Data Query Start ------------#
	#---------- data where check ---------#
	public function whereData($query,$type=''){
			$where = '';
			if($type == ''){
				$queryType = 'WHERE';
			}else{
				$queryType = 'ON';
			}
			if(is_array($query)){
				$where .= $queryType;
					foreach($query as $field=>$value){
						if(is_array($value)){
							$where .=" ".$field." $value[0] $value[1]";
						}else{
							$where .=" ".$field." $value AND";
						}
						
					}
					$where = rtrim($where, 'AND');
					
			}else if(strlen($query)>5){
				$where = ''.$queryType.' '.$query.'';
			}else{
				$where = '';
			}
			//echo $where;exit();
	return $where;
	}

#----- intiger value check -----#
	public function intValue($data,$len){
		if(is_integer($data)){
			$val = number_format($data,$len);
		}else if(floatval($data)){
			$val = number_format($data,$len);
		}else{
			$val = '0';
		}
	return $val;
	}
	#----- intiger value check end-----#
	public function connection(){
		$this->DB_HOST = LOCALHOST;		
		$this->DB_NAME = DB_NAME;
		$this->DB_USER = USER_NAME;
		$this->DB_PASSW = USER_PASSWORD;
		if(strtolower(DB_DRIVER) == "mysql" OR strtolower(DB_DRIVER) == ""){
			$this->DB_LINK = mysql_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSW) or die("ERROR: MYSQL CONNECTION ERROR...");
			mysql_select_db($this->DB_NAME, $this->DB_LINK) or die(mysql_error($this->DB_LINK));
		}else if(strtolower(DB_DRIVER) == "pdo"){
			$GLOBALS = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.'', $this->DB_USER, $this->DB_PASSW);
			return $GLOBALS;
		}else if(strtolower(DB_DRIVER) == "mysqli"){
			$this->DB_LINK = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASSW, $this->DB_NAME);
			if ($this->DB_LINK->connect_error) {
				die($this->DB_LINK->connect_error);
			}
			return $this->DB_LINK;
		}
	}
	
  }
?>