<?php
Class NX_Controllers{
	#---------------- use database ----------------------#
	
	#-------------- if you want contoller please add contoller name.......------------#
	#------------- report and mostafa is contoller name.............-------------------#
	public function router(){
		$router = array('example', 'golap');
	return $router;
	}
	# if you want sort url . so follow this array.........
	# array('test'=>'text/home/golap'); 
	# text -> is sort url
	# and text/home/golap -> is full url
	public function url(){
		$deifne = array(
						'homew'=>'/report/golap/',
						'home1'=>'tts/ff/reportr/',
					
					);
	return $deifne;
	}
	
	/*how to create url Example: www.domain.com/username 
	1. username match to be database table filed
	2. selected your table name...... 
	3. and select your filed name
	
	*/
	
	public function create_url(){
		/*$geturl = array('table name' => array('filed name','controller','method','folder name'),);*/
		$geturl = array(
							's_people' => array('p_login_id','Golap','name','report'),
							
						);
		return $geturl;
	}
}
?>