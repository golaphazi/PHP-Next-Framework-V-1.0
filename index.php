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
 * @since	Version 2.0.1
 * @ V2
 */
	if (file_exists('config.php')){
		include('config.php');
	} else {
		echo '<h1 style="color:red; font-size:15px;text-align:center;margin:10% auto; padding:10px; border:1px solid #ccc; background:#eeeeee; border-radius:5px;">config.php is wrong</h1>'; exit();
	}
	
	$body				= '';
	#-------------main body------------------#
	
	$folderData         = '';
	
	
	#-------------- base check for --------------#
	$base = $url_data->base(BASENAME);
	
	#----------- for home page config ---------------#
	if(strlen($base)<1 OR $base == basename(HOMEPAGE,".php")){
		$page 			= rtrim(HOMEPAGE, "/");
		#-------------- check home page select ---------------#
		$page			= $config->check_injection($page);
		
		##-----------page config ------------#
		
		$calss   		= basename($page,".php");
		
		#------------ search page name -----------------#
		$pageInclude 	= strtolower($calss);
		
		#--------------- check found page in location ----------------#
		$body		 	= $config->pageLink($folderData,$pageInclude,$server_location);
		
		#-------------check method name your select method----------------------#
		$calss			= ucfirst($calss);
		
		#----------------- check class and method -----------------#
		$body			= $config->checkFunction($calss,METHOD,$data="");
	
	}else if(strlen($base) > 1 OR !is_file(BASENAME) OR ($base == basename(HOMEPAGE,".php"))){
		$page 				= $base;
		$check				= $config->checkRouter($page);
		//echo $base;
			if($check == 1 AND !is_array($check)){
				
				$page				= $config->page_call($page);
				
				
				$page				= $config->check_injection($page);
				
				
				$page 				= str_replace(BASE, "", $page);
				
				
				$pageR 				= rtrim($page, "/");
				
				
				$pageArray 			= explode("/", $pageR);
				
				/**
				 * Next Framework 
				 * verson V- 2.0.0 or V2
				 * An open source application development framework for PHP
				 *
				 * This content is released under the MIT License (MIT)
				 *
				 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
				 *

				 * @package	Next Framework
				 * @author	EllisLab Dev Team
				 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
				 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
				 * 
				 * @since	Version 2.0.1
				 * @ V2
				 */
					
				$pageCount 			= sizeof($pageArray);
				
				
				for($j=0;$j<$pageCount;$j++){
				
				
				
					if(is_array($pageArray)){
					
					
					
						$countRouter = sizeof($url->router());


						if(in_array($pageArray[$j], $url->router()) AND !is_null($pageArray[$j])){
								$class 		= $pageArray[$j];
								$ext		= $url_data->substr_data($pageArray[$j],$pageR,$class);
								
								$extr 		= str_replace($ext, "", $pageR);
								
								$exte 		= str_replace($class, "", $extr);
								
								$func 		= $struc->get_function_array($ext);
								
								$pageInclude 	= strtolower($class);								
								/**
								 * Next Framework 
								 * verson V- 2.0.0 or V2
								 * An open source application development framework for PHP
								 *
								 * This content is released under the MIT License (MIT)
								 *
								 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
								 *

								 * @package	Next Framework
								 * @author	EllisLab Dev Team
								 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
								 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
								 * 
								 * @since	Version 2.0.1
								 * @ V2
								 */
									
								$body		 	= $config->pageLink($exte,$pageInclude,$server_location);
								$calss 			= ucfirst($class);
								if(is_array($func) AND sizeof($func)>0){
									$function   = $struc->get_function($func);
									$data = '';
																			
									/**
									 * Next Framework 
									 * verson V- 2.0.0 or V2
									 * An open source application development framework for PHP
									 *
									 * This content is released under the MIT License (MIT)
									 *
									 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
									 *

									 * @package	Next Framework
									 * @author	EllisLab Dev Team
									 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
									 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
									 * 
									 * @since	Version 2.0.1
									 * @ V2
									 */
										
									$data = $struc->get_function_data($func);
									
																			
									/**
									 * Next Framework 
									 * verson V- 2.0.0 or V2
									 * An open source application development framework for PHP
									 *
									 * This content is released under the MIT License (MIT)
									 *
									 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
									 *

									 * @package	Next Framework
									 * @author	EllisLab Dev Team
									 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
									 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
									 * 
									 * @since	Version 2.0.1
									 * @ V2
									 */
										
								}else{
									$function 	= METHOD;
									$data     	= '';
								}
								$body			= $config->checkFunction($calss,$function,$data);
								$pageCount = $j;
							}
					
					} 
				}	
						
			/**
			 * Next Framework 
			 * verson V- 2.0.0 or V2
			 * An open source application development framework for PHP
			 *
			 * This content is released under the MIT License (MIT)
			 *
			 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
			 *

			 * @package	Next Framework
			 * @author	EllisLab Dev Team
			 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
			 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
			 * 
			 * @since	Version 2.0.1
			 * @ V2
			 */
				
		}else if($check == 2){
			$body =	show_error('Sorry! Keyword');
		
						
			/**
			 * Next Framework 
			 * verson V- 2.0.0 or V2
			 * An open source application development framework for PHP
			 *
			 * This content is released under the MIT License (MIT)
			 *
			 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
			 *

			 * @package	Next Framework
			 * @author	EllisLab Dev Team
			 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
			 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
			 * 
			 * @since	Version 2.0.1
			 * @ V2
			 */
				
		
		}else if(is_array($check) AND sizeof($check) > 0){
			$exte 			= '';
			if(strlen($check[3]) > 0){
				$exte 			= $check[3]."/";
			}
			$data = $struc->get_function_array($page);
			$pageInclude	= $check[1];
			$body = $config->pageLink($exte,$pageInclude,$server_location);
			$body = $config->userConfig($check,$data);
		/*check */
					
		/**
		 * Next Framework 
		 * verson V- 2.0.0 or V2
		 * An open source application development framework for PHP
		 *
		 * This content is released under the MIT License (MIT)
		 *
		 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
		 *

		 * @package	Next Framework
		 * @author	EllisLab Dev Team
		 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
		 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
		 * 
		 * @since	Version 2.0.1
		 * @ V2
		 */
			
		}else{
			$body =	show_error('Sorry! Keyword');
		}	
	
	
			
		/**
		 * Next Framework 
		 * verson V- 2.0.0 or V2
		 * An open source application development framework for PHP
		 *
		 * This content is released under the MIT License (MIT)
		 *
		 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
		 *

		 * @package	Next Framework
		 * @author	EllisLab Dev Team
		 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
		 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
		 * 
		 * @since	Version 2.0.1
		 * @ V2
		 */
			
	
	}else{
		
		$body = show_error('Sorry! '.HOMEPAGE.' page'); 
	}
		
			
	/**
	 * Next Framework 
	 * verson V- 2.0.0 or V2
	 * An open source application development framework for PHP
	 *
	 * This content is released under the MIT License (MIT)
	 *
	 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
	 *

	 * @package	Next Framework
	 * @author	EllisLab Dev Team
	 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
	 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
	 * 
	 * @since	Version 2.0.1
	 * @ V2
	 */
		
	#-------------- load data --------------------/
	$struc->loadStructure($body, 'y');
		
/**
 * Next Framework 
 * verson V- 2.0.0 or V2
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 *

 * @package	Next Framework
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi(golap.smlmhs.edu.bd)
 * @copyright	Copyright (c) 2015 - 2016, Next IT Solution by Golap Hazi
 * 
 * @since	Version 2.0.1
 * @ V2
 */
	
?>

