<?php
	session_start();
	
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	
	
	
	if(isset($_GET['pincho'])){
		
		$d = new database($config['database']);
		
		$pincho = $_GET['pincho'];
		$pincho = trim(strip_tags($pincho));
		if (get_magic_quotes_gpc()==false) {
			$pincho = mysql_real_escape_string($pincho);		
		}
		
		$sql = "select maso from table_cho where pincho='".$pincho."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		echo $ketqua['maso']." - ".get_ten($ketqua['maso']);
		
	}
			
?>