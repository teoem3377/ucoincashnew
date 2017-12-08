<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "nghe/items";
		break;
	case "add":		
		$template = "nghe/item_add";
		break;
	case "edit":		
		get_item();
		$template = "nghe/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
      
	 
	 #=========================Danh mục cấp 21==========================	
	case "man_cat1":
		get_cat1s();
		$template = "nghe/cat1s";
		break;
	case "add_cat1":		
		$template = "nghe/cat1_add";
		break;
	case "edit_cat1":		
		get_cat1();
		$template = "nghe/cat1_add";
		break;
	case "save_cat1":
		save_cat1();
		break;
	case "delete_cat1":
		delete_cat1();
		break; 
	  
	   
	#=========================Danh mục cấp 2==========================	
	case "man_cat":
		get_cats();
		$template = "nghe/cats";
		break;
	case "add_cat":		
		$template = "nghe/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "nghe/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	
	
	#=======================Danh mục cấp 1============================	
	case "man_list":
		get_lists();
		$template = "nghe/lists";
		break;
	case "add_list":		
		$template = "nghe/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "nghe/list_add";
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

function get_items(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_nghe where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$noibat=$cats[0]['noibat'];
	if($noibat==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_nghe where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_nghe where id>0 ";
    if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" and id_list=".$_REQUEST['id_list']."";
	}
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";
	}
		
	if($_REQUEST['keyword']!='')
	{
	$keyword=addslashes($_REQUEST['keyword']);
	$sql.=" and (tenkhongdau LIKE '%$keyword%' OR maso LIKE '%$keyword%')";
	}
	$sql.=" order by stt,ngaytao desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=nghe&act=man";
	$maxR=25;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man");
	
	$sql = "select * from #_nghe where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nghe&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	$curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
    
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
			$d->setTable('nghe');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_nghe.$row['photo']);	
				delete_file(_upload_nghe.$row['thumb']);				
			}
		}
		
		
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_cat'] = (int)$_POST['id_cat'];				
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['keywork'] = $_POST['keywork'];		
		$data['maso'] = $_POST['maso'];				
		$data['gia'] = str_replace(',','',$_POST['gia']);
        $data['xuatxu'] = $_POST['xuatxu'];
		$data['tinhtrang'] = $_POST['tinhtrang'];	
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['mota_en'] = $_POST['mota_en'];        	
		$data['chitiet_vi'] = $_POST['chitiet_vi'];
      	$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		$d->setTable('nghe');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=nghe&act=man&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nghe&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
		}
		$data['id_list'] = (int)$_POST['id_list'];
		$data['id_cat'] = (int)$_POST['id_cat'];					
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['maso'] = $_POST['maso'];			
		$data['gia'] = str_replace(',','',$_POST['gia']);
        $data['xuatxu'] = $_POST['xuatxu'];	
		$data['keywork'] = $_POST['keywork'];
        $data['mota_vi'] = $_POST['mota_vi'];
        $data['mota_en'] = $_POST['mota_en'];        	
		$data['chitiet_vi'] = $_POST['chitiet_vi'];
        $data['chitiet_en'] = $_POST['chitiet_en'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('nghe');
		if($d->insert($data))
			redirect("index.php?com=nghe&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nghe&act=man");
	}
}

function delete_item(){
	
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
        $sql = "select id,thumb, photo from #_nghe where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_nghe.$row['photo']);
				delete_file(_upload_nghe.$row['thumb']);			
			}
        }
		$sql = "delete from #_nghe where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=nghe&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nghe&act=man");
}
}

/*-----------Danh mục cấp 2----------------------*/
function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_nghe_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	if($_REQUEST['trangchu']!='')
	{
	$id_up = $_REQUEST['trangchu'];
	$sql_sp = "SELECT id,trangchu FROM table_nghe_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$trangchu=$cats[0]['trangchu'];
	if($trangchu==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat SET trangchu =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat SET trangchu =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_nghe_cat";
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=nghe&act=man_cat";
	$maxR=35;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat");
	
	$sql = "select * from #_nghe_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nghe&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
	    $id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
			$d->setTable('nghe_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_nghe.$row['photo']);	
				delete_file(_upload_nghe.$row['thumb']);				
			}
		}	
		$data['keywork'] = $_POST['keywork'];				
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['ten_ci'] = $_POST['ten_ci'];		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=nghe&act=man_cat&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat");
	}else{	
	     if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
		}
		$data['keywork'] = $_POST['keywork'];					
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['ten_ci'] = $_POST['ten_ci'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_cat');
		if($d->insert($data))
			redirect("index.php?com=nghe&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_nghe_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=nghe&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat");
}



/*-----------Danh mục cấp 21----------------------*/
function get_cat1s(){
	global $d, $items,$giasp,$paging;
	$gia=0;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_nghe_cat1 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat1 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_cat1 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	$sql = "select * from #_nghe_cat1 where id_dm=".$_REQUEST['id_dm']." order by id desc";
				
	
	$d->query($sql);
	$items = $d->result_array();
	
	for($h=0;$h<count($items);$h++){
		
		$giasp = $giasp + (giasp($items[$h]['id_sp'])*$items[$h]['soluong']);
	}
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=nghe&act=man_cat1";
	$maxR=35;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat1(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat1");
	
	$sql = "select * from #_nghe_cat1 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nghe&act=man_cat1");
	$item = $d->fetch_array();	
}

function save_cat1(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat1");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
	    $id =  themdau($_POST['id']);
		$data['id_dm'] = $_POST['id_dm'];
		$data['id_sp'] = $_POST['id_sp'];
        $data['soluong'] = $_POST['soluong'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_cat1');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=nghe&act=man_cat1&id_dm=".$_POST['id_dm']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat1&id_dm=".$_POST['id_dm']);
	}else{	
	     
		$data['id_dm'] = $_POST['id_dm'];
		$data['id_sp'] = $_POST['id_sp'];
        $data['soluong'] = $_POST['soluong'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_cat1');
		if($d->insert($data))
			redirect("index.php?com=nghe&act=man_cat1&id_dm=".$_POST['id_dm']);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat1&id_dm=".$_POST['id_dm']);
	}
}

function delete_cat1(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_nghe_cat1 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=nghe&act=man_cat1&id_dm=".$_GET['id_dm']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nghe&act=man_cat1&id_dm=".$_GET['id_dm']);
	}else transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_cat1&id_dm=".$_GET['id_dm']);
}





/*-------------Danh mục cấp 1--------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_nghe_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_nghe_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_nghe_list where ngayxoa=0";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=nghe&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_list");
	
	$sql = "select * from #_nghe_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=nghe&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$sql = "select gia from #_setting";			
	$d->query($sql);
	$gia = $d->fetch_array();
	
	
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=nghe&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
			$d->setTable('nghe_list');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_nghe.$row['photo']);	
				delete_file(_upload_nghe.$row['thumb']);				
			}
		}
		
		$data['keywork'] = $_POST['keywork'];
		$data['soluong'] =  $_POST['soluong'];	
		$data['giatri'] =  $_POST['soluong']*$gia['gia'];				
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=nghe&act=man_list&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nghe&act=man_list");
	}else{	
	
	    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_nghe,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], _nghe_thumb_w, _nghe_thumb_h, _upload_nghe,$file_name,2);		
		}
		$data['soluong'] =  $_POST['soluong'];
		$data['giatri'] = $_POST['soluong']*$gia['gia'];
		$data['keywork'] = $_POST['keywork'];			
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		
		$d->setTable('nghe_list');
		if($d->insert($data))
			redirect("index.php?com=nghe&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=nghe&act=man_list");
	}
}

function delete_list(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
        $sql = "select id,thumb, photo from #_nghe_list where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_nghe.$row['photo']);
				delete_file(_upload_nghe.$row['thumb']);			
			}
        }
		$sql = "delete from #_nghe_list where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=nghe&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=nghe&act=man_list");
}
}
?>