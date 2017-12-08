<script>
function check3(){
	var frm 	= document.frmDMK;
	
			
			if(frm.matkhaucu.value=='') 
			{ 
				alert( "Please enter old password." );
				frm.matkhaucu.focus();
				return false;
			}
			if(frm.matkhaumoi.value=='') 
			{ 
				alert( "Please enter a new password." );
				frm.matkhaumoi.focus();
				return false;
			}
			
			if(frm.matkhaumoi.value != frm.xacnhanmatkhau.value) 
			{ 
				alert( "Confirm password mismatch" );
				frm.xacnhanmatkhau.focus();
				return false;
			}
	
	frm.submit();
	
	
}


		
</script>

   
<?php 
	if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') { 
?>	
    
    
    
    
<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">CHANGE PASSWORD</h2> 
         <div class="contact-form">
             <form name="frmDMK" id="frmDMK" method="post" action="changepass.html" enctype="multipart/form-data">  
               
                <div>
                    <span><label>OLD PASSWORD</label></span>
                    <span><input name="matkhaucu" id="matkhaucu" type="password" ></span>
                </div>
                
                <div>
                    <span><label>NEW PASSWORD</label></span>
                    <span><input name="matkhaumoi" id="matkhaumoi" type="password" ></span>
                </div>
                
                 <div>
                    <span><label>CONFIRM NEW PASSWORD</label></span>
                    <span><input name="xacnhanmatkhau" id="xacnhanmatkhau" type="password" ></span>
                </div>
                
                <div>
                    <span><input type="button" class="" value="Change"  id="capnhat1" onclick="check3()"></span>
                </div>
             </form>
         </div>
    
    </div>
    
</div>

<div class="clear"> </div>	
    
    
  
<?php } ?>      

 
