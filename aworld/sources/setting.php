<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieup();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieup(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	
	$data['giabtc'] = $_POST['giabtc'];
	$data['giaeth'] = $_POST['giaeth'];
	$data['giabbc'] = $_POST['giabbc'];
	$data['giabbcsapban'] = $_POST['giabbcsapban'];
	
	
	$data['bbcdaban'] = $_POST['bbcdaban'];
	$data['bbcduban'] = $_POST['bbcduban'];
	$data['bbcdangban'] = $_POST['bbcdangban'];
	
	
	$data['ngayketthuc'] = $_POST['ngayketthuc'];
	$data['ngaysapban'] = $_POST['ngaysapban'];
	
	$data['bbcduocmua'] = $_POST['bbcduocmua'];
	
	$data['dangban'] = $_POST['dangban'];
	
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		transfer("Cập nhật thành công", "index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>