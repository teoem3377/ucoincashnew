<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

  #===================Nhân viên================================	
	case "man":
		get_items();
		$template = "product/items";
		break;
	case "man1":
		get_items1();
		$template = "product/items1";
		break;
	case "man2":
		get_items2();
		$template = "product/items2";
		break;
	case "add":		
		$template = "product/item_add";
		break;
	case "edit":		
		get_item();
		$template = "product/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	case "reset":
		reset_item();
		break;
		
	case "editx":		
		get_itemx();
		$template = "product/item_addx";
		break;
		
	case "editx1":		
		get_itemx1();
		$template = "product/item_addx1";
		break;
		
	case "savex":		
		savex();
		break;
		
	case "deletex":
		delete_itemx();
		break;
		
   case "delete1":
		delete_item1();
		break;
		
	
  #===================Lên cấp================================	
	case "luutudong":
		luutudong(strtotime(date("Y-m-d H:i:s",time())));		
		break;
   #===================Lên cấp================================	
	case "lencap":
		get_lencap();
		$template = "product/lencap";
		break;
		
	#===================Thưởng CTV================================	
	case "thuong":
		get_thuong();
		$template = "product/thuong";
		break;
	#===================Thưởng Quản lý vùng================================	
	case "thuong1":
		get_thuong1();
		$template = "product/thuong1";
		break;
	#===================Thưởng đại lý================================	
	case "thuong2":
		get_thuong2();
		$template = "product/thuong2";
		break;
		
   #===================Bảng lương================================		
	case "luong":
		get_luong();
		$template = "product/luong";
		break;
  #===================SMS NGÀY================================		
	case "smsngay":
		get_smsngay();
		$template = "product/smsngay";
		break;
   #===================Đại lý bán hàng================================		
	case "dailybanhang":
		get_dailybanhang();
		$template = "product/dailybanhang";
		break;
		
	#=======================Danh mục mức thưởng============================	
	case "man_cat":
		get_cats();
		$template = "product/cats";
		break;
	case "add_cat":		
		$template = "product/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "product/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
		
		#=======================Danh mục mức đầu tư============================	
	case "man_cat1":
		get_cat1s();
		$template = "product/cat1s";
		break;
	case "add_cat1":		
		$template = "product/cat1_add";
		break;
	case "edit_cat1":		
		get_cat1();
		$template = "product/cat1_add";
		break;
	case "save_cat1":
		save_cat1();
		break;
	case "delete_cat1":
		delete_cat1();
		break;

	
#=======================Danh mục mức hỗ trợ quản lý vùng============================	
	case "man_cat2":
		get_cat2s();
		$template = "product/cat2s";
		break;
	case "add_cat2":		
		$template = "product/cat2_add";
		break;
	case "edit_cat2":		
		get_cat2();
		$template = "product/cat2_add";
		break;
	case "save_cat2":
		save_cat2();
		break;
	case "delete_cat2":
		delete_cat2();
		break;
		
			
#=======================Danh mục mức hỗ trợ đại lý============================	
	case "man_cat3":
		get_cat3s();
		$template = "product/cat3s";
		break;
	case "add_cat3":		
		$template = "product/cat3_add";
		break;
	case "edit_cat3":		
		get_cat3();
		$template = "product/cat3_add";
		break;
	case "save_cat3":
		save_cat3();
		break;
	case "delete_cat3":
		delete_cat3();
		break;
#=======================Danh mục mức thưởng F1============================	
	case "man_cat4":
		get_cat4s();
		$template = "product/cat4s";
		break;
	case "add_cat4":		
		$template = "product/cat4_add";
		break;
	case "edit_cat4":		
		get_cat4();
		$template = "product/cat4_add";
		break;
	case "save_cat4":
		save_cat4();
		break;
	case "delete_cat4":
		delete_cat4();
		break;

#=======================Danh mục cấp ============================	
	case "man_list":
		get_lists();
		$template = "product/lists";
		break;
	case "add_list":		
		$template = "product/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "product/list_add";
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


#=================Save bill chuyển tiền===============#
function savex(){
	global $d;
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=thuong");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_product,$file_name)){
			$data['photo'] = $photo;	
			$d->setTable('rutbonus');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_product.$row['photo']);								
			}
		}
		
		
		$data['phanhoi'] = $_POST['phanhoi'];
		
		$d->setTable('rutbonus');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=thuong&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=thuong");
	}
}


#============= Nhân viên=======================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging,$tongso;
	
	$sql = "select * from #_product where id>0 ";
				
	 if($_REQUEST['email']!='')
	{
		$email=addslashes($_REQUEST['email']);
		$sql.=" and email LIKE '%$email%'";
			
	}
	
	 if($_REQUEST['walletbbc']!='')
	{
		$walletbbc=addslashes($_REQUEST['walletbbc']);
		$sql.=" and walletbbc LIKE '%$walletbbc%'";
			
	}
	
	 if($_REQUEST['walleteth']!='')
	{
		$walleteth=addslashes($_REQUEST['walleteth']);
		$sql.=" and walleteth LIKE '%$walleteth%'";
			
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc";	
	$d->query($sql);
	$items = $d->result_array();
	$tongso = count($items);
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=man".$bien;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}



function get_items2(){
	global $d, $items, $paging,$tongso;
	
	
	#----------------------------------------------------------------------------------------
		if($_REQUEST['hienthi']!=''){
				
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,maso,hienthi FROM table_product1 where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			
			if($hienthi==1){		
				
				$sqlUPDATE_ORDER = "UPDATE table_product1 SET hienthi =0,ngaykichhoat=0,nguoikichhoat='' WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");		
			
			}
				
		}
	#----------------------------------end hien thi---------------------------------------------
	
	
	
	
	
	$sql = "select * from #_product1 where hienthi=1 and lencay=0";
	
	
				
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and user LIKE '%$keyword%'";
		$bien="&keyword=".$keyword;	
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien1 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc, id_list asc";	
	$d->query($sql);
	$items = $d->result_array();
	$tongso = count($items);
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=man2".$bien.$bien1;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}





function get_items1(){
	global $d, $items, $paging,$tongso;
	
	
	
	#----------------------------------------------------------------------------------------
		if($_REQUEST['hienthi']!=''){
				
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,maso,hienthi FROM table_product1 where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			
			if($hienthi==0){
				
				
				$sqlUPDATE_ORDER = "UPDATE table_product1 SET hienthi =1,ngaykichhoat=".strtotime(date("Y-m-d",time())).",nguoikichhoat='".$_SESSION['login']['username']."' WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");		
			
				#========================== end kích hoạt hoa hồng, lên cấp, xét thưởng =========#
				
			}
			else{
				
				//$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
				//$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
	#----------------------------------end hien thi---------------------------------------------
	
	$sql = "select * from #_product1 where hienthi=0 ";
	
	
				
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and user LIKE '%$keyword%'";
		$bien="&keyword=".$keyword;	
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien1 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc";	
	$d->query($sql);
	$items = $d->result_array();
	$tongso = count($items);
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=man1".$bien.$bien1;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man");
	$item = $d->fetch_array();	
}

function get_itemx(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=thuong1");
	
	$sql = "select * from #_upbill where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=thuong1");
	$item = $d->fetch_array();	
}
function get_itemx1(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=thuong");
	
	$sql = "select * from #_rutbonus where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=thuong");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	if($_POST['curPage'] != "" ) {$bien =$_POST['curPage'];}
	
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
    
	if($id){
		
		$id =  themdau($_POST['id']);
		if($_POST['matkhau']!="")
			$data['matkhau'] = taomatkhau($_POST['matkhau']);
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['quocgia'] = $_POST['quocgia'];
		$data['xacthuceth'] = $_POST['xacthuceth'];
		$d->setTable('product');
		$d->setWhere('id', $id);
		
		if($d->update($data))
		
			redirect("index.php?com=product&act=man".$bien);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man");
			
			
	}else{		
		
		
	}//thêm mới
}





function delete_item(){
	global $d;
		
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		
		$sqlpr = "select hienthi from table_product where id=".$id;
		$d->query($sqlpr);		
		$pr = $d->fetch_array();
		
		if($pr['hienthi']==1)
			transfer("Không thể xóa vì ID này đã kích hoạt", "index.php?com=product&act=man");
		
		$d->reset();		
		$sql = "delete from table_product where  id=".$id;
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man");
	}			
	
		
}

function delete_item1(){
	global $d;
		
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
			$d->reset();		
		$sql = "delete from table_product1 where  id=".$id;
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man1");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man1");
	}			
	
		
}

function delete_itemx(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
        $sql = "select id,photo from #_upbill where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_product.$row['photo']);
					
			}
        }
		$sql = "delete from #_upbill where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=product&act=thuong1");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=thuong1");
}
}


function reset_item(){
	global $d;
		
	if($_GET['maso']!=''){
		$maso =  $_GET['maso'];
		
		
		$sqlresset = "delete from table_hoahongtrian where maso='".$maso."'";
		$d->query($sqlresset);		
				
		transfer("Reset thành công", "index.php?com=product&act=man");
	}			
	
		
}


#============= Lương=======================

function get_luong(){
	global $d, $items, $paging,$tall_tructiep,$tall_hethong,$tall,$songuoi,$batdauv,$ketthucv;
	
	$sql = "select maso,taikhoan from #_product where hienthi=1 ";	
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and maso LIKE '%$keyword%'";
		$bien2="&keyword=".$keyword;	
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien1 ="&curPage=".$_REQUEST['curPage'];}
	
		
		
	$sql.=" order by id asc";	
	$d->query($sql);
	$items = $d->result_array();
	
	
	
	//echo $batdauv."==".$ketthucv; exit();
	
		
		
	$tall_tructiep=0;
	$songuoi=count($items);
	for($i=0, $count=count($items); $i<$count; $i++){
				
		$hoahongtructiep=0;
		
		$hoahongtructiep=laitinh($items[$i]['maso']);
		
		$tall_tructiep =$tall_tructiep + $hoahongtructiep;
		
		
	}
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=luong".$bien1.$bien2;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	
}






#============= Lên cấp=======================

function get_lencap(){
	global $d, $items, $paging;
	
	$sql = "select * from #_lencap ";	
	
	
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
		$sql.=" where ngaytao >= ".$batdau;;
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
			$sql.=" and ngaytao <= ".$ketthuc;;
			$ngayketthuc="&ketthuc=".$_REQUEST['ketthuc'];	
	}
	
	
	

    if((int)$_REQUEST['id_list']!=''){
	$sql.=" and capbacmoi=".$_REQUEST['id_list']."";	
	}	
	
	
	
	if($_REQUEST['id_list'] != "" ) {$bien ="&id_list=".$_REQUEST['id_list'];}
	if($_REQUEST['batdau'] != "" ) {$bien1 ="&batdau=".$_REQUEST['batdau'];}
	if($_REQUEST['ketthuc'] != "" ) {$bien2 ="&ketthuc=".$_REQUEST['ketthuc'];}
	if($_REQUEST['curPage'] != "" ) {$bien3 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc";	
	$d->query($sql);
	$items = $d->result_array();
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=lencap".$bien.$bien1.$bien2.$bien3;		
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	
}


#============= SMS NGÀY=======================

function get_smsngay(){
	
	global $d, $items, $paging;
	
	$sql = "select * from #_dautu ";	
	
	
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
		$sql.=" where ngaytao >= ".$batdau;;
		$ngaybatdau="&batdau=".$_REQUEST['batdau'];
		
	}
	else {		
		$sql.= " where ngaytao >= ".ngaythu2();				
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
			$sql.=" and ngaytao <= ".$ketthuc;;
			$ngayketthuc="&ketthuc=".$_REQUEST['ketthuc'];	
	}
	else {		
		$sql.= " and ngaytao <= ".strtotime(date("Y-m-d 23:59:59",time()));				
	}
	
	
		
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and maso LIKE '%$keyword%'";
		$bien3="&keyword=".$keyword;	
	}
	
	if($_REQUEST['batdau'] != "" ) {$bien ="&batdau=".$_REQUEST['batdau'];}
	if($_REQUEST['ketthuc'] != "" ) {$bien1 ="&ketthuc=".$_REQUEST['ketthuc'];}
	if($_REQUEST['curPage'] != "" ) {$bien2 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" and sotien > 0  order by sotien,id asc";	
	$d->query($sql);
	$items = $d->result_array();
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=smsngay".$bien.$bien1.$bien2.$bien3;		
	$maxR=50;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}


#============= THƯỞNG CTV=======================

function get_thuong(){
	global $d, $items, $sotiendarut, $paging;
	$sotiendarut=0;
	
	#----------------------------------------------------------------------------------------
		if($_REQUEST['xacnhan']!=''){
				
			$id_up = $_REQUEST['xacnhan'];
			$sql_sp = "SELECT id,maso,xacnhan FROM table_rutbonus where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$xacnhan=$cats[0]['xacnhan'];
			
			if($xacnhan==0){				
				$sqlUPDATE_ORDER = "UPDATE table_rutbonus SET xacnhan =1,ngayxacnhan=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  id = ".$id_up;
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");		
			}
				
		}
	#----------------------------------end hien thi---------------------------------------------
	
	
	$sql = "select * from #_rutbonus where id>0 ";	
	
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and user LIKE '%$keyword%'";
		$bien="&keyword=".$keyword;	
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien1 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id desc";	
	$d->query($sql);
	$items = $d->result_array();
	
	$sqlrut = "select sum(sotien) as sotiens from #_rutbonus where xacnhan=1 ";	
	$d->query($sqlrut);
	$kqrut = $d->fetch_array();
	
	$sotiendarut = $kqrut['sotiens'];
	
	
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=thuong".$bien.$bien1;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	
}


#============= THƯỞNG QUẢN LÝ VÙNG=======================

function get_thuong1(){
	global $d, $items, $paging;
	
	global $d, $items, $paging;
	
	
	#----------------------------------------------------------------------------------------
		if($_REQUEST['xacnhan']!=''){
				
			$id_up = $_REQUEST['xacnhan'];
			$sql_sp = "SELECT id,xacnhan,user1,goi FROM table_upbill where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->fetch_array();
			$xacnhan=$cats['xacnhan'];
			$gois=$cats['goi'];
			
			if($xacnhan==0 && $cats['user1']!=''){
				
				if($gois==0){				
				
						$sqlUPDATE_ORDER = "UPDATE table_upbill SET xacnhan =1 WHERE  id = ".$id_up;
						$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
						
						$sqlUPDATE_x = "UPDATE table_product SET hienthi=1,ngaykichhoat=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  user = '".$cats['user1']."'";
						$resultUPDATE_x = mysql_query($sqlUPDATE_x) or die("Not query sqlUPDATE_x");
						
						$sqlUPDATE = "UPDATE table_product1 SET lencay =1  WHERE  user = '".$cats['user1']."'";
						$resultUPDATE = mysql_query($sqlUPDATE) or die("Not query sqlUPDATE");
						
						
						
						$sql_sp = "SELECT * FROM table_product where user='".$cats['user1']."'";
						$d->query($sql_sp);
						$kq_sp= $d->fetch_array();
						
						if($kq_sp['goi']>20){
							$dataca['maso'] = $kq_sp['gioithieu'];
							$dataca['sotien'] = $kq_sp['goi']*0.05;
							$dataca['lydo']= $kq_sp['maso'];
							$dataca['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
							$d->setTable('hoahongtructiep');
							$d->insert($dataca);	
						}
				
				} else {
					
					    $sqlUPDATE_ORDER = "UPDATE table_upbill SET xacnhan =1 WHERE  id = ".$id_up;
						$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
											
					    $sql_spf = "SELECT * FROM table_product where user='".$cats['user1']."'";
						$d->query($sql_spf);
						$kq_spf= $d->fetch_array();
						
						$sqlUPDATE_xf = "UPDATE table_product SET goi=".$gois.",ngaynangcap=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  user = '".$cats['user1']."'";
						$resultUPDATE_xf = mysql_query($sqlUPDATE_xf) or die("Not query sqlUPDATE_xf");
						
						if( $gois > 100){						
						
							$datacaf['maso'] = $kq_spf['gioithieu'];
							$datacaf['sotien'] = ($gois-$kq_spf['goi'])*0.05;
							$datacaf['lydo']= $kq_spf['maso'];
							$datacaf['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
							$d->setTable('hoahongtructiep');
							$d->insert($datacaf);
						}else {
							
							$datacaf['maso'] = $kq_spf['gioithieu'];
							$datacaf['sotien'] = $gois*0.05;
							$datacaf['lydo']= $kq_spf['maso'];
							$datacaf['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
							$d->setTable('hoahongtructiep');
							$d->insert($datacaf);
							
						}
						
				}
				
				
			}
				
		}
	#----------------------------------end hien thi---------------------------------------------
	
	
	$sql = "select * from #_upbill where id>0 ";	
	
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and user LIKE '%$keyword%'";
		$bien="&keyword=".$keyword;	
	}
	
	if($_REQUEST['curPage'] != "" ) {$bien1 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id desc";	
	$d->query($sql);
	$items = $d->result_array();
	
		
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=thuong1".$bien.$bien1;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

#============= THƯỞNG F1=======================

function get_thuong2(){
	global $d, $items, $paging;
	
	$sql = "select * from #_thuong2 ";	
	
	
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
		$sql.=" where ngaytao >= ".$batdau;;
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
			$sql.=" and ngaytao <= ".$ketthuc;;
			$ngayketthuc="&ketthuc=".$_REQUEST['ketthuc'];	
	}
	
	
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and maso LIKE '%$keyword%'";
		$bien4="&keyword=".$keyword;	
	}

    if((int)$_REQUEST['id_list']!=''){
	$sql.=" and mucdat=".$_REQUEST['id_list']."";	
	}	
	
	
	
	if($_REQUEST['id_list'] != "" ) {$bien ="&id_list=".$_REQUEST['id_list'];}
	if($_REQUEST['batdau'] != "" ) {$bien1 ="&batdau=".$_REQUEST['batdau'];}
	if($_REQUEST['ketthuc'] != "" ) {$bien2 ="&ketthuc=".$_REQUEST['ketthuc'];}
	if($_REQUEST['curPage'] != "" ) {$bien3 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc";	
	$d->query($sql);
	$items = $d->result_array();
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=thuong2".$bien.$bien1.$bien2.$bien3.$bien4;		
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	
}




#============= Đại lý bán hàng=======================

function get_dailybanhang(){
	global $d, $items, $paging;
	
	$sql = "select * from #_dailybanhang ";	
	
	
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
	
	
	 if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$sql.=" and daily LIKE '%$keyword%'";
		$bien4="&keyword=".$keyword;	
	}
	
	if($_REQUEST['batdau'] != "" ) {$bien1 ="&batdau=".$_REQUEST['batdau'];}
	if($_REQUEST['ketthuc'] != "" ) {$bien2 ="&ketthuc=".$_REQUEST['ketthuc'];}
	if($_REQUEST['curPage'] != "" ) {$bien3 ="&curPage=".$_REQUEST['curPage'];}
		
		
	$sql.=" order by id asc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;		
	$url ="index.php?com=product&act=dailybanhang".$bien1.$bien2.$bien3.$bien4;		
	$maxR=30;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
	
}



/*-----------Danh mục mức thưởng F1----------------------*/
function get_cat4s(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat4 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat4 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat4 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	
	$sql = "select * from #_product_cat4";	
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat4(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat4");
	
	$sql = "select * from #_product_cat4 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat4");
	$item = $d->fetch_array();	
}

function save_cat4(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat4");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
	    $tiente = str_replace(',','',$_POST['phanthuong']);
	
	
	    $id =  themdau($_POST['id']);
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['dinhmucnhanh'] = $_POST['dinhmucnhanh'];
		$data['dinhmuctong'] = $_POST['dinhmuctong'];
		$data['phanthuong'] = $tiente;		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	    $data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('product_cat4');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat4&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat4");
	}else{
		
		$tiente = str_replace(',','',$_POST['phanthuong']);

			
	    $data['ten_vi'] = $_POST['ten_vi'];
		$data['dinhmucnhanh'] = $_POST['dinhmucnhanh'];
		$data['dinhmuctong'] = $_POST['dinhmuctong'];
		$data['phanthuong'] = $tiente;
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_cat4');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat4");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat4");
	}
}

function delete_cat4(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat4 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat4");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat4");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat4");
}



/*-----------Danh mục gói hỗ trợ đại lý----------------------*/
function get_cat3s(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat3 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat3 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat3 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	
	$sql = "select * from #_product_cat3";	
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat3(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
	
	$sql = "select * from #_product_cat3 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat3");
	$item = $d->fetch_array();	
}

function save_cat3(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
		$tiente1 = str_replace(',','',$_POST['luongcung']);
	
	    $id =  themdau($_POST['id']);
		$data['ten_vi'] = $_POST['ten_vi'];
     	$data['chietkhau'] = $tiente1;
		$data['dinhmuc'] = $_POST['dinhmuc'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	    $data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('product_cat3');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat3&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}else{	
	     
		
		$tiente1 = str_replace(',','',$_POST['luongcung']);
	
	    $data['ten_vi'] = $_POST['ten_vi'];
	  	$data['chietkhau'] = $tiente1;
		$data['dinhmuc'] = $_POST['dinhmuc'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_cat2');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat3");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}
}

function delete_cat3(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat3 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat3");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
}









/*-----------Danh mục gói hỗ trợ quản lý vùng----------------------*/
function get_cat2s(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat2 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat2 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat2 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	
	$sql = "select * from #_product_cat2";	
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat2(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2");
	
	$sql = "select * from #_product_cat2 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat2");
	$item = $d->fetch_array();	
}

function save_cat2(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
		$tiente1 = str_replace(',','',$_POST['thuong']);
	
	    $id =  themdau($_POST['id']);
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['thanhtich'] =  $_POST['thanhtich'];
		$data['thuong'] = $tiente1;
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	    $data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('product_cat2');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat2&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat2");
	}else{	
	     
		
		$tiente1 = str_replace(',','',$_POST['thuong']);
	
	    $data['ten_vi'] = $_POST['ten_vi'];
	    $data['thanhtich'] =  $_POST['thanhtich'];
		$data['thuong'] = $tiente1;
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_cat2');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat2");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat2");
	}
}

function delete_cat2(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat2 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat2");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat2");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2");
}






/*-----------Danh mục gói đầu tư----------------------*/
function get_cat1s(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat1 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat1 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat1 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	
	$sql = "select * from #_product_cat1";	
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat1(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1");
	
	$sql = "select * from #_product_cat1 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat1");
	$item = $d->fetch_array();	
}

function save_cat1(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
	    
		$tiente = str_replace(',','',$_POST['loitucthang']);
	
		
	    $id =  themdau($_POST['id']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['dinhmuc'] =  $_POST['dinhmuc'];
		$data['loitucthang'] = $tiente;
		$data['songay'] = $_POST['songay'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	    $data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('product_cat1');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat1&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat1");
	}else{	
	     
		
		$tiente = str_replace(',','',$_POST['loitucthang']);
	
	    $data['ten_vi'] = $_POST['ten_vi'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['dinhmuc'] = $_POST['dinhmuc'];
	    $data['loitucthang'] = $tiente;
		$data['songay'] = $_POST['songay'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_cat1');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat1");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat1");
	}
}

function delete_cat1(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat1 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat1");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat1");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1");
}



/*-----------Danh mục mức thưởng----------------------*/
function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	
	
	$sql = "select * from #_product_cat";	
	
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat";
	$maxR=40;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
	
	    $tiente = str_replace(',','',$_POST['phanthuong']);
	
	
	    $id =  themdau($_POST['id']);
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['dinhmucnhanh'] = $_POST['dinhmucnhanh'];
		$data['dinhmuctong'] = $_POST['dinhmuctong'];
		$data['phanthuong'] = $tiente;		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	    $data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}else{
		
		$tiente = str_replace(',','',$_POST['phanthuong']);

			
	    $data['ten_vi'] = $_POST['ten_vi'];
		$data['dinhmucnhanh'] = $_POST['dinhmucnhanh'];
		$data['dinhmuctong'] = $_POST['dinhmuctong'];
		$data['phanthuong'] = $tiente;
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
}
/*-------------Danh mục cấp bậc--------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['trangchu']!='')
	{
	$id_up = $_REQUEST['trangchu'];
	$sql_sp = "SELECT id,trangchu FROM table_product_list where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['trangchu'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET trangchu =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_list SET trangchu =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_list";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");
	
	$sql = "select * from #_product_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $curPage = isset($_POST['curPage']) ? $_POST['curPage'] : 1;
	if($id){	
		
		$id =  themdau($_POST['id']);		
		$tien = str_replace(',','',$_POST['thuong']);	
					
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['thuong'] = $tien;
		$data['toidangay'] = $_POST['toidangay'];	
		$data['toidatuan'] = $_POST['toidatuan'];
		$data['toithieutuan'] = $_POST['toithieutuan'];		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['nguoisua'] = $_SESSION['login']['username'];
		$d->setTable('product_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_list&curPage=".$curPage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}else{	
	
	   	$tien = str_replace(',','',$_POST['thuong']);
		
						
		$data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['thuong'] = $tien;
		$data['toidangay'] = $_POST['toidangay'];	
		$data['toidatuan'] = $_POST['toidatuan'];
		$data['toithieutuan'] = $_POST['toithieutuan'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = 1;
		$data['ngaytao'] = time();
		$data['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('product_list');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product_list where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");
}
?>