<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieup();
		$template = "about/item_add";
		break;
	case "save":
		save_gioithieu();
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

function get_gioithieup(){
	global $d, $item;

	$sql = "select * from #_about limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");
    if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_about,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _about_thumb_w, _about_thumb_h, _upload_about,$file_name,2);		
			$d->setTable('about');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_about.$row['photo']);	
				delete_file(_upload_about.$row['thumb']);				
			}
		}
    $data['ten_vi'] = $_POST['ten_vi'];
    $data['ten_en'] = $_POST['ten_en'];
	$data['noidung_vi'] = $_POST['noidung_vi'];
    $data['noidung_en'] = $_POST['noidung_en'];
	$data['noidung_ci'] = $_POST['noidung_ci'];
    $data['mota_vi'] = $_POST['mota_vi'];
    $data['mota_en'] = $_POST['mota_en'];
	$data['mota_ci'] = $_POST['mota_ci'];
	$d->reset();
	$d->setTable('about');
	if($d->update($data))
		transfer("Dữ liệu được cập nhật", "index.php?com=about&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=capnhat");
}
?>