
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script type="text/javascript">
		$(document).ready(function(e) {  
			
			$('#dangnhap8').click(function(e) { 
			  
			 if(isEmpty(document.getElementById('email'), "Vui lòng nhập email.")){
				document.getElementById('email').focus();
				return false;
			   }
	
			if(!check_email(document.frmDMK.email.value)){
					alert("Email không đúng");
					document.frmDMK.email.focus();
					return false;
				}
				
			if(isEmpty(document.getElementById('capcha'), "Vui lòng nhập mã an toàn.")){
				document.getElementById('capcha').focus();
				return false;
			}
	
	    	document.frmDMK.submit();
			
			});
					
		});
		
        
</script>


          <div style="height:2px; margin-top:7%; width:100%"></div>
       	
          <form name="frmDMK" id="frmDMK" method="post" action="forgets.html" enctype="multipart/form-data">           
              <div class="box">                
                   <div class="box1"></div>               
                   <div class="box2">
                        <div class="box3">Quên mật khẩu</div>
                        <div class="box4"><input type="text" name="email" id="email" class="textbox" placeholder="Email"  /></div>
                        <div class="box4"><input type="text" name="capcha" id='capcha'   class="textbox1"  placeholder="Captcha"/>&nbsp;&nbsp;<img style="margin-bottom:-8px" src="capcha.php" title="" alt="" /></div>
                        <div class="box6">
                             <input class="button" type="submit"  value="Gửi yêu cầu" id="dangnhap8" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </div> 
                        
                   </div> 
              </div>          
          </form>        
        
 
 
 
 
 
 <style type="text/css">
 .box{
	 width:520px;
	 height:220px;
	 margin:auto;
	 background:#fff;
	 border-radius:7px;
	 border:#000 3px solid;
	 padding:20px 0;
 }
 .box1{
	 float:left;
	 width:250px;
	 height:230px;
	 background:url(./images/hinh/forget.png) no-repeat;
 }
 .box2{
	 float:left;
	 margin-top:10px;	
 }
 .box3{
	 padding: 10px 0 20px 0;
	 font-size:25px;
	 font-weight:bold;
	 color:#000;
	 font-family:"Times New Roman", Times, serif;
	
 }
 .box4{
	 margin-bottom:12px;
 }
 .box5{
	 margin-bottom:12px;
 }
 
 
  .button{
	 width:100%;
	 padding:7px 0;
	 text-align:center;
	 background:#000;
	 color:#ffffff;
	 font-size:14px;
	
 }
 .button:hover{
	 background:#0FF;	
	 cursor:pointer;
	 color:#000000;
 }
 
  .button1{
	 padding:4px 15px;
	
 }
 .button1:hover{
	 background:#06F;
	 color:#ffffff;
	 cursor:pointer;
 }
 
  
 
 .textbox{
	width:228px;	
	border:1px solid  #552b00;	
	height:32px;
	padding-left:10px;
	background:url(./images/hinh/email.png) no-repeat right center #fff ;
	background-size:23px 23px;	
 }
 
 .textbox1{
	width:120px;	
	border:1px solid  #552b00;	
	height:30px;
	padding-left:10px;	
 }
 

 </style>
 
 
 
 
 
 
 
 
 
 
 
 