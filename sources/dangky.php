<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


global $tendangnhap,$matkhau,$xacnhanmatkhau,$gioitinh,$hovaten,$sodienthoai,$didong,$email,$diachi,$tencongty,$dienthoaicongty,$fax,$emailcongty,$website,$cmnd,$yahoo,$skype,$diachicongty,$gioithieu,$linhvuc,$dongy;	
	//tiếp nhận dữ liệu

	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = $_POST['matkhau'];
	$xacnhanmatkhau = $_POST['xacnhanmatkhau'];
	$gioitinh = $_POST['gioitinh'];	
	$hovaten = $_POST['hovaten'];
	$sodienthoai = $_POST['sodienthoai'];	
	$email = $_POST['email'];
	$diachi = $_POST['diachi'];	
	
	$cmnd = $_POST['cmnd'];	
	$yahoo = $_POST['yahoo'];
	$skype = $_POST['skype'];	
	$website = $_POST['website'];
	$gioithieu = $_POST['gioithieu'];	
	
	
	
	//validate dữ liệu
	$tendangnhap = trim(strip_tags($tendangnhap));
	$matkhau = trim(strip_tags($matkhau));
	$xacnhanmatkhau = trim(strip_tags($xacnhanmatkhau));
	settype($gioitinh,"int");
	$hovaten = trim(strip_tags($hovaten));
	$sodienthoai = trim(strip_tags($sodienthoai));	
	$email = trim(strip_tags($email));
	$diachi = trim(strip_tags($diachi));	
	
	$cmnd = trim(strip_tags($cmnd));
	$yahoo = trim(strip_tags($yahoo));	
	$skype = trim(strip_tags($skype));
	$website = trim(strip_tags($website));
	$gioithieu = trim(strip_tags($gioithieu));	
	
	
	$tenkhongdau= changeTitle($tendangnhap);
	
	    $d->reset();
		$d->setTable('member');
		$d->setWhere('tendangnhap', $tendangnhap);
		$d->select('id');
		if($d->num_rows()>0){
			$loi="Tên đăng nhập đã tồn tại, vui lòng chọn 1 tên đăng nhập khác.";
			transfer($loi, "dang-ky.html");
		}
		if($tendangnhap != $tenkhongdau ) { 
			$loi="Tên đăng nhập phải viết liền không dấu.";
			transfer($loi, "dang-ky.html");
		}
		
    $file_name=fns_Rand_digit(0,9,12);
	$logo=upload_image("file_dk", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_logo_l,$file_name);
	$data['logo']=$logo;
	
	$data['tendangnhap'] = $tendangnhap;
	$data['matkhau'] = taomatkhau($matkhau);
	$data['gioitinh'] = $gioitinh;
	$data['hovaten'] = $hovaten;
	$data['sodienthoai'] = $sodienthoai;
	$data['email'] = $email;
	$data['diachi'] = $diachi;
	
	$data['cmnd'] = $cmnd;
	$data['yahoo'] = $yahoo;
	$data['skype'] = $skype;
	$data['website'] = $website;
	$data['gioithieu'] = $gioithieu;
		
	$data['role'] = 1;
	$data['hienthi'] = 0;
	$data['vip'] = 0;
	$data['ngaytao'] = time();	
		
		
		
		$d->setTable('member');
		if($d->insert($data))
			transfer("Đăng ký thành công!", "trang-chu.html");	
		transfer("Đăng ký không thành công!", "trang-chu.html");
?>
