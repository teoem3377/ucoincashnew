<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){	
	case "man":		
		$template = "export1/item_add";
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
		
	$batdau=date("01-m-Y ",time());
	$ketthuc=date("d-m-Y",time());
	
	$batdaux=strtotime(date("01-m-Y 00:00:00",time()));
	$ketthucx=strtotime(date("d-m-Y 23:59:59",time()));
	}
	
	
	if($_POST['id_listz']!=""){
		$id_listx =" and capbacmoi=".$_POST['id_listz'];
	}else{
		$id_listx="";
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
$objPHPExcel->setActiveSheetIndex( 0 )->mergeCells( 'A1:F1' );
$objPHPExcel->getActiveSheet()->getRowDimension( '1' )->setRowHeight( 40 );
$objPHPExcel->getActiveSheet()->getStyle( 'A1' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => 'e97d13' ),'name' => 'Arial', 'bold' => true, 'italic' => false, 'size' => 14 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );


$objPHPExcel->getActiveSheet()->getColumnDimension( 'A' )->setWidth( 7 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'B' )->setWidth( 35 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'C' )->setWidth( 20 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'D' )->setWidth( 25 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'E' )->setWidth( 25 );
$objPHPExcel->getActiveSheet()->getColumnDimension( 'F' )->setWidth( 20 );




$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(25);
   
$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A1', 'DANH SÁCH LÊN CẤP ( '.$batdau." đến ".$ketthuc." )" );
$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A2', 'STT' )->setCellValue( 'B2', 'Họ tên' )->setCellValue( 'C2', 'Mã số' )->setCellValue( 'D2', 'Cấp bậc cũ' )->setCellValue( 'E2', 'Cấp bậc mới' )->setCellValue( 'F2', 'Ngày lên cấp' );

$objPHPExcel->getActiveSheet()->getStyle( 'A2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'B2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'C2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'D2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'E2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
$objPHPExcel->getActiveSheet()->getStyle( 'F2' )->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => '0033b7' ), 'name' => 'Arial', 'bold' => false, 'italic' => false, 'size' => 11 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'c2def0'))));
		
//End
						
$sql = "select * from #_lencap where ngaytao >= ".$batdaux." and ngaytao <=".$ketthucx.$id_listx." order by id desc";
$d->query($sql);
$result=$d->result_array();	
$vitri=3;
for($i=0,$count_dmsp=count($result);$i<$count_dmsp;$i++) { 

       $sql11 = "select hoten from #_product where maso='".$result[$i]['maso']."'";
		$d->query($sql11);
		$hoten=$d->fetch_array();
		
		$sql111 = "select ten_vi from #_product_list where id=".$result[$i]['capbaccu'];
		$d->query($sql111);
		$capbaccu=$d->fetch_array();
		
		$sql1111 = "select ten_vi from #_product_list where id=".$result[$i]['capbacmoi'];
		$d->query($sql1111);
		$capbacmoi=$d->fetch_array();
			
	    $objPHPExcel->getActiveSheet()->getRowDimension($i+3)->setRowHeight(23);
    	$objPHPExcel->setActiveSheetIndex( 0 )->setCellValue( 'A'.$vitri,$i+1 )->setCellValue( 'B'.$vitri,$hoten['hoten'])->setCellValue( 'C'.$vitri,$result[$i]['maso'])->setCellValue( 'D'.$vitri,$capbaccu['ten_vi'])->setCellValue( 'E'.$vitri,$capbacmoi['ten_vi'])->setCellValue( 'F'.$vitri,date('d/m/Y H:i:s',$result[$i]['ngaytao']));	
		
		$objPHPExcel->getActiveSheet()->getStyle('A'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('B'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('C'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('D'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('E'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );
		$objPHPExcel->getActiveSheet()->getStyle('F'.$vitri )->applyFromArray( array('alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ) ) );	  	
        $vitri++;		
		
}

    
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Danhsachlencap');

		
// Save Excel 2007 file
//$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
//$objWriter->save(str_replace('.php', '.xls', __FILE__));

//Redirect output to a client’s web browser (Excel5)
      header( 'Content-Type: application/vnd.ms-excel' );
      header( 'Content-Disposition: attachment;filename="Danhsachlencap_'.date('dmY').'.xls"' );
      header( 'Cache-Control: max-age=0' );

      $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
      $objWriter->save( 'php://output' );		
}
?>