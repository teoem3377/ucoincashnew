<?php if(!defined('_source')) die("Error");
  


	 if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){}
	 else
		transfer("You are not logged in", "login.html");
			
			
		function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;	
		}
		
	    $goi = $_POST['goi'];	
		
		$sqly = "SELECT * FROM table_product where maso='".$_SESSION['login']['maso']."' ";
		$d->query($sqly);
		$kqua= $d->fetch_array();
		
		
		
		$file_name=fns_Rand_digit(0,9,12);

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_product_l,$file_name)){
				$datap['photo'] = $photo;				
		}
		$datap['maso'] = $_SESSION['login']['maso'];
		$datap['user'] = $_SESSION['login']['user']; 
		$datap['noidung'] = "Up level for: ".$kqua['user']." - ".$kqua['hoten']."(".$goi."$)"; 
		$datap['user1'] = $kqua['user'];
		$datap['goi'] = $goi;       
		$datap['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
		
		$d->reset();		
		$d->setTable('upbill');
		$d->insert($datap);
		
		transfer("Up level successfully!", "list.html");
		
		
		
	
	
	
	
?>
