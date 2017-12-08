<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
    
    case "man":
        get_items();
		$template = "dichvu/items";
		break;
    case "add":
		$template = "dichvu/item_add";
		break;
	case "edit":
		get_item();
		$template = "dichvu/item_add";
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
#====================================
function fns_Rand_digit($min,$max,$num){
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
}
function get_items(){
	global $d, $items, $paging;
    if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_dichvu where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
    if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_dichvu where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#----------------------------------------------------------------------------------------
	$sql ="select * from #_dichvu order by stt,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dichvu&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;

    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if($id){
    	$sql = "select * from #_dichvu where id={$id}";
    	$d->query($sql);
    	$item = $d->fetch_array();
    }
}

function save_item(){
	global $d;
    $file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=chinhsachbanhang&act=edit");
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
		$id =  themdau($_POST['id']);
        if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_news,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 200, 110, _upload_news,$file_name,2);		
			$d->setTable('dichvu');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_news.$row['photo']);	
				delete_file(_upload_news.$row['thumb']);				
			}
		}
    	$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		 $data['ten_ci'] = $_POST['ten_ci'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['mota_en'] = $_POST['mota_en'];
		$data['mota_ci'] = $_POST['mota_ci'];
    	$data['noidung_vi'] = $_POST['noidung_vi'];
        $data['noidung_en'] = $_POST['noidung_en'];
		$data['noidung_ci'] = $_POST['noidung_ci'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();
    	
    	$d->reset();
    	$d->setTable('dichvu');
        $d->setWhere('id', $id);
    	if($d->update($data))
    		redirect("index.php?com=dichvu&act=man&curPage=".$curPage);
    	else
    		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
    }else{
       if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_news,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 200, 110, _upload_news,$file_name,2);		
		}
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['ten_en'] = $_POST['ten_cin'];
        $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['mota_en'] = $_POST['mota_en'];
		 $data['mota_ci'] = $_POST['mota_ci'];
    	$data['noidung_vi'] = $_POST['noidung_vi'];
        $data['noidung_en'] = $_POST['noidung_en'];
		$data['noidung_ci'] = $_POST['noidung_ci'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        
    	$d->reset();
    	$d->setTable('dichvu');
    	if($d->insert($data))
    		redirect("index.php?com=dichvu&act=man");
    	else
    		transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
    }
}
function delete_item(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
        $sql = "select id,thumb, photo from #_dichvu where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_news.$row['photo']);
				delete_file(_upload_news.$row['thumb']);			
			}
        }
		$sql = "delete from #_dichvu where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=dichvu&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
}
}
?>