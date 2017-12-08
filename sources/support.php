<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
   include_once _lib."functions.php";
   include_once _lib."class.database.php";
session_start();

    if($_SESSION['login']['user']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){}
	else
		transfer("You are not Log-in", "account/sign-in.html");
	
	if($_POST['tieude']=="")
				transfer("Title has been entered!", "Home/new-ticket.html");
				
	if($_POST['noidung']=="")
				transfer("Content has been entered!", "Home/new-ticket.html");	
													
	

   			
		$tieude = $_POST['tieude'];	
		$noidung = $_POST['noidung'];					
			
		$tieude =  trim(strip_tags($tieude));
		$noidung = trim(strip_tags($noidung));				
			
		
		if (get_magic_quotes_gpc()==false) {			
			
			$tieude =  mysql_real_escape_string($tieude);
			$noidung =  mysql_real_escape_string($noidung);					
			  
		}		
			
		$data['user'] = $_SESSION['login']['user'];	
		$data['tieude'] = $tieude;
		$data['noidung'] = $noidung;				
		$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
		$d->setTable('support');
		$d->insert($data);
		
		transfer("Send support successfully!", "Home/support-ticket.html");
		
	
?>
