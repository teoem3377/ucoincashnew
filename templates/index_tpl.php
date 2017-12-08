
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script type="text/javascript">
		$(document).ready(function(e) {  
			
			$('#dangnhap9').click(function(e) {   
				if(document.frmDN.tendangnhap.value==''){
							
						alert('Vui lòng nhập mã số');					
						document.frmDN.tendangnhap.focus();					
						return false;	
					}
					if(document.frmDN.matkhau.value==''){
						alert('Vui lòng nhập mật khẩu');
						document.frmDN.matkhau.focus();
						return false;	
					}
					document.frmDN.submit();
			
			});
			
			
			
			$('#forget').click(function(e) {   
				location.href = "forget.html";
				loadPage(document.location);		
			
			});
			
			$('#rule').click(function(e) {   
				location.href = "rule.html";
				loadPage(document.location);		
			
			});				
			
					
		});
		
        
</script>


  <?php if($_SESSION['login']['id']==''){?>  

        
        
        
          <div style="height:2px; margin-top:7%; width:100%"></div>
       	
          <form name="frmDN" id="frmDN" method="post" action="dangnhap.html" enctype="multipart/form-data">           
              <div class="box">             
                         
                   <div class="box2"> 
                       <div class="box3"><img src="./images/logo.png" width="250" height="130" /></div>                     
                        <div class="box4"><input type="text" name="tendangnhap" id="tendangnhap" class="textbox" placeholder="Mã số"  /></div>
                        <div class="box5"><input type="password" name="matkhau" id="matkhau" class="textbox1" placeholder="Mật khẩu"   /> </div>
                        <div class="box6">
                             <input class="button" type="submit"  value="Đăng nhập" id="dangnhap9" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div> 
                        <!--
                         <div class="box6">
                             <input class="button1" type="button" value="Bạn quên mật khẩu?" id="forget" />                           
                        </div> 
                        
                        <div class="box6">
                             <input class="button1" type="button" style="color:#00f; font-style:italic" value="Thông tin luật chơi" id="rule" />                           
                        </div> 
                        -->
                         <div class="box7"><img src="./images/key1.png" width="300" height="140" /></div> 
                   </div> 
              </div>          
          </form> 
          
 
                 
        
 <?php } else {

	$sql = "select * from #_about ";		
	$d->query($sql);
	$about = $d->fetch_array();

?>
<div class="khungbao" >
  <div class="tieude" >THÔNG BÁO</div>
  <div class="noidungs">
      
           <div style="font-size:15px !important; padding:0 15px; line-height:25px;"> <?=$about['noidung_vi']?></div>
       
    
</div>
</div>


   
 
 
 <?php }?>
 
 
 
  <style type="text/css">
  
 .box{
	 width:350px;
	 height:420px;
	 margin:auto;
	 background:#fff ;
	 border-radius:7px;
	 border:#000 3px solid;
	 padding:20px 0;
 }

 .box2{
	 float:left;
	 width:350px;	
 }
 .box3{
	margin:0 0 0 40px;
 }
 .box4{
	 margin:10px 0 0 40px;
 }
 .box5{
	 margin:10px 0 0 40px;
 }
  .box6{
	 margin:10px 0 0 40px;
 }
  .box7{
	 margin:10px 0 0 23px;
 }
 
 
 .button{
	 width:262px;
	 padding:9px 0;
	 text-align:center;
	 background:#00f;
	 color:#ffffff;
	 font-size:15px;
	
 }
 .button:hover{
	 background:#333;	
	 cursor:pointer;
	
 }
 
  .button1{
	 width:250px;
	 padding:4px 0;
	 background:none;
	 border:none;
	 font-weight:bold;
	 color:#f00;
	 font-size:15px;
 }
 .button1:hover{
	
	
	 cursor:pointer;
	 text-decoration:underline;
 }
 
  
 
 .textbox{
	width:250px;	
	border:1px solid  #00f;	
	height:32px;
	padding-left:10px;
	background:url(./images/hinh/user.png) no-repeat right center ;
	background-size:23px 23px;	
 }
 
 .textbox1{
	width:250px;	
	border:1px solid  #00f;	
	height:32px;
	padding-left:10px;
	background:url(./images/hinh/pas.png) no-repeat right center;
	background-size:23px 23px;	
 }
 

 </style>
 
 
 
 
 
 
 
 
 
 
 
 