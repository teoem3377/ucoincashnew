<?php
	session_start();	
	@define ( '_lib' , './aworld/lib/');

	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	if(isset($_POST['cmnd'])){
	$cmnd = $_POST['cmnd'];
	$cmnd = trim(strip_tags($cmnd));
	if (get_magic_quotes_gpc()==false) {
		$cmnd = mysql_real_escape_string($cmnd);		
	}
	
			// kiem tra ten trung		
		$sqlcmnd44 = "select cmnd from table_product where cmnd='".$cmnd."'";
		$d->query($sqlcmnd44);		
		$cmndz44 = $d->result_array();
		
			if($cmndz44[0]['cmnd']!='')  echo '<p style="color:#f00;margin-top:10px;"><span >Số CMND này đã tồn tại</span></p>';
		
		
	}
			
?>