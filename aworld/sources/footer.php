<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "capnhat":
		get_gioithieuz();
		$template = "footer/item_add";
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

function get_gioithieuz(){
	global $d, $item;

	$sql = "select * from #_footer ";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=footer&act=capnhat");
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_footer,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('footer');			
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
			}
		}
	
	$data['mota'] = $_POST['mota'];
	$data['noidung_vi'] = $_POST['noidung_vi'];
	$data['noidung_en'] = $_POST['noidung_en'];
	$data['noidung1_vi'] = $_POST['noidung1_vi'];
	$data['noidung1_en'] = $_POST['noidung1_en'];
	$data['noidung_ci'] = $_POST['noidung_ci'];
	$d->reset();
	$d->setTable('footer');
	if($d->update($data))
		redirect("index.php?com=footer&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=footer&act=capnhat");
}

?>