<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";

		    unset($_SESSION['login']['id']);			
			unset($_SESSION['login']['user']);
				
		
	transfer("Sign out successfully!", "index.html");


?>