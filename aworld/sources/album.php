<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "album/items";
		break;
	case "add":
		$template = "album/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "album/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "album/cats";
		break;
	case "add_cat":
		$template = "album/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "album/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	default:
		$template = "index";

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


function get_items(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_album where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_album SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_album SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_album where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_album SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_album SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_album ";
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	idlt=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=album&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=album&act=man");
	
	$sql = "select * from #_album where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=album&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF',_upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 180,150, _upload_hinhanh,$file_name,2);
			$d->setTable('album');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}
		$data['id_item'] = (int)$_POST['id_item'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('album');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=album&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=album&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF',_upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 180, 150, _upload_hinhanh,$file_name,2);
		}
		$data['id_item'] = (int)$_POST['id_item'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['mota'] = $_POST['mota'];
		$data['noidung'] = $_POST['noidung'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('album');
		if($d->insert($data))
			redirect("index.php?com=album&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=album&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_album where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
			$sql = "delete from #_album where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=album&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=album&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=album&act=man");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	$sql = "select * from #_album_item order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=album&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_cat");
	
	$sql = "select * from #_album_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=album&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('album_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=album&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=album&act=man_cat");
	}else{
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaytao'] =time();	
		
		$d->setTable('album_item');
		if($d->insert($data))
			redirect("index.php?com=album&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=album&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();		
		$sql = "delete from #_album_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=album&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=album&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=album&act=man_cat");
}
?>