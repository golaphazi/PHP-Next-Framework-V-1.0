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
Class NX_Query Extends NX_QueryConfig{
	
	public function realData($quy){
			if(strtolower(DB_DRIVER) == "mysql" OR strtolower(DB_DRIVER) == ""){
				$query = mysql_real_escape_string($quy);
			}else if(strtolower(strtolower(DB_DRIVER)) == "pdo"){
				$query = $this->connection()->quote($quy);
			}else if(strtolower(strtolower(DB_DRIVER)) == "mysqli"){
				$query = $this->connection()->real_escape_string($quy);
			}

		return $query;
	}
		
	
	#---------- end data where check ------#
	#----------- Query function -----------#
	public function query($quy){
	  if(strtolower(DB_DRIVER) == "mysql" OR strtolower(DB_DRIVER) == ""){
			$query = mysql_query($quy);
		}else if(strtolower(DB_DRIVER) == "pdo"){
			$query = $this->connection()->prepare($quy);
		}else if(strtolower(DB_DRIVER) == "mysqli"){
			$query = $this->connection()->query($quy);
		}

	  return $query;
	}
	#----------- end query funcrtion -------#
	#----------- Query function -----------#
	public function order($quy){
	  $order = 'ORDER BY '.$quy.'';
	return $order;
	}
	public function limit($quy){
	  $limit = 'LIMIT '.$quy.'';
	return $limit;
	}
	#----------- end query funcrtion -------#
	#----------- Data Query Start ------------#
	public function where($table,$query='',$select='',$list=''){
			
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			
						
			/******** select fild  start***********/ 
			$order 	   = '';
			$limit 	   = '';
			if(empty($select)){
				$select = '*';
			}else if(is_array($select) AND sizeof($select) > 0){
				$select = $this->select($select);
			}
			
			/*****  limit or order section start *****/
			
			if(is_array($list)){
				if(strlen($list[0])>2){
					$order = $this->order($list[0]);
				}
				if(strlen($list[1])>2){
					$limit = $this->limit($list[1]);
				}
			}
			/*****  start table select *****/
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else{
				$tableData = $table;
			}
			
		return $this->query("SELECT $select FROM $tableData $where $order $limit");
		}
		
	public function join($table,$query='',$select='',$list=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query,'ON');
			}else if(strlen($query)>5){
				$where = 'ON '.$query.'';
			}else{
				$where = '';
			}
			
			/******** select fild  start***********/ 
			if(empty($select)){
				$select = '*';
			}else if(is_array($select) AND sizeof($select) > 0){
				$select = $this->select($select);
			}
			$join_type = 'INNER';
			$order 	   = '';
			$limit 	   = '';
			$fromTable = '';
			$joinTable = '';
			/******** join type  start***********/ 
			if(is_array($list)){
				if(in_array(strtoupper($list[0]), array('INNER', 'LEFT', 'RIGHT', 'FULL'))){
					if(strtoupper($list[0]) == 'FULL'){
						$join_type = 'FULL OUTER';
					}else{
						$join_type = strtoupper($list[0]);
					}
				}
			   /******** order by and limit start query start***********/ 
				if(strlen($list[1])>2){
					$order = $this->order($list[1]);
				}
				if(strlen($list[1])>2){
					$limit = $this->limit($list[2]);
				}
			}
			/******** two  join  table start***********/
			if(is_array($table) AND sizeof($table) > 1){
				$fromTable = $table[0];
				$joinTable = $table[1];
			}else{
				show_error('Join Table is wrong');
			}
			/******** two  join  table query start***********/
		return $this->query("SELECT $select FROM $fromTable $join_type JOIN $joinTable $where $order $limit");
		}	
	#------------- End Data Query ----------#
	
	#-------------union query---------#
	public function union($table,$comfiled,$query="",$list=''){
			
			$com1 	   = '';
			$order1    = '';
			$limit1    = '';
			$com2 	   = '';			
			$limit2    = '';			
			$order2    = '';			
			$type 	   = 'ALL';
			/******** list and order section start***********/
			if(is_array($list)){
				if($list[0] ==''){
					$type = '';
				}
				if(is_array($list[1])){
					if(strlen($list[1][0])>2){
						$order1 = $this->order($list[1][0]);
					}
					if(strlen($list[2][0])>2){
						$limit1 = $this->limit($list[2][0]);
					}
					if(strlen($list[1][1])>2){
						$order2 = $this->order($list[1][1]);
					}
					if(strlen($list[2][1])>2){
						$limit2 = $this->limit($list[2][1]);
					}
				}
			}
			/******** select field section start***********/
			if(is_array($comfiled)){
				if(sizeof($comfiled[0])>0 AND is_array($comfiled[0])){
					$com1 = $this->select($comfiled[0]);
				}else{
					$com1 = $comfiled[0];
				}
				if(sizeof($comfiled[1])>0 AND is_array($comfiled[0])){
					$com2 = $this->select($comfiled[1]);
				}else{
					$com2 = $comfiled[1];
				}
			}
			/******** two table query section  start***********/
			$where = '';
			$where1 = '';
			if(is_array($query) AND sizeof($query) > 0){
				if(sizeof($query[0])>0 AND is_array($query[0])){
					$where = $this->whereData($query[0]);
				}else if(strlen($query[0])>5){
					$where = 'WHERE '.$query[0].'';
				}
				if(sizeof($query[1])>0 AND is_array($query[1])){
					$where1 = $this->whereData($query[1]);
				}else if(strlen($query[1])>5){
					$where1 = 'WHERE '.$query[1].'';
				}
			}
			/******** two table section  start***********/
			$fromTable = '';
			$joinTable = '';
			if(is_array($table) AND sizeof($table) > 1){
				$fromTable = $table[0];
				$joinTable = $table[1];
			}else{
				show_error('Union Compare Table is wrong');
			}
			/******** first table query  start***********/
			$firstQuery = "SELECT $com1 FROM $fromTable $where $order1 $limit1";
			/******** second table query  start***********/
			$secondQuery = "SELECT $com2 FROM $joinTable $where1 $order2 $limit2";
			//echo "$firstQuery UNION $type $secondQuery";exit();
		return $this->query("$firstQuery UNION $type $secondQuery");
		}
	#------------- End Data Query ----------#
	#-------- row count start---------#
	public function rowCount($query){
		if(!empty($query)){
			if(strtolower(DB_DRIVER) == "mysql" OR strtolower(DB_DRIVER) == ""){
				$data =  mysql_num_rows($query);
			}else if(strtolower(DB_DRIVER) == "pdo"){
				$query->execute(); 
				$data =  $query->rowCount();
			}else if(strtolower(DB_DRIVER) == "mysqli"){
				$data =  $query->num_rows;
			}
		}else{
			$data = 0;
		}
		return $data;
	}
	#------ end row count --------------#
	#------- Data fetch ---------#
	public function fetch($query){
			$data = array();
			if(!empty($query)){
				if(strtolower(DB_DRIVER) == "mysql" OR strtolower(DB_DRIVER) == ""){
					//$data =  mysql_fetch_array($query);
					while($data[] = mysql_fetch_array($query)){
					}
				}else if(strtolower(DB_DRIVER) == "pdo"){
					$query->execute();
					while($data[] = $query->fetch()){
					}
				}else if(strtolower(DB_DRIVER) == "mysqli"){
					while($data[] = $query->fetch_assoc()){
					}
				}
			}else{
				$data = '';
			}
			
		return $data;
		
	}
	#---------- data fetch end------#
	#-------------- data count -------#
		public function count($table,$filed,$query=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT COUNT($filed) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#---------- end data count -------------#
	#----------- stsrt data sum -------#
		public function sum($table,$filed,$query=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT SUM($filed) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#----------- end data sum ----------#
	
	#----------- stsrt data max -------#
		public function max($table,$filed,$query=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT MAX($filed) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#----------- end data max ----------#
	#----------- stsrt data min -------#
		public function min($table,$filed,$query=""){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT MIN($filed) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#----------- end data min ----------#
	#----------- stsrt data min -------#
		public function round($table,$filed,$query=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT ROUND($filed,20) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#----------- end data min ----------#
	#----------- stsrt data min -------#
		public function avg($table,$filed,$query=''){
			/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				$tableData = $this->tableData($table);
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
			$count = $this->query("SELECT AVG($filed) AS total_count FROM $tableData $where");
			$countData = $this->fetch($count);
			$result = $countData['total_count'];
		return $result;
		}
	#----------- end data min ----------#
	#---------- data insert ----------#
		public function insert($table,$data){
			$insert = '';
			$insert1 = '';
			if(is_array($data)){
				$insert .= '(';
				$insert1 .= 'VALUES(';
					$query = $this->realData($data);
					foreach($query as $field=>$value){
						$insert .=''.$field.',';
						$insert1 .='"'.$value.'",';
					}
					$insert = rtrim($insert, ',');
					$insert1 = rtrim($insert1, ',');
					$insert .= ')';
					$insert1 .= ')';
			 return $this->query("INSERT INTO $table $insert $insert1");;
			}else{
				return false;
			}
			
		}
	#---------- data insert end---------#
	#----------------- update Data ---------#
	 public function update($table,$data,$query=''){
		/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			$set = '';
			if(is_array($data)){
				$set .= 'SET ';
					$query = $this->realData($data);
					foreach($query as $field=>$value){
						$set .=' '.$field.' = "'.$value.'",';
					}
					$set = rtrim($set, ',');
			}else{
				$set = '';
			}
			/*****  start table select *****/
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				show_error('Table format is wrong for this update');
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
		return $this->query("UPDATE $tableData $set $where");
	}
	#----- update data end ---------#
	#----------------- delete Data ---------#
	public function delete($table,$query=''){
		/****query section start **********/
			if(is_array($query) AND sizeof($query)>0){
				$where = $this->whereData($query);
			}else if(strlen($query)>5){
				$where = 'WHERE '.$query.'';
			}else{
				$where = '';
			}
			
			$tableData = '';
			if(is_array($table) AND sizeof($table)>0){
				show_error('Table format is wrong for this Delete');
			}else if(strlen($table)>1){
				$tableData = $table;
			}else{
				show_error('Table is wrong');
			}
		return $this->query("DELETE FROM $tableData $where");
	}
	#----- delete data end ---------#
	public function select($selected){
		$select = '';
		if(is_array($selected) AND !empty($selected[0])){
			foreach($selected AS $value){
				$select .= $value.", ";
			}
			$select = rtrim($select, ", ");
			return $select;
		}else{
			return '*';
		}
	}	
	public function from($selected){
		return $this->tableData($selected);
	}
	
  }
?>