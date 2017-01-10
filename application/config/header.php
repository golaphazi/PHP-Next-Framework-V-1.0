<?php

Class NX_Header Extends NX_Base{
	private $user, $opId;
	function __construct(){
		$this->con		= $this->NX_Base();
		$this->session 	= $this->session();
	}
	#------- Link For Css/----#
	public function linkCss(){
		$link = array('style.css',
						'core/bootstrap.min.css'
					);
		$css = $this->css($link);
	return $css;
	}
	#-------- Link JS file ----#
	public function linkJs(){
		$link = array('core/jquery-1.7.2.min.js',
					   'core/bootstrap.min.js',
					   'core/angular.min.js',
					);
		$js = $this->script($link);
	return $js;
	}
	#------------------start header section -------------#
	public function header(){ 
		$header= 'header';
		return $header;
	}
	#------------------end header section -------------#
	#------------------start fotter section -------------#
	public function fotter(){ 
		$fotter = 'fotter';
	
	return $fotter;
	}
	#------------------end fotter section -------------#
	#-------------- start socket option-------------#
	public function socket(){
		$scoket = '';
	return $scoket;
	}
	#-------------- end socket----------------------#
}
?>