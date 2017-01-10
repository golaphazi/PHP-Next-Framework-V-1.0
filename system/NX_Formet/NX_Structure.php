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
Class NX_Structure Extends NX_Base {
	public function __construct() {
			$this->con		= $this->NX_Base();
		}
	public function loadStructure($body, $isIndex = 0) {
		echo $body;	
	}
	public function get_function($func){
		return $func[0];
	}
	 public function get_function_data($func){
		$data = array();
		for($m=1;$m<sizeof($func);$m++){
				$data[] 	= $func[$m];
			}
		return $data;
	 }
	public function get_function_array($ext){
		$func 		= ltrim($ext,"/");
		$func		= explode("/", $func);
		return $func;
	}
}
?>
