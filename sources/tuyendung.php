<?php  if(!defined('_source')) die("Error");
        $title_bar='LUẬT CHƠI';		
	    $title_tcat='LUẬT CHƠI';
   
	
   
       
        $d->reset();
		$sql_tintuc = "select * from #_about ";
		$d->query($sql_tintuc);
		$result_tintuc = $d->fetch_array();		
       
		
  ?>