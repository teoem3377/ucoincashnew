
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtrax(){
	
	 var x = document.frmUP.file.value ;
	 if(x == '') { 
			alert( "You have no bill !" );							
			return false;
		}
	
	if(isEmpty(document.getElementById('quanly'), "Please enter user manage.")){
		document.getElementById('quanly').focus();
		return false;
	}
	
	document.frmUP.submit();
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
   
	if($_SESSION['login']['id']!="" && $id!="" &&  $_SESSION['login']['luxubu']=='luxubu') {
	
	
	$sqluser = "select * from #_product1 where id=".$id;	
	$d->query($sqluser);
	$user = $d->fetch_array();
   
    $sqlbill = "select * from #_upbill where maso='".$_SESSION['login']['maso']."' order by id desc";
	$d->query($sqlbill);
	$dsbill = $d->result_array();

?>



<div class="main">
 
     <div class="contact">
     
        <p class="f_para" style="color:#f00;">19oQBcCT4hwsaS785K1rhGre6okq2Zkvki</p>
         <p> <img src="images/qr.PNG" width="200" height="200"></p></br>
               
        
         <h2 class="style" style="color:#099; padding-bottom:15px">UP BILL</h2> 
         <div class="contact-form">
             <form name="frmUP" id="frmUP" method="post" action="upbills.html" enctype="multipart/form-data"> 
             
             <input name="id_user" id="id_user" type="hidden" value="<?=$id?>" >
               
                 <div>
                    <span><label>USER WILL ACTIVE</label></span>                   
                    
                   		<span><input type="text" name="noidung" id="noidung"  readonly="readonly" style="color:#000; font-weight:bold" value="<?=$user['user']?> - <?=$user['hoten']?>(<?=$user['goi']?>$)"/></span>
                    
                 </div>
               
               
               
                <div>
                    <span><label>BILL</label></span>
                    <span><input type="file" name="file" class="avatar" /></span>
                </div>
               
                <div>
                    <span><label>USER MANAGE</label></span>
                    <span><input name="quanly" id="quanly" type="text" onKeyPress="doEnter(event,'quanly');"  class="textbox" ></span>
                </div>
              
                <div>   
                    <span><input class="button" type="button" value="Up bill"  onClick="kiemtrax();" /></span>
                </div>
                
                
               
             </form>
         </div>
         
       
         
    
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






 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 