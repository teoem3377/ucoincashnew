<?php
	session_start();	
	@define ( '_lib' , './aworld/lib/');

	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	if(isset($_POST['user'])){
	$user = $_POST['user'];
	$user = trim(strip_tags($user));
	if (get_magic_quotes_gpc()==false) {
		$user = mysql_real_escape_string($user);		
	}
	
			// kiem tra ten trung		
		$sql = "select user from table_product where user='".$user."'";
		$d->query($sql);		
		$kq = $d->fetch_array();
		
			if($kq[0]['user']!='')  echo 'This user already exists. Please enter again';
		
		
	}
			
?>