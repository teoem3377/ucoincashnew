
<?php 

@$id =  addslashes($_GET['tam']);

$sqlbill = "select photo,noidung from #_upbill where id=".$id;
	
$d->query($sqlbill);
$bill = $d->fetch_array();

?>



<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">BILL</h2> 
         <div class="contact-form">
             <form name="frmUP" id="frmUP" method="post" action="index.html" enctype="multipart/form-data"> 
                <div>
                    <span><label>Content</label></span>
                    <span><input style="font-weight:bold" type="text" name="noidung" id="noidung" readonly="readonly" value="<?=$bill['noidung']?>"/></span>
                   
                </div>
                
               
             </form>
         </div>
         
         <img src="<?=_upload_product_l.$bill['photo']?>" width="100%" /> 
    
    </div>
    
</div>

<div class="clear"> </div>


 
 
 
 
 
