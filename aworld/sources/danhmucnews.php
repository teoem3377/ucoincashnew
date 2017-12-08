<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	
	#=======================Danh mục news============================	
	case "man_list":
		get_lists();
		$template = "danhmucnews/lists";
		break;
	case "add_list":		
		$template = "danhmucnews/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "danhmucnews/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

	

/*-------------Danh mục news--------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_danhmucnews where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_danhmucnews SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_danhmucnews SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_danhmucnews";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=danhmucnews&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=danhmucnews&act=man_list");
	
	$sql = "select * from #_danhmucnews where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=danhmucnews&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=danhmucnews&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_danhmucnews,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _danhmucnews_thumb_w, _danhmucnews_thumb_h, _upload_danhmucnews,$file_name,2);		
			$d->setTable('danhmucnews');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_danhmucnews.$row['photo']);	
				delete_file(_upload_danhmucnews.$row['thumb']);				
			}
		}
		
		
		
		$data['keywork'] = $_POST['keywork'];				
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];	
		 $data['ten_ci'] = $_POST['ten_ci'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('danhmucnews');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=danhmucnews&act=man_list&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=danhmucnews&act=man_list");
	}else{	
	
	    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_danhmucnews,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], _danhmucnews_thumb_w, _danhmucnews_thumb_h, _upload_danhmucnews,$file_name,2);		
		}
		$data['keywork'] = $_POST['keywork'];			
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		 $data['ten_ci'] = $_POST['ten_ci'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('danhmucnews');
		if($d->insert($data))
			redirect("index.php?com=danhmucnews&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=danhmucnews&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_danhmucnews where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=danhmucnews&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=danhmucnews&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=danhmucnews&act=man_list");
}
?>