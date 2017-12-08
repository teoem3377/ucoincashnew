<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "doitac/items";
		break;
	case "add":
		$template = "doitac/item_add";
		break;
	case "edit":
		get_item();
		$template = "doitac/item_add";
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
	
    if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_doitac where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_doitac SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_doitac SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
    
	$sql = "select * from #_doitac order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=doitac&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	@$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");
	
	$sql = "select * from #_doitac where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=doitac&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_doitac,$file_name)){
			$data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _doitac_thumb_w, _doitac_thumb_h, _upload_doitac,$file_name,1);
			
			$d->setTable('doitac');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_doitac.$row['photo']);
                delete_file(_upload_doitac.$row['thumb']);
			}
		}
		
		
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['ten_ci'] = $_POST['ten_ci'];
		$data['url'] = $_POST['url'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('doitac');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=doitac&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=doitac&act=man");
	}else{
	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_doitac,$file_name)){
			$data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _doitac_thumb_w, _doitac_thumb_h, _upload_doitac,$file_name,1);
		}
		
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['ten_ci'] = $_POST['ten_ci'];
		$data['url'] = $_POST['url'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('doitac');
		if($d->insert($data))
			redirect("index.php?com=doitac&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=doitac&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
        $d->reset();
		$sql = "select id,thumb, photo from #_doitac where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_doitac.$row['photo']);
				delete_file(_upload_doitac.$row['thumb']);			
			}
		$sql = "delete from #_doitac where id='".$id."'";
		if($d->query($sql))
			transfer("Dữ liệu đã được xóa", "index.php?com=doitac&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=doitac&act=man");
        }
	}else transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");
}

?>