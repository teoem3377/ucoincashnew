<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "logo_top":
		get_logo_top();
		$template = "bannerqc/logo_top";
		break;
	case "save_logo_top":
		save_logo_top();
		break;
	#====================================
	case "capnhat":
		get_banner();
		$template = "bannerqc/logo_add";
		break;
	case "save":
		save_banner();
		break;
	
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


function get_logo_top(){
	global $d, $item;

	$sql = "select * from #_photo where com='logo_top' limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_logo_top(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	$sql = "select * from #_photo where com='logo_top' limit 0,1";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_logo,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_logo.$row['photo']);
            delete_file(_upload_logo.$row['thumb']);
		}
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','logo_top');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=logo_top");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=logo_top");
	}else{ // them moi
    if($photo = upload_image("file", 'swf|jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_logo,$file_name)){
		$data['photo'] = $photol;
	}
	   $data['com'] = 'logo_top';
		$d->setTable('photo');
		if($d->insert($data))
		      redirect("index.php?com=bannerqc&act=logo_top");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=logo_top");
	
}
}

function get_banner(){
	global $d, $item;

	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_banner,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_banner.$row['photo']);
		}
		$data['photo'] = $photo;
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_top');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_banner,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_top';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	
}
}

function get_logo_footer(){
	global $d, $item;

	$sql = "select * from #_photo where com='logo_footer' limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_logo_footer(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	$sql = "select * from #_photo where com='logo_footer' limit 0,1";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	if($id){ // cap nhat
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_logo,$file_name)){
			$data['photo'] = create_thumb($photo, _logo_footer_w, _logo_footer_h, _upload_logo,$file_name);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_logo.$row['photo']);
		}
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','logo_footer');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=logo_footer");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=logo_footer");
	}else{ // them moi
    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_logo,$file_name)){
		$data['photo'] = create_thumb($photo, _logo_footer_w, _logo_footer_h, _upload_logo,$file_name);
	}
	   $data['com'] = 'logo_footer';
		$d->setTable('photo');
		if($d->insert($data))
		      redirect("index.php?com=bannerqc&act=logo_footer");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=logo_footer");
	
}
}

function get_banner_phai(){
	global $d, $item_banner;

	$sql = "select * from #_photo where com='banner_phai'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item_banner = $d->fetch_array();
}

function save_banner_phai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,7);
	$sql = "select * from #_photo where com='banner_phai'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'gif|jpg|png', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		$data['photo'] = $photo;
		//echo dump($id);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_phai');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=man_phai");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'gif|jpg|png', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['com']='banner_phai';
		$d->setTable('photo');
		if($d->insert($data))
			//transfer("Dữ liệu đã được lưu", "index.php?com=bannerqc&act=man_banner");
			redirect("index.php?com=bannerqc&act=man_phai");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
	
}
}


?>