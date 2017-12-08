<?php
	session_start();
	
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	
	
	
	if(isset($_GET['pinnhan'])){
		
		$d = new database($config['database']);
		
		$pinnhan = $_GET['pinnhan'];
		$pinnhan = trim(strip_tags($pinnhan));
		if (get_magic_quotes_gpc()==false) {
			$pinnhan = mysql_real_escape_string($pinnhan);		
		}
		
		$sql = "select maso from table_nhan where pinnhan='".$pinnhan."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		echo $ketqua['maso']." - ".get_ten($ketqua['maso']);
		
	}
			
?>