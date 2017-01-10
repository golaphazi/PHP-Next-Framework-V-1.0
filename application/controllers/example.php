<?php
	class Example Extends NX_Base {
		private $product, $report, $action, $action1;
		
		function __construct(){
			$this->con		= $this->NX_Base();
			
		}
		
		public function index(){
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
			
			/*union data*/
			$query1 = array('p_status =' => "'Active'");
			$query2 = array('userID !=' => "''");
			$order = array('userID DESC', 'userID DESC');
			$limit = array('0,20', '0,20');
			//$where = $this->db->union($table,array(array('userID','p_email_address'),array('userID','s_email_veri')),array($query1,$query2),array('','',''));
			$where = $this->db->union($table,array('userID','s_email_veri'),array($query1,$query2),array('',$order,$limit));
			$fetch = $this->db->fetch($where);
			//print_r($fetch);exit();
			foreach($fetch as $key=>$value){
				echo $value['userID']."<br/>";
			}
			///////////old
			$filed = 'productID';
			$fr			= $this->product->data('golap dvd vfv ddfd');
			$countData 	= $this->count($table,$filed,$query);
			$sumData 	= $this->sum($table,$filed,$query);
			$maxData 	= $this->max($table,$filed,$query);
			$minData 	= $this->min($table,$filed,$query);
			$roundData 	= $this->round($table,$filed,$query);
			$avgData 	= $this->avg($table,$filed,$query);
			$data		= array("productBrand" => "Nokia", "productStatus" => 'Publish');
			$update     = $this->update($table,$data,$query);
			$delete     = $this->delete($table,$query);
			$insert	  	= $this->insert($table,$data);
			
			$con 		= $this->action1->country_select('');
			$time		= $this->action->getTime();
			$date		= $this->action->getDateData('20-10-2014','D-M-Y');
			$datec		= $this->action->createDateTime($time);
			$datec2		= $this->action->createDateTime('1462315700');
			$dated		= $this->action->time_diff($datec2,$datec);
			$fff		= $this->action->getOS();
			$fff		= $this->action->getBrowser();
			
			$file       = $this->getFileExtension('golap.mostafa.jpg');
			
			$inVa       	= $this->intValue('10000','1');
			
			//////// injection chec
			$target	= 'dfjh"dsj"dfjjdj#,.dfj^! jfjf';
			$dataIn = $this->check_injection($target);
			
			
			$setSesion  	= $this->session->setSession($file,'userID2');
			$unsetSesion  	= $this->session->unsetSession('userID2');
			$opId 			= $this->session->getSession('userID2');
			$opId 			= $this->session->sessionDestroy();
			$setCiki		= $this->session->setCookieData('amar nam golap mostafa tumi kotahi aso akhon bolo kothai asao tui dhkjhj','userIDC','10');
			$getCiki		= $this->session->getCookie('userIDC');
			$datas 			= str_replace('<!--%[HOME_PAGE]%-->',$dataIn,$datas);
			
			
			$email  = $this->form(
									array(
											'format'=>'input',
											'type'=>'text',
											'name'=>'email',
											'id'=>'emailAddress',
											'value'=>'',
											'class'=>'form-control placeholder-no-fix',
											'ng-model'=>'user.email',
											'placeholder'=>'name@example.com',
											'autofocus' => 'autofocus',
											'required' => 'required',
											'data'=>''
									)
								);
			$input1  = $this->form(
									array(
											'format'=>'input',
											'type'=>'text',
											'name'=>'frist',
											'id'=>'fristname',
											'value'=>'',
											'ng-model'=>'user.frist',
											'class'=>'form-control',
											'placeholder'=>'Frist Name',
											'autofocus' => 'autofocus',
											'required' => 'required',
											'data'=>''
									)
								);
			$input2  = $this->form(
									array(
											'format'=>'input',
											'type'=>'text',
											'name'=>'last',
											'id'=>'lastname',
											'value'=>'',
											'class'=>'form-control',
											'ng-model'=>'user.last',
											'placeholder'=>'Last Name',
											'autofocus' => 'autofocus',
											'required' => 'required',
											'data'=>''
									)
								);
			$pass  = $this->form(
									array(
											'format'=>'input',
											'type'=>'password',
											'name'=>'password',
											'id'=>'password',
											'class'=>'form-control placeholder-no-fix',
											'placeholder'=>'Enter Password',
											'ng-model'=>'user.password',
											'autofocus' => 'autofocus',
											'required' => 'required',
											'data'=>''
									)
								);
			$passcon  = $this->form(
									array(
											'format'=>'input',
											'type'=>'password',
											'name'=>'confirm',
											'id'=>'conpassword',
											'class'=>'form-control placeholder-no-fix',
											'placeholder'=>'Confim Password',
											'ng-model'=>'user.confirm',
											'autofocus' => 'autofocus',
											'required' => 'required',
											'data'=>''
									)
								);
			$form = $this->form(
									array(
											'format'=>'form',
											'name'=>'userForm',
											'id'=>'submit',
											'class'=>'formAction',
											'ng-submit' => 'submitForm()'
											
									)
								);
			
			$button = $this->form(
									array(
											'format'=>'button',
											'name'=>'form',
											'id'=>'form',
											'type'=>'submit',
											'class'=>'btn btn-primary pull-left  btn-sl submit',
											'data'=>'&#9873 Sign Up'
									)
								);
			
			$buttonRese = $this->form(
									array(
											'format'=>'button',
											'name'=>'form',
											'id'=>'form',
											'type'=>'reset',
											'ng-click'=>'reset()',
											'class'=>'btn btn-default pull-right',
											'data'=>'&#9747 Reset'
									)
								);
			
		return $datas;
		}
		function golaps($dataa){
			$datas = '<h1>Welcome Next Framework e</h1>';
		return $datas;
		
		}
		
		function golapsd($dataa){
			parse_str($dataa,$myArray);
		return $myArray['data1'];
		}
	}
?>