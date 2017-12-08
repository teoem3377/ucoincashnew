<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "lienhe/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_lienhe limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=lienhe&act=capnhat");
		
	$data['mota'] = $_POST['mota'];
	$data['noidung_vi'] = $_POST['noidung_vi'];
	$data['noidung_en'] = $_POST['noidung_en'];
	$data['noidung1_vi'] = $_POST['noidung1_vi'];
	$data['noidung1_en'] = $_POST['noidung1_en'];
    $data['map1'] = $_POST['map1'];
	$data['map2'] = $_POST['map2'];
	$data['noidung_ci'] = $_POST['noidung_ci'];
	$d->reset();
	$d->setTable('lienhe');
	if($d->update($data))
		header("Location:index.php?com=lienhe&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=lienhe&act=capnhat");
}

?>