 <?php
	Class Form Extends NX_Base {
		function __construct(){
			$this->con	= $this->NX_Base();
		}
		
		public function input($type,$label){
			$typed = '';
			$div = '';
			$div1 = '';
				foreach($type as $key=>$value){
					
					if($key != 'format' AND $key != 'data'){
						$typed .= $key."="."'$value'";
					}
				}
				
				if($type['format'] == 'input'){
					if($type['data'] !=''){
						$vaData = $type['data'];
					}else{
						$vaData = '';
					}
					$divFor = ''.$vaData.' <'.$type['format'].' '.$typed.'/>';
				}else if($type['format'] == 'form'){
					$divFor = '<'.$type['format'].' '.$typed.'/>';
				}else if($type['format'] == ('textarea' OR 'button')){
					if($type['data'] !=''){
						$vaData = $type['data'];
					}else{
						$vaData = '';
					}
					$divFor = '<'.$type['format'].' '.$typed.'>'.$vaData.'</'.$type['format'].'>';
				}else{
					$divFor ='';
				}
				if(!empty($label) AND is_array($label)){
						foreach($label as $keyl=>$valueL){
							
							$div .= '<'.$keyl.' ';
								foreach($valueL as $keyr=>$valueC){
									if($keyr != 'data' AND $keyr != ''){
										$div1 = $keyr." = "."'$valueC'";
									}
								}
					
							if(!empty($valueL['data'])){
							  $val = $valueL['data'];
							}else{
								$val = '';
							}
							$div .= ''.$div1.'>'.$val.'';
							
						}
						$div .= ''.$divFor.'</'.$keyr.'>';
						
					$data = $div;
				}else{
					$data = $divFor;
				}
			
			
		return $data;
		}
		
	}
	
?>