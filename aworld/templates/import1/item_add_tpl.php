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
            	  
				
                $cell = $worksheet->getCellByColumnAndRow(2,$row);
                $masos = $cell->getValue();		
              
					if($masos!=''){
						
						        $sqlw = "select maso,gioithieu,quanly,hienthi from #_product where maso='".$masos."'";
								$d->query($sqlw);		
								$kqw = $d->fetch_array();
								
								if($kqw['hienthi']==0){
									$gioithieu=$kqw['gioithieu'];
									$quanly=$kqw['quanly'];
									$maso=$kqw['maso'];
									
									$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1,ngaykichhoat=".strtotime(date("Y-m-d",time())).",nguoikichhoat='".$_SESSION['login']['username']."' WHERE  maso = '".$masos."'";
									$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");	
									
									tonghop1($gioithieu,$quanly,$maso);
								}
						
						}
			}
			
			
        }   
		?>
        <script language="javascript">
    		alert("Kích hoạt thành công");
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

<h3>Kích hoạt tài khoản <span id="load" style="visibility: hidden;"><img border="0" src="media/images/ajaxloader.gif" align="absmiddle" /></span></h3>
<form name="form1" id="from1" action="" method="post" enctype="multipart/form-data" class="nhaplieu">
    <b>File: </b><input type="file" name="linkfile"  size="25" maxlength="255"  /> <strong>Loại : .xls (Ms.Excel 2003)</strong><br />
    <input type="submit" name="ok" id="ok" value="Upload" style="margin-left: 125px; margin-top: 10px;"/>
</form>