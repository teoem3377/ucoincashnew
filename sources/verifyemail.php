<?php  if(!defined('_source')) die("Error");

        $token = trim(strip_tags(addslashes($_GET['tam'])));
 
			
		$data['xacthucmail'] =1;
				
		$d->reset();
		$d->setTable('product');					
        $d->setWhere('token',$token);
		
		
    	if($d->update($data)){
			transfer("Verify email successfully.", "account/sign-in.html");
		}else{
			transfer("Verify email NOT successfully.", "account/sign-in.html");	
		}
			
		
?>