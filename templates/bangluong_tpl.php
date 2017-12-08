



<?php 
	if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') { 

    $d->reset();
	$sql_setting = "select * from #_rutbonus where maso='".$_SESSION['login']['maso']."'" ;			
	$d->query($sql_setting);
	$rutbonus= $d->result_array();
	
	$sqlrut = "select ngaytao from #_rutbonus where maso='".$_SESSION['login']['maso']."' and loai=2 order by id desc";	
	$d->query($sqlrut);
	$ngayrut = $d->result_array();
	
	$thoigian=0;
	$songay=0;
	
					
	
	if($ngayrut[0]['ngaytao']==''){
		
		$songay=round((time()-$_SESSION['login']['ngaykichhoat'])/86400);
		
		if($songay < 15){
			$thoigian = $_SESSION['login']['ngaykichhoat'] + 15*86400;
		}
		
	} else {
		
		$songay=round((time()-$ngayrut[0]['ngaytao'])/86400);
		
		if($songay < 15){
			$thoigian = $ngayrut[0]['ngaytao'] + 15*86400;			
		}
		
	}
	
	

?>


 


<div class="main" style="padding-top:20px">
 
  <div style="float:left"><a  class="uplevel" href="https://remitano.com/vn" target="_blank">BUY - SELL BITCOIN</a></div>
 
 
     <div style="padding-left:2%; padding-top:20px">
   
         <div class="span_2">
            <div class="span1_2">
           				 <h2 class="style" style="color:#00f; padding-bottom:15px; font-size:27px">DIRECT BONUS</h2> 
						
                         <img src="./images/vi1.png" width="100" height="100" style="margin-left:56px" />
                         
                         <p style="margin-bottom:20px"> -----------------------------------------------</p>
                         <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px;"><span><span style="color:#fff; background:#090; padding:5px 55px">Total: <?=number_format(tongbonus($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						 <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px">Withdrawn: <span style="color:#f00"><?=number_format(bonusdarut($_SESSION['login']['maso']),2, '.', ',')?>$</span></h2> 
						 <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px">Remain: <span style="color:#f00"><?=number_format(bonusconlai($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						 <?php if($_SESSION['login']['goi']>20){?>
                         <a class="rut" href="withdraw.html">Withdrawn</a>
                         <?php }?>
                         
                         
        
     
            </div>
       
           <div class="span1_2">
                        <h2 class="style" style="color:#00f; padding-bottom:15px; font-size:27px">SYSTEM BONUS</h2> 
                         <img src="./images/vi2.png" width="100" height="100" style="margin-left:56px" />
                         
                         <p style="margin-bottom:20px"> -----------------------------------------------</p>
                         <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px"><span style="color:#fff; background:#090; padding:5px 55px">Total: <?=number_format(tongbonus1($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						  <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px"><span style="color:#fff; background:#993100; padding:5px 15px">Static Interest: <?=number_format(laitinh($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						  <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px"><span style="color:#fff; background:#370677; padding:5px 22px">Weak Branch: <?=number_format(hoahonghethong($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						
                         <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px">Withdrawn: <span style="color:#f00"><?=number_format(bonusdarut1($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						 <h2 class="style" style="color:#099; padding-bottom:15px; font-size:23px">Remain: <span style="color:#f00"><?=number_format(bonusconlai1($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
						
                        
                         <?php if($_SESSION['login']['goi']>20){?>
							 
							 <?php if($songay>=15) {?>                           
                            
                             <a class="rut" href="withdraw1.html">Withdrawn</a>
                            
                             <?php } else {?>
                            
                             <h2 class="style" style="color:#000; padding-bottom:15px; font-size:23px">Time Withdrawn: <?=date('d/m/Y',$thoigian)?></h2> 
                             
                             <?php }?>
                             
                         <?php }?>
                        
                        
                        
                                      
              
           </div>
           
       </div> 
   
  </div> 
    
</div>

<div class="clear"> </div>

<div class="main">
  			<table border="1" cellpadding="1" cellspacing="1" width="100%" style="margin-top:50px">
              <tr  style="height:35px; background:#6CF; line-height:35px; font-weight:bold; font-size:20px">
                <td align="center" width="35%"><strong>Amount</strong></td> 
                <td align="center" width="15%"><strong>Status</strong></td>          
                <td align="center" width="25%"><strong>View</strong></td>
                <td align="center" width="25%"><strong>Time</strong></td>                  
              </tr>
          
              <?php
               for($h=0;$h<count($rutbonus);$h++){
                   $chuoi='No';
                   $mau='#f00';
                   if($rutbonus[$h]['xacnhan']==1)
                   {
                        $chuoi='Yes';
                        $mau='#090';
                   }
              ?>
          
               <tr class="mau">
                    <td align="center"><?=number_format($rutbonus[$h]['sotien'],2, '.', ',')?> $</td>
                    <td align="center" style="color:<?=$mau?>"><?=$chuoi?></td> 
                    <td align="center" style="color:#090"><a href="views/<?=$rutbonus[$h]['id']?>/withdrawn.html">View</a></td> 
                    <td align="center"><?=date('d/m/Y',$rutbonus[$h]['ngaytao'])?></td> 
                                     
               </tr> 
        
             <?php }?>  
             </table>
    
</div>



           





<div class="clear"> </div>	

<?php }?>   

<style>
 .mau{
	 height:35px;
	 background: #E2F1F1; 
	 line-height:35px; 
	 font-weight:bold;
 }
 .mau a{
	 color:#03F;
 }
 .mau a:hover{
	 color:#F00;
	 text-decoration:underline;
 }
 .rut{
	padding:6px 15px; 
	background:#666; 
	color:#fff; 
	font-size:17px;
 }
 .rut:hover{
	 background:#000;
	 color:#f00;
	 cursor:pointer;
 }
 
 .uplevel{
	padding:10px 57px;
	background:#F00;
	color:#fff;
	font-weight:bold;
	font-size:17px;
	border-radius:8px;
}
.uplevel:hover{
	background:#00F;
	
}
 </style>



