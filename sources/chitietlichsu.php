<?php 


 if(!defined('_source')) die("Error");
        $title_bar='Chi tiết lịch sử đặt hàng';		
	    $title_tcat='Chi tiết lịch sử đặt hàng';	
		
		 @$id =  addslashes($_GET['tam']);
				
			$sql="select * from table_donhang where id=".$id;
			$d->query($sql);		
			$chitiet = $d->fetch_array();
			
		
?>