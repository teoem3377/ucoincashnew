<?php 


 if(!defined('_source')) die("Error");
       
		
		
		
				   			
	$conlai=0;		
	
	$conlai=tongbonus($_SESSION['login']['maso'])-bonusdarut($_SESSION['login']['maso']);
	
		
	if($conlai<=0) $conlai=0;
	
		
	
		
?>