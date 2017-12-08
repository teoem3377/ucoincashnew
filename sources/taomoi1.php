<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
   include_once _lib."functions.php";
   include_once _lib."class.database.php";
session_start();

   	

	if($_SESSION["ma_cap_chax"]!= $_POST['capcha'])
				transfer("Captcha has been entered!", "create.html");				
	
	/*
	if($_POST['quanly']=="")
				transfer("Chưa nhập người quản lý!", "taonguoichoi.html");*/
	
	if($_POST['hovaten']=="")
				transfer("Full name has been entered!", "create.html");
				
	if($_POST['user']=="")
				transfer("User has been entered!", "create.html");	
													
	if($_POST['matkhau']=="")
				transfer("Password has been entered!", "create.html");		
			
	if($_POST['dienthoai']=="")
				transfer("Phone has been entered!", "create.html");
			
	if($_POST['email']=="")
				transfer("Email has been entered!", "create.html");
				
	
	//if($_POST['bitcoin']=="")
				//transfer("BLOCKCHAIN has been entered!", "create.html");
				
	//if($_POST['chutaikhoan']=="")
				//transfer("Chưa điền chủ tài khoản ngân hàng Vietcombak!", "create.html");
				
	if($_POST['diachi']=="")
				transfer("Address has been entered!", "create.html");
   
	

   function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

	//tiếp nhận dữ liệu

   	//$quanly = $_POST['quanly'];
	//$gioithieu = $_SESSION['login']['maso'];
		
		$id_list = 1;			
		$hovaten = $_POST['hovaten'];	
		$user = $_POST['user'];
		$matkhau = $_POST['matkhau'];	
		$email = $_POST['email'];	
		$dienthoai = $_POST['dienthoai'];
		$quocgia = $_POST['quocgia']; 
		$diachi = $_POST['diachi'];
		$gioithieu = $_POST['gioithieu'];
		$goi = $_POST['goi'];
		$dogecoin = $_POST['dogecoin'];		
		//$bitcoin = $_POST['bitcoin']; 
		//$chutaikhoan = $_POST['chutaikhoan'];
		 
		
				
		//$quanly =  trim(strip_tags($quanly));		
		$hovaten =  trim(strip_tags($hovaten));
		$user = trim(strip_tags($user));
		$matkhau =  trim(strip_tags($matkhau));		
		$email = trim(strip_tags($email));		
		$dienthoai = trim(strip_tags($dienthoai)); 
		$diachi = trim(strip_tags($diachi));
		$dogecoin = trim(strip_tags($dogecoin));		
		//$bitcoin = trim(strip_tags($bitcoin));
		//$chutaikhoan = trim(strip_tags($chutaikhoan));
		
		
		
		if (get_magic_quotes_gpc()==false) {
			//$quanly =  mysql_real_escape_string($quanly);
			
			$hovaten =  mysql_real_escape_string($hovaten);
			$user =  mysql_real_escape_string($user);
			$matkhau =  mysql_real_escape_string($matkhau);	
			$email =  mysql_real_escape_string($email);		
			$dienthoai = mysql_real_escape_string($dienthoai); 
			$diachi = mysql_real_escape_string($diachi);
		    $dogecoin = mysql_real_escape_string($dogecoin);	
			//$bitcoin = mysql_real_escape_string($bitcoin);
			//$chutaikhoan = mysql_real_escape_string($chutaikhoan);
			
			
			  
		}
		
		
		
			$sqlgioithieu= "select maso from table_product where maso='".$gioithieu."'";
			$d->query($sqlgioithieu);		
			$kqgioithieu = $d->fetch_array();		
			if($kqgioithieu['maso']=="")
					transfer("This Link is incorrect. Please enter again!", "index.html");
				
			$sqluser= "select user from table_product where user='".$user."'";
			$d->query($sqluser);		
			$kquser = $d->fetch_array();		
			if($kquser['user']!="")
					transfer("This user already exists. Please enter again!", "create.html");				
					
					
			$sqluser1= "select user from table_product1 where user='".$user."'";
			$d->query($sqluser1);		
			$kquser1 = $d->fetch_array();		
			if($kquser1['user']!="")
					transfer("This user already exists. Please enter again!", "create.html");
				
		
		
		$maso=taoma();
		
		$file_name=fns_Rand_digit(0,9,12);
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_product_l,$file_name)){
				$data['qr'] = $photo;				
		}
		
		$data['gioithieu'] = $gioithieu;
		$data['goi'] = $goi;			
		$data['hoten'] = $hovaten;
		$data['tenkhongdau'] = changeTitle($hovaten);	 
		$data['maso'] =$maso;
		$data['user'] =$user;
		$data['matkhau'] = taomatkhau($matkhau);		
		$data['dienthoai'] = $dienthoai; 
		$data['email'] = $email;			
		$data['taikhoan'] = $taikhoan;
		$data['chutaikhoan'] = $chutaikhoan;
		$data['bitcoin'] = $bitcoin;
		$data['quocgia'] = $quocgia;
		$data['diachi'] = $diachi;
		$data['vi'] = $dogecoin;		
		$data['lencay'] = 0;
		$data['hienthi'] = 0;
		$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
		
		$d->setTable('product1');		
		$d->insert($data);		
		
		 $_SESSION['tao']['goi'] = $goi;
		 $_SESSION['tao']['fullname'] = $hovaten;
		 $_SESSION['tao']['id'] = $maso;
		 $_SESSION['tao']['user'] = $user;
		 $_SESSION['tao']['password'] = $matkhau;
		 $_SESSION['tao']['phone'] = $dienthoai;
		 $_SESSION['tao']['email'] = $email;
		 $_SESSION['tao']['taikhoan'] = $taikhoan;
		 $_SESSION['tao']['chutaikhoan'] = $chutaikhoan;
		 $_SESSION['tao']['bitcoin'] = $bitcoin;
		 $_SESSION['tao']['diachi'] = $diachi;
		 $_SESSION['tao']['quocgia'] = $quocgia;
		 $_SESSION['tao']['vi'] = $dogecoin;
		
			
		   
            transfer("Create ID successfully! After 12h System will be contact", "note.html");
		
	
?>
