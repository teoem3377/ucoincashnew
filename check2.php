<?php
	session_start();	
	@define ( '_lib' , './aworld/lib/');

	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	if(isset($_POST['email'])){
	$email = $_POST['email'];
	$email = trim(strip_tags($email));
	if (get_magic_quotes_gpc()==false) {
		$email = mysql_real_escape_string($email);		
	}
	
			// kiem tra ten trung		
		$sql = "select email from table_product where email='".$email."'";
		$d->query($sql);		
		$kq = $d->fetch_array();
		
		$sql1 = "select email from table_product1 where email='".$email."'";
		$d->query($sql1);		
		$kq1 = $d->fetch_array();
		
			if($kq['email']!='')  echo 'This email already exists. Please enter again';
			if($kq1['email']!='')  echo 'This email already exists. Please enter again';
		
		
	}
			
?>