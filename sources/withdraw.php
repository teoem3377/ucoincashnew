<?php

    if(!defined('_source')) die("Error");
    include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
      
		
	if($_SESSION['login']['maso']!='' &&  $_SESSION['login']['luxubu']=='luxubu' &&  $_SESSION['login']['goi']>20){
				
			if($_SESSION["ma_cap_chax"]!= $_POST['capcha'])
				transfer("Captcha has been entered!", "withdraw.html");	
				
				
				 function fns_Rand_digit($min,$max,$num)
				{
					$result='';
					for($i=0;$i<$num;$i++){
						$result.=rand($min,$max);
					}
					return $result;	
				}
				
				$sotien = $_POST['sotien'];
				$vi = $_POST['vi'];
				
				$sotien =  trim(strip_tags($sotien));
				$vi =  trim(strip_tags($vi));
					
				$sotien =  mysql_real_escape_string($sotien);
				$vi =  mysql_real_escape_string($vi);
				  			
				$bonusconlai=0;
						
				$bonusconlai = bonusconlai($_SESSION['login']['maso']);
						
				if($bonusconlai<=0) $bonusconlai=0;
				
				if( is_numeric($sotien) ){}
				else
				transfer("The withdrawal amount must be numeric!", "withdraw.html");
				
				
				if( $sotien <2 )
				transfer("The withdrawal amount must be greater than 2$", "withdraw.html");
				
				if( $sotien  > $bonusconlai)
				transfer("Not enough bonus to withdraw!", "withdraw.html");
				
				if( $vi=='')
				transfer("Please enter your blockchain!", "withdraw.html");
				
				//if( $taikhoan!='' && $chutaikhoan=='')
				//transfer("Please enter  Vietcombank account name!", "withdraw.html");
				
				$file_name=fns_Rand_digit(0,9,12);
	
			    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_product_l,$file_name)){
						$data['maqr'] = $photo;				
				}
				
				$data['maso'] = $_SESSION['login']['maso'];
				$data['user'] = $_SESSION['login']['user'];
				$data['sotien'] = $sotien;
				$data['vi'] = $vi;
				$data['loai'] = 1;				
				$data['lydo'] = 'Withdrawn';
				$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
				
				
				$d->setTable('rutbonus');
				
				$d->insert($data);	
				
				
					
				transfer("Withdrawal bonus successfully!", "bonus.html");	
		}
		
?>