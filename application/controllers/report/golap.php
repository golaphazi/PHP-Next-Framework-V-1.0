<?php
	Class Golap Extends NX_Base {
		private $product, $report, $action, $action1, $input, $user, $loginData;
		function __construct(){
			$this->con		= $this->NX_Base();
			$this->session 	= $this->session();
		}
		
		public function index(){
		$datas = 'dfdf';
		
		return $datas;
		}
		
		function name($dataa){
			//print_r($dataa);
			$datas = '<h1>Welcome Next Framework name</h1>';
		return $datas;
		
		}
		
		function name1($dataa){
			$table = array('s_people','s_system');
			$data = 'golap.hazi';
			//$select = $this->db->select(array('s_people.p_email_address','s_people.p_last_name'));
			$select = array('s_people.p_email_address','s_people.p_last_name');
			$from   = $this->db->from($table);
			$query = 's_people.userID = s_system.userID';
			//$query = array('s_people.p_status =' => "'Active'", 's_people.userID =' => 's_system.userID');
			//$query = array('s_people.userID =' => array('s_system.userID', 'AND'));
			$whete = $this->db->where($table,$query,$select,array('s_system.userID DESC','0,20'));
			//$whete = $this->db->join($table,$query,$select,array('left','s_system.userID DESC','0,10'));
			$fetch = $this->db->fetch($whete);
			$row = $this->db->rowCount($whete);
			//echo $row;exit();
			
			////// union query
			//$query1 = array('p_status =' => "'Active'");
			$query1 = 'p_status = "Active"';
			//$query2 = array('userID !=' => "''");
			$query2 = 'userID != ""';
			$order = array('userID DESC', 'userID DESC');
			$limit = array('0,20', '0,20');
			$where = $this->db->union($table,array(array('userID','p_email_address'),array('userID','s_email_veri')),array($query1,$query2),array('','',''));
			//$fetch = $this->db->fetch($where);
			//print_r($fetch);exit();
			foreach($fetch as $key=>$value){
				echo $value['p_email_address']."<br/>";
			}
			$data1 = array();
			$data1['home'] = 'test home';
			
		}
	}
?>