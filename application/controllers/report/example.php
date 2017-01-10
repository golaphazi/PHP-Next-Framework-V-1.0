<?php
	class Example Extends NX_Base {
		private $product, $report, $action, $action1;
		
		function __construct(){
			$this->con		= $this->NX_Base();
			
		}
		
		public function index(){
			//$data = array();
			$datas 		= $this->view('index');
			$table 		= 'se_product';
			$status 	= 'Phone';
			$query1 	= array("se_product.productName =" => $status, "se_product.productCata =" => "se_catagory.catID");
			$query 		= array("productName =" => $status, "productCata =" => "14");
			//$jion 		= $this->joinWhere($table,$query1);
			$where 		= $this->where($table,$query);
			$row 		= $this->row($where);
			if($row>0){
				while($res = mysql_fetch_array($where)){
					  $resData = $res['productName'];
				}
			}else{
				
			}
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
		function home($dataa){
			$datas = '<h1>Welcome Next Framework e</h1>';
		parse_str($dataa,$myArray);
		
		return $datas;
		}
		
		function golapsd($dataa){
			parse_str($dataa,$myArray);
		return $myArray['data1'];
		}
	}
?>