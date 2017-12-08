<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "donhang/items";
		break;
	case "add":		
		$template = "donhang/item_add";
		break;
	case "edit":		
		get_item();
		$template = "donhang/item_add";
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
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging, $tongsotien;
	
	$sql = "select * from #_donhang";	
	if($_REQUEST['batdau']!=''){		
		
		$batdau = $_REQUEST['batdau'];
		$Ngay_arr = explode("/",$batdau); // array(17,11,2010)
		if (count($Ngay_arr)==3) {
			$ngay = $Ngay_arr[0]; //17
			$thang = $Ngay_arr[1]; //11
			$nam = $Ngay_arr[2]; //2010
			$ngayto=$nam."-".$thang."-".$ngay." 00:00:00";
		}	
		$batdau = strtotime($ngayto);
		$sql.=" where ngaytao >= ".$batdau;
		$ngaybatdau="&batdau=".$_REQUEST['batdau'];
		
	}
	else {		
		$sql.= " where ngaytao >= ".strtotime(date("Y-m-01 00:00:00",time()));				
	}
				
		
	if($_REQUEST['ketthuc']!=''){
			
			$ketthuc = $_REQUEST['ketthuc'];
			$Ngay_arr = explode("/",$ketthuc); // array(17,11,2010)
			if (count($Ngay_arr)==3) {
				$ngay = $Ngay_arr[0]; //17
				$thang = $Ngay_arr[1]; //11
				$nam = $Ngay_arr[2]; //2010
				$ngayfrom=$nam."-".$thang."-".$ngay." ".date("23:59:59",time());
			}	
			$ketthuc = strtotime($ngayfrom);
			$sql.=" and ngaytao <= ".$ketthuc;
			$ngayketthuc="&ketthuc=".$_REQUEST['ketthuc'];	
	}
	
	 if((int)$_REQUEST['id_list']!=''){
	$sql.=" and trangthai=".$_REQUEST['id_list']."";	
	}	
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and madonhang LIKE '%$keyword%'";
		$bien3="&keyword=".$keyword;	
	}
	
	if($_REQUEST['id_list'] != "" ) {$bien ="&id_list=".$_REQUEST['id_list'];}
	if($_REQUEST['batdau'] != "" ) {$bien1 ="&batdau=".$_REQUEST['batdau'];}
	if($_REQUEST['ketthuc'] != "" ) {$bien2 ="&ketthuc=".$_REQUEST['ketthuc'];}
	if($_REQUEST['curPage'] != "" ) {$bien4 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id desc";	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=donhang&act=man".$bien.$bien1.$bien2.$bien3.$bien4;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	$tongsotien=0;
	for($m=0;$m<count($items);$m++){
		
		$tongsotien += $items[$m]['sotien'];
		
	}
	
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
	
	$sql = "select * from #_donhang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=donhang&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	
	
	if($_POST['id_lists'] != "" ) {$bien =$_POST['id_lists'];}
	if($_POST['batdaus'] != "" ) {$bien1 =$_POST['batdaus'];}
	if($_POST['ketthucs'] != "" ) {$bien2 =$_POST['ketthucs'];}
	if($_POST['curPage'] != "" ) {$bien3 =$_POST['curPage'];}
	
	
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			
		
		$data['ghichu'] = $_POST['ghichu'];
		$data['trangthai'] = $_POST['id_tinhtrang'];	
		$data['ngaysua'] = strtotime(date("Y-m-d H:i:s",time()));
		$data['nguoisua'] = $_SESSION['login']['username'];			
		$d->setTable('donhang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=donhang&act=man".$bien.$bien1.$bien2.$bien3);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=donhang&act=man");
	}else{
			
				
		$data['ghichu'] = $_POST['ghichu'];
		$data['trangthai'] = $_POST['id_tinhtrang'];	
		$d->setTable('donhang');
		if($d->insert($data))
			redirect("index.php?com=donhang&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=donhang&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_donhang where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=donhang&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=donhang&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
}
?>