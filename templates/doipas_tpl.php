

<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtra(){
	
	
	
	if(isEmpty(document.getElementById('matkhau'), "Vui lòng nhập mật khẩu")){
		document.getElementById('matkhau').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('nguoinhan'), "Vui lòng mã số người cần đổi.")){
		document.getElementById('nguoinhan').focus();
		return false;
	}
	
	
	document.frmCP.submit();
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
					for($i=1;$i<count($mang);$i++){
						echo '"'.$mang[$i].'-'.get_ten($mang[$i]).'",';
					}
				?>
				
			];
			$( "#nguoinhan" ).autocomplete({
				source: availableTags
			});
		});
	</script>   
 <!--AutoCompelete--> 
 <script>function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>

 <?php 
		if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') { 
		
		
		
?>	
<div class="khungbao" >
  <div class="tieude" >ĐỔI MẬT KHẨU CẤP DƯỚI</div>
  <div class="noidungs">
  
        <div class="dangky"> 
        
        
        
           <form name="frmCP" id="frmCP" method="post" action="doipass.html" enctype="multipart/form-data"> 
            <table width="345"  border="0" cellpadding="0" cellspacing="0" class="table">
              
               <tr>
                <td align="right" class="tieude_left">Mã số người cần đổi </td>
                <td>&nbsp;&nbsp;<input type="text" name="nguoinhan" id='nguoinhan' onKeyPress="doEnter(event,'nguoinhan');"    class="textbox"   /> </td>
              </tr> 
              
               <tr>
                <td align="right" class="tieude_left">Mật khẩu </td>
                <td>&nbsp;&nbsp;<input type="text" name="matkhau" id='matkhau'  class="textbox" value=""   /> </td>
              </tr>
                        
               
              <tr>
                <td >&nbsp;</td>
                <td align="left" class="sizechunut">
                	<input class="button" type="button" value="Đổi mật khẩu" onClick="kiemtra();"  />
                </td>
              </tr>
              
            </table>         
           
          </form> 
    
        
         
        
      </div>
   
 
 <?php }?>
 
 </div>
 </div>
 
 <style type="text/css">
 .dangky {
	 width:600px; 
	 margin:auto; 
	 padding:5px 0 45px 0px;
	
 }
 .tieude_left{
	 height:40px;
	 width:150px;
	 padding-right:10px;
	
 }
 .textbox{
	width:350px;
	border:1px solid #999;	
	height:32px;
	padding-left:5px;
	background: #CDCDCD;
	 font-size:15px;
	 font-weight:bold;
		
 }
 .textbox1{
	width:237px;
	border:1px solid #999;	
	height:32px;
	padding-left:5px;
	margin-top:-5px;
	 font-size:15px;
	 font-weight:bold;
		
 }
 .table {
	 font-size:15px;
	 width:100%;
 }
 .button{
	 padding:8px 138px;
	 margin: 10px 0 0 10px;
	 background:#00f;
	 color:#ffffff;
	 font-size:16px;
	 border:none;
	 
 }
 .button:hover{
	 cursor:pointer;
	 background:#000;
 }
 .datlenh{
	 padding:8px 8px;
	 background:#00F;
	 color:#ffffff;
	 font-weight:bold;
	
 }
 .datlenh:hover{
	 background:#f00;
 }
 
 </style>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 