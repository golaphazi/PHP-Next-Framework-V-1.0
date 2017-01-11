<?php
	class Index Extends NX_Base {
		private $product;
	
		function __construct(){
			$this->con		= $this->NX_Base();
			$this->session 	= $this->session();
		}
		
		
		public function index(){
			$data = array();
			$data['home'] = 'WelCome Next Framework...........';
			
			$this->view('index', $data);
		}
		
	}
?>
