<?php if(!defined('_source')) die("Error");
   include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	
?>



<script>
	$(document).ready(function(e) {
		$('#ok').click(function(){
			$('#load').css({visibility: "visible"});
		});    
    });
</script>





<?php
if(isset($_POST['ok'])){
    $file_type=$_FILES['linkfile']['type'];
	if($file_type=="application/vnd.ms-excel" || $file_type=="application/x-ms-excel")
	{	
        $filename=stripUnicode($_FILES["linkfile"]["name"]);
        move_uploaded_file($_FILES["linkfile"]["tmp_name"],$filename);					
    		
        //include the following 2 files
        require 'PHPExcel.php';
        require_once 'PHPExcel/IOFactory.php';
        
        $objPHPExcel = PHPExcel_IOFactory::load($filename);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $worksheetTitle = $worksheet->getTitle();
            $highestRow = $worksheet->getHighestRow(); // e.g. 10
            $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            
            $nrColumns = ord($highestColumn) - 64;
           
            for ($row = 3; $row <= $highestRow; ++ $row) {
				
            	$cell = $worksheet->getCellByColumnAndRow(0, $row);
                $aaa = $cell->getValue();
				  
				if($aaa!=""){  
						$cell = $worksheet->getCellByColumnAndRow(0, $row);
						$stt = $cell->getValue();	
						
						$cell = $worksheet->getCellByColumnAndRow(1, $row);
						$hoten = $cell->getValue();			
						 
						$cell = $worksheet->getCellByColumnAndRow(2, $row);
						$gioithieu = $cell->getValue();		
						
						$cell = $worksheet->getCellByColumnAndRow(3, $row);
						$quanly = $cell->getValue();	
						
						$cell = $worksheet->getCellByColumnAndRow(4, $row);
						$tam = $cell->getValue();
						
						if($tam!=""){
							
							$sql_sp = "SELECT id FROM table_product_cat1 where giatri=".$tam;
							$d->query($sql_sp);
							$tam1= $d->fetch_array();				
							$id_cat1=$tam1['id'];
						}
						else{				
							$id_cat1=75;
						}
							
						
						$cell = $worksheet->getCellByColumnAndRow(5, $row);
						$taikhoan = $cell->getValue();
						
						$cell = $worksheet->getCellByColumnAndRow(6, $row);
						$dienthoai = $cell->getValue();
						
						$cell = $worksheet->getCellByColumnAndRow(7, $row);
						$cmnd = $cell->getValue();
						
						$cell = $worksheet->getCellByColumnAndRow(8, $row);
						$ngaysinh = $cell->getValue();	
						
						$cell = $worksheet->getCellByColumnAndRow(9, $row);
						$gioitinh = $cell->getValue();	
						
						
						
						
				
				//THEM MOI		
					
								$maso=taoma();
								$datax['id_list'] = 4;
								$datax['id_cat1'] = $id_cat1;	
								$datax['gioithieu'] = $gioithieu;
								$datax['quanly'] = $quanly;
								$datax['hoten'] = $hoten;
								$datax['tenkhongdau'] = changeTitle($hoten);	 
								$datax['maso'] = $maso;		
								$datax['matkhau'] = taomatkhau($maso);			 
								$datax['ngaysinh'] = $ngaysinh;
								$datax['gioitinh'] = $gioitinh; 
								$datax['diachi'] = ""; 
								$datax['dienthoai'] = $dienthoai;
								$datax['cmnd'] = $cmnd; 
								$datax['email'] = "";
								$datax['taikhoan'] = $taikhoan; 
								$datax['chinhanh'] = "";		
								$datax['hienthi'] = 1;
								$datax['ngaytao'] = strtotime(date("Y-m-d",time()));		
								$datax['nguoitao'] = $_SESSION['login']['username'];
								$datax['ngaykichhoat'] = strtotime(date("Y-m-d",time()));		
								$datax['nguoikichhoat'] = $_SESSION['login']['username'];
								
												
								//Lưu một nhân viên
								$d->setTable('product');
								$d->insert($datax);								
								tonghop1($gioithieu,$quanly,$maso);
						}//STT TỒN TẠI
								
				// END THEM MOI
					
            }	
        }   
		?>
        <script language="javascript">
    		alert("Import thành công");
    	</script>
<?php
	redirect("index.php?com=product&act=man");
    unlink($filename) or DIE("couldn't delete $dir$file<br />");
    }else { ?>
    	<script language="javascript">
    		alert("Không hỗ trợ kiểu file này");
    	</script>
   	<?php }
}
?>

<h3>Import dữ liệu <span id="load" style="visibility: hidden;"><img border="0" src="media/images/ajaxloader.gif" align="absmiddle" /></span></h3>
<form name="form1" id="from1" action="" method="post" enctype="multipart/form-data" class="nhaplieu">
    <b>File: </b><input type="file" name="linkfile"  size="25" maxlength="255"  /> <strong>Loại : .xls (Ms.Excel 2003)</strong><br />
    <input type="submit" name="ok" id="ok" value="Upload" style="margin-left: 125px; margin-top: 10px;"/>
</form>