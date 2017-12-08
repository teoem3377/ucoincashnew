
<?php



	$sqlds = "select *  from #_product where gioithieu='".$_SESSION['login']['maso']."' and hienthi=1 order by id asc ";
	$d->query($sqlds);
	$danhsach = $d->result_array();
	
	$sqlds1 = "select *  from #_product1 where gioithieu='".$_SESSION['login']['maso']."' and hienthi=0 and lencay=0 order by id asc ";
	$d->query($sqlds1);
	$danhsach1 = $d->result_array();
	
	$sqlbill = "select * from #_upbill where maso='".$_SESSION['login']['maso']."' and xacnhan=0 order by id desc";
	$d->query($sqlbill);
	$dsbill = $d->result_array();
 

?>


<?php 
if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') {
?>

<div class="main">
 
     <div class="contact">
     
          
        
          <h2 class="style" style="color:#099; padding-bottom:15px">Active</h2> 
         
          <table border="1" cellpadding="1" cellspacing="1" width="100%">
          <tr  style="height:35px; background:#6CF; line-height:35px; font-weight:bold; font-size:20px">
            <td align="center" width="60%"><strong>User</strong></td>
            <td align="center" width="20%"><strong>Plan</strong></td>
            <td align="center" width="20%"><strong>Time</strong></td> 
                             
          </tr>     
     
       
      <?php for($i=0;$i<count($danhsach);$i++){?>
      
           <tr class="mau">               
                <td align="center"><a href="info/<?=$danhsach[$i]['id']?>/active.html"><?=$danhsach[$i]['user']?></a></td>
               <td align="center" style="color:#f00"><?=number_format($danhsach[$i]['goi'],0, '.', ',')?>$</td>
                <td align="center" ><?=date('d/m/Y',$danhsach[$i]['ngaykichhoat'])?></td>                 
           </tr> 
    
       <?php }?> 
                          
        </table>          
        
        
        
         </br>  </br>
        
         <h2 class="style" style="color:#099; padding-bottom:15px">Not Active</h2> 
         
         
          <table border="1" cellpadding="1" cellspacing="1" width="100%">
          <tr  style="height:35px; background:#6CF; line-height:35px; font-weight:bold; font-size:20px">
            <td align="center" width="60%"><strong>User</strong></td>
            <td align="center" width="20%"><strong>Plan</strong></td>
            <td align="center" width="20%"><strong>Up Bill</strong></td> 
                             
          </tr>
      
		  <?php for($h=0;$h<count($danhsach1);$h++){?>
          
               <tr class="mau">               
                    <td align="center"><a href="info/<?=$danhsach1[$h]['id']?>/notactive.html"><?=$danhsach1[$h]['user']?></a></td>
                    <td align="center" style="color:#f00"><?=number_format($danhsach1[$h]['goi'],0, '.', ',')?>$</td>
                    <td align="center" style="color:#f00"><a href="up-bill/<?=$danhsach1[$h]['id']?>/upbill.html">Up Bill</a></td>                 
               </tr> 
        
           <?php }?>       
     
                   
        </table> 
        
         </br>  </br> 
        
          <h2 class="style" style="color:#f00; padding-bottom:15px; font-size:19px; margin-top:30px">BILL IS WAITING</h2>
          <table border="1" cellpadding="1" cellspacing="1" width="100%">
          <tr  style="height:35px; background:#6CF; line-height:35px; font-weight:bold; font-size:20px">
            <td align="center" width="30%"><strong>User</strong></td>
            <td align="center" width="30%"><strong>View bill</strong></td>
                          
          </tr>
      
          <?php
		   for($h=0;$h<count($dsbill);$h++){
			   
		  ?>
      
           <tr class="mau">
                <td align="center" ><?=$dsbill[$h]['user1']?></td>               
                <td align="center"><a href="viewbill/<?=$dsbill[$h]['id']?>.html">View</a></td>
                           
           </tr> 
    
       <?php }?>     
         
                   
        </table>    
        
         
    </div>
    
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
 </style>

