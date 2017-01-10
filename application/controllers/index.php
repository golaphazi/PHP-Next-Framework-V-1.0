<?php
	class Index Extends NX_Base {
		private $product, $report, $action, $action1, $input, $user;
	
		function __construct(){
			$this->con		= $this->NX_Base();
			$this->session 	= $this->session();
		}
		
		
		public function index(){
			$this->session->setSession('H0w are u','userID2');
			$data = array();
			$data['home'] = 'golap hazi';
			$data['home1'] = 'golap hazi home';
			$data['home2'] = 'golap hazi home mostafa mia golap ';
			$data['array'] = array('golap', 'mostafa', 'hazi');
			$this->view('index', $data);
		}
		function golap(){
			$data = 'report golap';
		return $data;
		}
	}
?>