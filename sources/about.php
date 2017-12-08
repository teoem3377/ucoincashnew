<?php  if(!defined('_source')) die("Error");
        $title_bar='GIỚI THIỆU';		
	    $title_tcat='GIỚI THIỆU';
   
	
   
       
        $d->reset();
		$sql_tintuc = "select * from #_about ";
		$d->query($sql_tintuc);
		$result_tintuc = $d->fetch_array();		
       
		
  ?>