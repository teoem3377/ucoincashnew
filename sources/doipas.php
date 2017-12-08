<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";

if($_SERVER['HTTP_REFERER']=="http://".$config_url."/doipas.html"){

   $id = $_SESSION['login']['id'];

   if($id!='' && $_SESSION['login']['luxubu']=='luxubu'){
	   
	   global $id,$matkhaucu,$matkhaumoi,$xacnhanmatkhau;	
		//tiếp nhận dữ liệu    	
		$nguoinhan = $_POST['nguoinhan'];
		$matkhau =$_POST['matkhau'];
		
		//validate dữ liệu	
		$nguoinhan = trim(strip_tags($nguoinhan));
		$matkhau = trim(strip_tags($matkhau));
		
    
	if (get_magic_quotes_gpc()==false) {
		
		$nguoinhan = mysql_real_escape_string($nguoinhan);
	    $matkhau = mysql_real_escape_string($matkhau);
		
	}
	
		if($nguoinhan=="")  transfer("Chưa nhập mã số người cần đổi!", "doipas.html");
	    if($matkhau=="")  transfer("Chưa nhập mật khẩu mới!", "doipas.html");
		
		
		$gt=explode("-",$nguoinhan);	
		$nguoinhan = $gt[0];
		
		$sqlnguoinhan = "select maso from table_product where  maso='".$nguoinhan."'";
		$d->query($sqlnguoinhan);		
		$sqlnguoinhan = $d->fetch_array();		
		if($sqlnguoinhan['maso']=="")
				transfer("Mã số của người cần đổi không tồn tại", "doipas.html");
		
		
		$matkhaumoi = taomatkhau($matkhau);	
		
		$sql = "UPDATE table_product SET matkhau ='".$matkhaumoi."' WHERE  maso='".$nguoinhan."'";
		$d->query($sql);		
      	 
       transfer("Đổi mật khẩu thành công!", "doipas.html");	
		
			
   }
		
} else { echo "WEBSITE NOT FOUND !"; exit();}		
?>
