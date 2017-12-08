<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "support/items";
		break;
	case "add":
		$template = "support/item_add";
		break;
	case "edit":
		get_item();
		$template = "support/item_add";
		break;
	case "save":	
		save_item();
		break;
	case "delete":
		delete_item();
		break;

	default:
		$template = "index";
}



function get_items(){
	global $d, $items, $paging;
	$sql = "select * from #_support where id>0";
	
	 if($_REQUEST['user']!='')
	{
		$user=addslashes($_REQUEST['user']);
		$sql.=" and user LIKE '%$user%'";
			
	}
	
	
	$sql.=" order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=support&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=support&act=man");
	
	$sql = "select * from #_support where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=support&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=support&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		
		$id =  themdau($_POST['id']);		
		$data['user'] = $_POST['user'];
		$data['tieude'] = $_POST['tieude'];
		$data['noidung'] = $_POST['noidung'];
		$data['traloi'] = $_POST['traloi'];	
		
		$d->setTable('support');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=support&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=support&act=man");
	}else{}
		
	
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_support where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=support&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=support&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=support&act=man");
}
?>

	
