<?php
	session_start();	
	@define ( '_lib' , './aworld/lib/');

	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	if(isset($_POST['user'])){
	$user = $_POST['user'];
	
	$tenkhongdau= changeTitle1($_POST['user']);
	$user = trim(strip_tags($user));
	if (get_magic_quotes_gpc()==false) {
		$user = mysql_real_escape_string($user);		
	}
	
		
			// kiem tra ten trung		
			$sql = "select user from table_product where user='".$user."'";
			$d->query($sql);		
			$kq = $d->fetch_array();
			
			$sql1 = "select user from table_product1 where user='".$user."'";
			$d->query($sql1);		
			$kq1 = $d->fetch_array();
			
				if($kq['user']!='')  echo 'This user already exists. Please enter again';
				if($kq1['user']!='')  echo 'This user already exists. Please enter again';
				if($user != $tenkhongdau) echo 'User must write without spaces, without accents';
				
		
		
		
	}
			
?>