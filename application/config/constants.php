<?php
#------------------
# Define Constants
#------------------
#------------- server setup 
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
define("LOCALHOST","localhost");
define("USER_NAME","root");
define("USER_PASSWORD","");
define("DB_NAME","");

#--------- use database status-------------#

define("DB_STATUS","No");  // Yes/No  ******* use database......

#-----------use create url compare with database table . ..... plase sattus "Yes" and selected your table and filed to config.php page - function create_url();
define("DB_CREATE","No");  // Yes/No

#---------- sql formet ----------------# 
/* Example : mysql , mysqli, pdo ------sql format*/
define("DB_DRIVER", "pdo");

#--------- server setup
#add base url folder ## example www.domine.com/folder then index.php show
define("BASE",""); 
#------------- Base Url


#--------- host URL
#-----------------
# 
#-----------------

#-----------------
# STATUS 

#-----------------
# PAGES
#-----------------
define("HOMEPAGE","index.php");  //////////// show function home page
#-----------------
#----------------defult method show in contoller ---------#
define("METHOD","index");
# 


#-----------------
define("MAXFILESIZE",1000000);
#-----------------
# LIMIT
#-----------------
#------------------

########### site title/short icon/
define("TITLE","Next Framework");
define("SHORTICON","images/logo.png"); ////// define folder name 
define("DISCRIPTION","Next Framework is very essy . so use every one");


#------------ Body css option start-------------#
define("WIDTH","100%");
define("HEIGHT","auto");
define("margin","auto");
#----------- body css option end ---------------#
?>

