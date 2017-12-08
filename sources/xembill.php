<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";



	function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;	
		}

	//tiếp nhận dữ liệu

    $id = $_POST['idpin'];
	$masopincho = $_POST['masopincho'];
	$masopinnhan = $_POST['masopinnhan'];
	$phanhoi = $_POST['phanhoi'];
	
	$phanhoi =  trim(strip_tags($phanhoi));
	if (get_magic_quotes_gpc()==false) {
			$phanhoi =  mysql_real_escape_string($phanhoi);			
		}
		
    
	$sql = "UPDATE table_chonhan SET danhan =1,phanhoi='".$phanhoi."' WHERE  id=".$id;
    $d->query($sql);
	
	if( cannhan($masopinnhan)<=0 ){	
		$sql1 = "UPDATE table_pin SET danhan = 1, ngaynhan=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  mapin='".$masopinnhan."'";
		$d->query($sql1);
	}
	
	if(dacho($masopincho)>= cho()){			
		$sql2 = "UPDATE table_pin SET dacho = 1, ngaycho=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  mapin='".$masopincho."'";
		$d->query($sql2);
		
		$sql3 = "select maso from #_pin where mapin=".$masopincho;
		$d->query($sql3);
		$masonhan= $d->fetch_array();
		
		$data['pinnhan'] = $masopincho;
		$data['maso'] = $masonhan['maso'];
		$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
		$data['sotien'] = nhan();
		$d->setTable('nhan');
		$d->insert($data);
		tonghops($masonhan['maso'],$masopincho);
	}	
	
    transfer("Xác nhận đã nhận tiền!", "xembill/$id/$masopinnhan/pin.html");	
    	
			
	
?>
