<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";


if($_SERVER['HTTP_REFERER']=="http://".$config_url."/information.html"){

	function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;	
		}

	//tiếp nhận dữ liệu

    $id = $_SESSION['login']['id'];

   if($id!=''){
	
				if($_POST['dienthoai']=="")
							transfer("Vui lòng nhập số điện thoại", "information.html");	
				
				if($_POST['cmnd']=="")
							transfer("Vui lòng nhập số CMND", "information.html");
				
				if($_POST['taikhoan']=="")
							transfer("Vui lòng nhập vào số tài khoản ngân hàng", "information.html");
			
				if($_POST['chutaikhoan']=="")
							transfer("Vui lòng nhập chủ tài khoản ngân hàng", "information.html");
							
				if($_POST['chinhanh']=="")
							transfer("Vui lòng nhập vào chi nhánh ngân hàng", "information.html");
			
			   
				  
					$ngaysinh = $_POST['ngaysinh'];
					$gioitinh = $_POST['gioitinh'];		
					$dienthoai =$_POST['dienthoai']; 
					$diachi = $_POST['diachi']; 
					$email = $_POST['email'];		
					$cmnd =  $_POST['cmnd'];
					$taikhoan = $_POST['taikhoan']; 
					$chutaikhoan = $_POST['chutaikhoan'];
					$chinhanh =  $_POST['chinhanh']; 
					
					
					$ngaysinh = trim(strip_tags($ngaysinh));
					$dienthoai = trim(strip_tags($dienthoai)); 
					$diachi = trim(strip_tags($diachi)); 
					$email = trim(strip_tags($email));		
					$cmnd = trim(strip_tags($cmnd));
					$taikhoan = trim(strip_tags($taikhoan));
					$chutaikhoan = trim(strip_tags($chutaikhoan));  
					$chinhanh = trim(strip_tags($chinhanh));  
					
					if (get_magic_quotes_gpc()==false) {
						
						$ngaysinh = mysql_real_escape_string($ngaysinh);
						$dienthoai = mysql_real_escape_string($dienthoai); 
						$diachi = mysql_real_escape_string($diachi); 
						$email = mysql_real_escape_string($email);		
						$cmnd = mysql_real_escape_string($cmnd);
						$taikhoan = mysql_real_escape_string($taikhoan);
						$chutaikhoan = mysql_real_escape_string($chutaikhoan);  
						$chinhanh = mysql_real_escape_string($chinhanh);  
					}
					
			   
				
					$d->reset();
				
					$data['ngaysinh'] = $ngaysinh;
					$data['gioitinh'] = $gioitinh;
					$data['dienthoai'] = $dienthoai; 
					$data['diachi'] = $diachi; 
					$data['email'] = $email;		
					$data['cmnd'] = $cmnd;	
					$data['taikhoan'] = $taikhoan;
					$data['chutaikhoan'] = $chutaikhoan; 
					$data['chinhanh'] =$chinhanh;
					$data['ngaysua'] = strtotime(date("Y-m-d H:i:s",time()));
					$data['nguoisua'] = $_SESSION['login']['maso'];
					
					$d->setTable('product');
					$d->setWhere('id', $id);
					if($d->update($data))
						transfer("Cập nhật thành công!", "information.html");	
					else
						transfer("Cập nhật thất bại!", "information.html");
				
     }
	
	} else { echo "WEBSITE NOT FOUND !"; exit();}	
		
?>
