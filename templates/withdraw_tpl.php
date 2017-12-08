
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtrax(){
	
	if(isEmpty(document.getElementById('sotien'), "Please enter the amount.")){
		document.getElementById('sotien').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('vi'), "Please enter Your Blockchain.")){
		document.getElementById('vi').focus();
		return false;
	}
	
	
		
	if(isEmpty(document.getElementById('capcha'), "Please enter a captcha.")){
		document.getElementById('capcha').focus();
		return false;
	}
	
	
		
	document.frmR.submit();
}
</script>



<script>function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>



<?php 
	if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu' &&  $_SESSION['login']['goi']>20) { 
	$conlai=0;
			
	
		$conlai=tongbonus($_SESSION['login']['maso'])-bonusdarut($_SESSION['login']['maso']);
	
			
	if($conlai<=0) $conlai=0;

?>





<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">DIRECT BONUS</h2> 
         
         <h2 class="style" style="font-size:25px">Current: <span style="color:#f00"><?=number_format(bonusconlai($_SESSION['login']['maso']),2, '.', ',')?> $</span></h2> 
         <p style="margin-bottom:20px"> -----------------------------------------------</p>
         
         <div class="contact-form">
              <form name="frmR" id="frmR" method="post" action="withdraws.html" enctype="multipart/form-data"> 
                   
                <div>
                    <span><label>Withdrawal amount ($)</label></span>
                    <span><input type="text" name="sotien" id="sotien" onkeypress='validate(event)'/> </span>
                </div>
                
              
              
                
                <div>
                    <span><label>Blockchain</label></span>
                    <span><input type="text" name="vi" id="vi" /> </span>
                </div>
              
               <!--
                <div>
                    <span><label>Code QR </label></span>
                    <span><input type="file" name="file" class="avatar" /></span>
                </div>
              
                              
              
                
                <p style="font-size:22px; color:#f00; font-weight:bold">OR</p>
                <div>
                    <span><label>Vietcombank account number</label></span>
                    <span><input type="number" name="taikhoan" id="taikhoan" /> </span>
                </div>
                
                <div>
                    <span><label>Vietcombank account name</label></span>
                    <span><input type="text" name="chutaikhoan" id="chutaikhoan" /> </span>
                </div>
                
                -->
                
                 <div>
                    <span><label>CAPTCHA <img style="margin:1px 0 0 30px"  src="capcha.php" title="" alt="" /></label> </span>
                    <span><input name="capcha" id="capcha" type="text" ></span>
                </div>
               
                <div>                    
                    <span><input class="button" type="button" value="Withdraw" onClick="kiemtrax();"   /></span>
                </div>
                
               
             </form>
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
 </style>



