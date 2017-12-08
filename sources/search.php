<?php  if(!defined('_source')) die("Error");
			
		
			
			$danhmuc =  $_POST['danhmuc'];			   
            $tukhoa =  changeTitle(trim(strip_tags($_POST['txt_search'])));
            $tukhoa = trim(strip_tags($tukhoa));  
			
			
				
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}								
			// san pham
			$sql = "select * from #_product where tenkhongdau LIKE '%".$tukhoa."%' or id_list=".$danhmuc." and hienthi=1 order by stt asc, id desc";			
			$d->query($sql);
			$product = $d->result_array();				
			
											
?>