<?php if(!defined('_source')) die("Error");
  


	 if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){}
	 else
		transfer("You are not logged in", "login.html");
			
     if($_POST['quanly']=="")
				transfer("User manage has been entered!", "list.html");
	

	
	$id_user = $_POST['id_user'];
		
		if($id_user!=""){			
			
			    function fns_Rand_digit($min,$max,$num)
				{
					$result='';
					for($i=0;$i<$num;$i++){
						$result.=rand($min,$max);
					}
					return $result;	
				}
				
				$quanly = $_POST['quanly'];
								
				$quanly =  trim(strip_tags($quanly));		
				
				if (get_magic_quotes_gpc()==false) {
					$quanly =  mysql_real_escape_string($quanly);			
				}
				
				$ql=explode("-",$quanly);
				$quanly=$ql[0];
				
				$sqlkiemtra = "select maso from table_product where user='".$quanly."'";
				$d->query($sqlkiemtra);		
				$kiemtraqly = $d->fetch_array();		
				if($kiemtraqly['maso']=='')
					transfer("Manager is not right!", "list.html");
					
				$sqlqly = "SELECT * FROM table_product where user='".$quanly."' ";
				$d->query($sqlqly);
				$kq_qly= $d->fetch_array();
					
					
				$sqlkiemtra1 = "select count(id) as soluong from table_product where quanly='".$kq_qly['maso']."'";
				$d->query($sqlkiemtra1);		
				$kiemtraqly1 = $d->fetch_array();		
				if($kiemtraqly1['soluong']>1)
					transfer("This manager has 2 people!", "list.html");	
			   
				
				$sql_sp = "SELECT * FROM table_product1 where id='".$id_user."' ";
				$d->query($sql_sp);
				$kq_sp= $d->fetch_array();
				
				$data['id_list'] = 1;
				$data['goi'] = $kq_sp['goi'];
				$data['gioithieu'] = $kq_sp['gioithieu'];
				$data['quanly'] = $kiemtraqly['maso'];
				$data['user'] = $kq_sp['user'];		
				$data['hoten'] = $kq_sp['hoten'];
				$data['tenkhongdau'] = $kq_sp['tenkhongdau'];
				$data['maso'] = $kq_sp['maso'];
				$data['matkhau'] = $kq_sp['matkhau'];		 			 
				$data['dienthoai'] = $kq_sp['dienthoai'];
				$data['email'] = $kq_sp['email'];
				$data['quocgia'] = $kq_sp['quocgia'];
				$data['diachi'] = $kq_sp['diachi'];
				$data['vi'] = $kq_sp['vi'];
				$data['qr'] = $kq_sp['qr'];
				$data['hienthi'] = 0;
				$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));				
				$d->setTable('product');
				$d->insert($data);
				
				
				$sqlUPDATE = "UPDATE table_product1 SET hienthi =1  WHERE  id = ".$id_user."";
				$resultUPDATE = mysql_query($sqlUPDATE) or die("Not query sqlUPDATE");
				
				
				
				$file_name=fns_Rand_digit(0,9,12);
	
			    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_product_l,$file_name)){
						$datap['photo'] = $photo;				
				}
				$datap['maso'] = $_SESSION['login']['maso'];
				$datap['user'] = $_SESSION['login']['user']; 
				$datap['noidung'] = "Active for: ".$kq_sp['user']." - ".$kq_sp['hoten']."(".$kq_sp['goi']."$)"; 
				$datap['user1'] = $kq_sp['user'];       
				$datap['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
				
				$d->reset();		
				$d->setTable('upbill');
				$d->insert($datap);
				
				transfer("Up bill successfully!", "list.html");
				
				
		}else {
				transfer("Up bill fail!", "list.html");
		}
	
	
	
	
?>
