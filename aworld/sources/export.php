<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){	
	case "man":		
		$template = "export/item_add";
		break;
	case "save":
		save();
		break;
	default:
		$template = "index";
}
#====================================
function save(){
	global $d;	
	
	
	
	
	
	if($_POST['batdauz']!=""){
		
		$batdau=$_POST['batdauz'];
		$Ngay_arr = explode("/",$batdau); // array(17,11,2010)
		if (count($Ngay_arr)==3) {
			$ngay = $Ngay_arr[0]; //17
			$thang = $Ngay_arr[1]; //11
			$nam = $Ngay_arr[2]; //2010
			$ngayto=$nam."-".$thang."-".$ngay." 00:00:00";
		}	
		$batdaux = strtotime($ngayto);
		
		$ketthuc=$_POST['ketthucz'];
		$Ngay_arr = explode("/",$ketthuc); // array(17,11,2010)
		if (count($Ngay_arr)==3) {
			$ngay = $Ngay_arr[0]; //17
			$thang = $Ngay_arr[1]; //11
			$nam = $Ngay_arr[2]; //2010
			$ngayfrom=$nam."-".$thang."-".$ngay." ".date("23:59:59",time());
		}	
		$ketthucx = strtotime($ngayfrom);
		
	
	}else{
		
	$batdau=date("01-m-Y",time());
	$ketthuc=date("d-m-Y",time());
	
	$batdaux=strtotime(date("01-m-Y 00:00:00",time()));
	$ketthucx=strtotime(date("d-m-Y 23:59:59",time()));
	}
	
	
	if($_POST['id_listz']!=""){
		$id_listx =" and id_list=".$_POST['id_listz'];
	}else{
		$id_listx="";
	}
	
	if($_POST['id_cat1z']!=""){
		$id_listx =" and id_cat1=".$_POST['id_cat1z'];
	}else{
		$id_listx="";
	}
	
	if($_POST['dailyz']!=""){
		$dailyx =" and daily=".$_POST['dailyz'];
	}else{
		$dailyx="";
	}
	
	
	if($_POST['quanlyvungz']!=0){
		$quanlyvungx =" and quanlyvung=".($_POST['quanlyvungz']-1);
	}else{
		$quanlyvungx="";
	}
	
	if($_POST['trangthaiz']!=0){
		$trangthaix =" and hienthi=".($_POST['trangthaiz']-1);
	}else{
		$trangthaix="";
	}
	
	if($_POST['keywordz']!=""){
		$keywordz =" and maso LIKE '%".$_POST['keywordz']."%'";	
	}else{
		$keywordz="";
	}
	
	if($_POST['keyword1z']!=""){
		$keyword1z =" and ( nguoitao LIKE '%".$_POST['keyword1z']."%' OR nguoisua LIKE '%".$_POST['keyword1z']."%' ) ";
	}else{
		$keyword1z="";
	}
	
	
	// Bat dau export excel
	/** PHPExcel */
include 'PHPExcel.php';
/** PHPExcel_Writer_Excel */
include 'PHPExcel/Writer/Excel5.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->setActiveSheetIndex( 0 )->mergeCells( 'A1:K1' );
$objPHPExcel->getActiveSheet()->getRowDimension( '1' )->setRowHeight( 40 );
$objPHPExcel->getActiveSheet()->getStyle( 'A1' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => 'e97d13' ),'name' => 'Arial', 'bold' => true, 'italic' => false, 'size' => 14 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );

$objPHPExcel->getActiveSheet()->getColumnDimension( 'A' )->setWidth( 7 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'B' )->setWidth( 25 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'C' )->setWidth( 15 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'D' )->setWidth( 15 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'E' )->setWidth( 15 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'F' )->setWidth( 15);
$objPHPExcel->getActiveSheet()->getColumnDimension( 'G' )->setWidth( 20 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'H' )->setWidth( 19 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'I' )->setWidth( 13 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'J' )->setWidth( 20 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'K' )->setWidth( 10 );




$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(25);
   
$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A1', 'DANH SÁCH NHÂN VIÊN ( '.$batdau." đến ".$ketthuc." )" );
$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A2', 'STT' )->setCellValue( 'B2', 'Họ tên' )->setCellValue( 'C2', 'Mã số' )->setCellValue( 'D2', 'SĐT' )->setCellValue( 'E2', 'Giới thiệu' )->setCellValue( 'F2', 'SĐT Giới thiệu' )->setCellValue( 'G2', 'Cấp bậc' )->setCellValue( 'H2', 'Ngày tạo' )->setCellValue( 'I2', 'Gói tham gia' )->setCellValue( 'J2', 'TK ngân hàng' )->setCellValue( 'K2', 'Trạng thái' );

$objPHPExcel->getActiveSheet()->getStyle( 'A2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'B2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'C2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'D2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'E2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'F2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'G2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'H2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'I2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'J2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'K2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
			
//End
						
$sql = "select * from #_product where ngaytao >= ".$batdaux." and ngaytao <=".$ketthucx.$id_listx.$dailyx.$quanlyvungx.$trangthaix.$keywordz.$keyword1z." order by id asc";
$d->query($sql);
$result=$d->result_array();	
$vitri=3;
for($i=0,$count_dmsp=count($result);$i<$count_dmsp;$i++) { 

        $sql1 = "select ten_vi from #_product_list where id=".$result[$i]['id_list'];
		$d->query($sql1);
		$capbac=$d->fetch_array();
		
		$sql11 = "select giatri from #_product_cat1 where id=".$result[$i]['id_cat1'];
		$d->query($sql11);
		$goithamgia=$d->fetch_array();
		
		$sql111 = "select dienthoai from #_product where maso='".$result[$i]['gioithieu']."'";
		$d->query($sql111);
		$sdt=$d->fetch_array();		

	    $objPHPExcel->getActiveSheet()->getRowDimension($i+3)->setRowHeight(23);
    	$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A'.$vitri,$i+1 )->setCellValue( 'B'.$vitri,$result[$i]['hoten'])->setCellValue( 'C'.$vitri,$result[$i]['maso'])->setCellValue( 'D'.$vitri,$result[$i]['dienthoai'])->setCellValue( 'E'.$vitri,$result[$i]['gioithieu'])->setCellValue( 'F'.$vitri,$sdt['dienthoai'])->setCellValue( 'G'.$vitri,$capbac['ten_vi'])->setCellValue( 'H'.$vitri,date('d/m/Y H:i:s',$result[$i]['ngaytao']))->setCellValue( 'I'.$vitri,dinhmucthamgia($result[$i]['maso']))->setCellValue( 'J'.$vitri,$result[$i]['taikhoan'])->setCellValue( 'K'.$vitri,$result[$i]['hienthi']);	
		
		$objPHPExcel->getActiveSheet()->getStyle('A'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('B'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('C'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('D'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('E'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('F'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('G'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('H'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('I'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('J'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('K'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		
			  	
        $vitri++;	
		
}

    
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Danhsachnhanvien');

		
// Save Excel 2007 file
//$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
//$objWriter->save(str_replace('.php', '.xls', __FILE__));

//Redirect output to a client’s web browser (Excel5)
      header( 'Content-Type: application/vnd.ms-excel' );
      header( 'Content-Disposition: attachment;filename="Danhsachnhanvien_'.date('dmY').'.xls"' );
      header( 'Cache-Control: max-age=0' );

      $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
      $objWriter->save( 'php://output' );		
}
?>