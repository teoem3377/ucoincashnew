

<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtra(){
	
		
	if(isEmpty(document.getElementById('quanly'), "Please enter user manage.")){
		document.getElementById('quanly').focus();
		return false;
	}
	
	
	document.frmTM.submit();
}
</script>



<!--AutoCompelete--> 

	<script type="text/javascript" src="./aworld/media/scripts/jquery-ui-1.10.3.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="./aworld/media/css/jquery-ui-1.10.3.custom.css"/>
	<script>
		$(function() {		
			$( "#accordion" ).accordion();
			var availableTags = [
				
				<?php
				    $mang=capduoi($_SESSION['login']['maso']);
					
					for($i=0;$i<count($mang);$i++){
						if(soconquanly($mang[$i]) < 2){					
						echo '"'.get_user($mang[$i]).'-'.get_ten($mang[$i]).'",';
						}
					}
				?>
				
			];
			$( "#quanly" ).autocomplete({
				source: availableTags
			});
		});
	</script>   
 <!--AutoCompelete--> 




<?php 

@$id =  addslashes($_GET['id']);


$sqluser = "select * from #_product1 where id=".$id;	
$d->query($sqluser);
$user = $d->fetch_array();


if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') {
?>





<div class="main">
 
     <div class="contact">
     
          <h2 class="style" style="color:#099; padding-bottom:15px">UP TREE</h2> 
         <div class="contact-form">
            <form name="frmTM" id="frmTM" method="post" action="uptrees.html" enctype="multipart/form-data">          
                
                  <input name="id_user" id="id_user" type="hidden" value="<?=$id?>" >              
                 <div>
                    <span><label>USER</label></span>
                     <span id="userResult" style="color:#f00"></span> 
                    <span><input name="user" id="user" type="text"  readonly="readonly" value="<?=$user['user']?>" ></span>
                </div>
                
                
                <div>
                    <span><label>FULL NAME</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" readonly="readonly" value="<?=$user['hoten']?>" ></span>
                </div>
                
                <div>
                    <span><label>USER MANAGE</label></span>
                    <span><input name="quanly" id="quanly" type="text" onKeyPress="doEnter(event,'quanly');"  class="textbox" ></span>
                </div>
                
               
                
                <div>
                     <span><input type="button" value="UP TREE" onClick="kiemtra();"  /></span>
                   
                </div>
             </form>
         </div>
    
    </div>
    
</div>

<div class="clear"> </div>		






   <?php }?>
 
