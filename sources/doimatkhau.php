<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";

if($_SERVER['HTTP_REFERER']=="https://".$config_url."/changepas.html"){

   $id = $_SESSION['login']['id'];

   if($id!='' && $_SESSION['login']['luxubu']=='luxubu'){
	   
	   global $id,$matkhaucu,$matkhaumoi,$xacnhanmatkhau;	
		//tiếp nhận dữ liệu    	
		$matkhaucu = $_POST['matkhaucu'];
		$matkhaumoi =$_POST['matkhaumoi'];
		$xacnhanmatkhau =$_POST['xacnhanmatkhau'];
		//validate dữ liệu	
		$matkhaucu = trim(strip_tags($matkhaucu));
		$matkhaumoi = trim(strip_tags($matkhaumoi));
		$xacnhanmatkhau = trim(strip_tags($xacnhanmatkhau));
	
    
	if (get_magic_quotes_gpc()==false) {
		
		$matkhaucu = mysql_real_escape_string($matkhaucu);
	    $matkhaumoi = mysql_real_escape_string($matkhaumoi);
		$xacnhanmatkhau = mysql_real_escape_string($xacnhanmatkhau);
	}
	
		if($matkhaucu=="")  transfer("No old password entered!", "changepas.html");
	    if($matkhaumoi=="")  transfer("No new password entered!", "changepas.html");
		if($xacnhanmatkhau!=$matkhaumoi)  transfer("Confirm password mismatch!", "changepas.html");
		
		
		
		$d->reset();
		
		
		$sql="select * from #_product where  id=".$id;		
		$d->query($sql);
		$dmk=$d->fetch_array(); 
		
		if( taomatkhau($matkhaucu) != $dmk['matkhau'])
    		transfer("Old password is incorrect","changepas.html");	
    	
		
		$data['matkhau'] = taomatkhau($matkhaumoi);	
		$data['ngaysua'] = strtotime(date("Y-m-d",time()));
		
		$d->reset();
		$d->setTable('product');
	
					
        $d->setWhere('id',$id);
    	if($d->update($data)){
				
		    unset($_SESSION['login']['id']);
			unset($_SESSION['login']['maso']);
			unset($_SESSION['login']['kichhoat']);
			unset($_SESSION['login']['userx']);
			unset($_SESSION['login']['user']);
			unset($_SESSION['login']['matkhau']);
			unset($_SESSION['login']['hoten']);
			unset($_SESSION['login']['id_list']);
			unset($_SESSION['login']['tiento']);
			unset($_SESSION['login']['vitri']);
			unset($_SESSION['login']['luxubu']);
			unset($_SESSION['login']['goi']);
			unset($_SESSION['login']['hienthi']);
			unset($_SESSION['login']['ngaykichhoat']);	 
    		transfer("Change password successfully!", "login.html");	
		}
    	else
    		transfer("Update failed!", "changepas.html");
			
   }
		
} else { echo "WEBSITE NOT FOUND !"; exit();}		
?>
