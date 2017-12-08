
<?php 

@$id =  addslashes($_GET['id']);


$sqlbill = "select * from #_rutbonus where id=".$id;	

	
$d->query($sqlbill);
$bill = $d->fetch_array();
$phi=2;

?>



<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">Detail Withdrawn</h2> 
         <div class="contact-form">
              <form name="frmR" id="frmR" method="post" action="withdraws.html" enctype="multipart/form-data"> 
                   
                <div>
                    <span><label>Withdrawal amount ($)</label></span>
                    <span><input type="text" value="<?=$bill['sotien']?>"  readonly='readonly'/> </span>
                </div>
               
               <div>
                    <span><label>Fee ($)</label></span>
                    <span><input type="text" value="<?=$phi?>"  readonly='readonly'/> </span>
                </div>
               
                <div>
                    <span><label>Real money ($)</label></span>
                    <span><input style="color:#f00" type="text" value="<?=($bill['sotien']-$phi)?>"  readonly='readonly'/> </span>
                </div>
                
                <div>
                    <span><label>Your Blockchain</label></span>
                    <span><input type="text"  value="<?=$bill['vi']?>"  readonly='readonly' /> </span>
                </div>
                
                 <div>
                  <span><label>Your QR</label></span>
                 <img src="<?=_upload_product_l.$bill['maqr']?>" width="150" height="150"/>
                 </div>
                                
             
               <!--
               
               

                <div>
                    <span><label>Vietcombank account number</label></span>
                    <span><input type="text"  value="<?=$bill['taikhoan']?>"  readonly='readonly' /> </span>
                </div>
                
                <div>
                    <span><label>Vietcombank account name</label></span>
                    <span><input type="text"  value="<?=$bill['chutaikhoan']?>"  readonly='readonly' /> </span>
                </div>
               
              -->
                
                <div>
                    <span><label>Feedback of Admin</label></span>
                    <span><input type="text"  value="<?=$bill['phanhoi']?>"  readonly='readonly' /> </span>
                </div>
               
             </form>
         </div>
         
         <?php if($bill['photo']!=''){?>
         <img src="<?=_upload_product_l.$bill['photo']?>" width="100%" /> 
         <?php }?>
    </div>
    
</div>

<div class="clear"> </div>


 
 
 
 
 
