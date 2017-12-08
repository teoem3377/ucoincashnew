


<script type="text/javascript">

	$(document).ready(function() {	
	//Kiem tra user
	  	$('#usernameLoading').hide();
		$('#tendangnhap').blur(function(){
			 $('#usernameLoading').show();
			 $.post("check.php", {
			 username: $('#tendangnhap').val()
			}, function(response){
			  $('#usernameResult').fadeOut();
			  setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
		  });
			return false;
		});
	});
	
	function finishAjax(id, response) {
	  $('#usernameLoading').hide();
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	}; //finishAjax
		
		
	function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so

function kt() {				
			var listid="";
			$("input[name='linhvuc[]']").each(function(){						
			if (this.checked) { listid = listid+","+this.value;}
			})					
			listid=listid.substr(1);
			return listid;	 
}

function check(){
	var frm 	= document.frmDK;
	
	
			
			if(frm.tendangnhap.value=='') 
			{ 
				alert( "Bạn chưa điền tên đăng nhập." );
				frm.tendangnhap.focus();
				return false;
			}
			if(frm.matkhau.value=='') 
			{ 
				alert( "Bạn chưa điền mật khẩu." );
				frm.matkhau.focus();
				return false;
			}
			if(frm.xacnhanmatkhau.value=='') 
			{ 
				alert( "Bạn chưa điền lại mật khẩu." );
				frm.xacnhanmatkhau.focus();
				return false;
			}
			
			if(frm.matkhau.value != frm.xacnhanmatkhau.value) 
			{ 
				alert( "Nhập lại mật khẩu không khớp nhau" );
				frm.xacnhanmatkhau.focus();
				return false;
			}
			
			if(frm.hovaten.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên." );
				frm.hovaten.focus();
				return false;
			}
			if(frm.sodienthoai.value=='') 
			{ 
				alert( "Bạn chưa điền số điện thoại." );
				frm.sodienthoai.focus();
				return false;
			}
			
			if(!IsNumeric(frm.sodienthoai.value)) 
			{ 
				alert( "Vui lòng nhập đúng số điện thoại." );
				frm.sodienthoai.focus();
				return false;
			}
			
			if(frm.diachi.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ." );
				frm.diachi.focus();
				return false;
			}
			if(frm.email.value=='') 
			{ 
				alert( "Bạn chưa điền email." );
				frm.email.focus();
				return false;
			}
			
			if(!validEmail(frm.email)){
				alert('Vui lòng nhập đúng địa chỉ email');
				frm.email.focus();
				return false;
			}
			
						
		
			
	frm.submit();
	
	
}






		
</script>




    <div class="tieude" >ĐĂNG KÝ THÀNH VIÊN</div>
    <div class="thongtin_bando">
    	<div class="dangky">
        	
          <form name="frmDK" id="frmDK" method="post" action="dangky.html" enctype="multipart/form-data">          
          <div class="dangky1">
          	<div class="dangky2">Thông tin tài khoản</div>
            <table border="0" cellpadding="0" cellspacing="0" class="table">
              <tr>
                <td class="tieude_left" align="right">Tên đăng nhập</td>
                <td >&nbsp;&nbsp;<input type="text" name="tendangnhap" id='tendangnhap' class="textbox"  /> *
                <span id="usernameLoading"><img src="./images/ajax-loader.gif" /></span>
	            <span id="usernameResult"></span> 
                </td>
              </tr>
              <tr>
                <td align="right" class="tieude_left">Mật khẩu</td>
                <td>&nbsp;&nbsp;<input type="password" name="matkhau" id='matkhau' class="textbox"  /> *</td>
              </tr>
              <tr>
                <td align="right" class="tieude_left">Xác nhận MK</td>
                <td>&nbsp;&nbsp;<input type="password" name="xacnhanmatkhau" id='xacnhanmatkhau' class="textbox"  /> *</td>
              </tr>
            </table>
          </div>
          
          <div class="dangky1">
          	<div class="dangky2">Thông tin cá nhân</div>
            <table  border="0" cellpadding="0" cellspacing="0" class="table">
             
              <tr>
                <td align="right" class="tieude_left">Avatar</td>
                <td>&nbsp;&nbsp;<input type="file" name="file_dk" class="avatar" /> </td>
              </tr>
                
              <tr>
                <td  align="right" class="tieude_left">Giới tính</td>
                <td >&nbsp;&nbsp;
                  <input type="radio" checked="checked" name="gioitinh" value="1" /> Nam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gioitinh" value="0" /> Nữ
                </td>
              </tr>
              <tr>
                <td align="right" class="tieude_left">Họ và tên</td>
                <td>&nbsp;&nbsp;<input type="text" name="hovaten" id='hovaten' class="textbox"  /> *</td>
              </tr>
              <tr>
                <td align="right" class="tieude_left">Điện thoại</td>
                <td>&nbsp;&nbsp;<input type="text" name="sodienthoai" id='sodienthoai' class="textbox"  /> *</td>
              </tr>            
             
               <tr>
                <td align="right" class="tieude_left">Địa chỉ</td>
                <td>&nbsp;&nbsp;<input type="text" name="diachi" id='diachi'  class="textbox" />*</td>
              </tr>
               <tr>
                <td align="right" class="tieude_left">Email</td>
                <td>&nbsp;&nbsp;<input type="text" name="email" id='email'  class="textbox" />*</td>
              </tr>
              
               <tr>
                <td align="right" class="tieude_left">CMND</td>
                <td>&nbsp;&nbsp;<input type="text" name="cmnd" id='cmnd'  class="textbox" /></td>
              </tr>
              
               <tr>
                <td align="right" class="tieude_left">Yahoo</td>
                <td>&nbsp;&nbsp;<input type="text" name="yahoo" id='yahoo'  class="textbox" /></td>
              </tr>
              
               <tr>
                <td align="right" class="tieude_left">Skype</td>
                <td>&nbsp;&nbsp;<input type="text" name="skype" id='skype'  class="textbox" /></td>
              </tr>
              
               <tr>
                <td align="right" class="tieude_left">Website</td>
                <td>&nbsp;&nbsp;<input type="text" name="website" id='website'  class="textbox" /></td>
              </tr>
             
               <tr>
                <td align="right" class="tieude_left">Giới thiệu</td>
                <td>&nbsp;&nbsp;<textarea name="gioithieu" cols="50" rows="4"  id="gioithieu" class="textbox"></textarea> </td>
              </tr>
              
              <tr>
                <td >&nbsp;</td>
                <td align="left" class="sizechunut">
                	<input class="button" type="button" value="Đăng ký"  onclick="check()"  />&nbsp;&nbsp;
                    <input class="button" type="button" value="<?=_nhaplai?>" onclick="document.frmDK.reset();" />
                </td>
              </tr>
            </table>
          </div>
          
           
          </form>
        </div>
        
    </div>    
 
 
 
 
 <style type="text/css">
 .dangky {
	 width:480px; 
	 margin:auto; 
	 padding:0 0 20px 10px;
 }
 .tieude_left{
	 height:32px;
	 width:100px;
 }
 .textbox{
	 width:300px;
	 -moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;
	border:1px solid #CCC;	
	height:22px;	
 }
 .table {
	 font-size:13px;
	 width:100%;
 }
 .dangky1 {
	 float:left;
	 width:100%;
	 margin:13px 0;
 }
 
@media (min-width: 480px) and (max-width: 639px) {
	
.dangky {
	 width:350px; 
	 margin:auto; 
	 padding:0 0 20px 10px;
 }
 .tieude_left{
	 height:32px;
	 width:90px;
 }
 .textbox{
	 width:240px;
	
 }
 .table {
	 font-size:12px;
	 width:100%;
 }
 
}
 
 @media (min-width: 320px) and (max-width:479px) {

.avatar{
		width:250px;
		font-size:11px;
		margin-left:3px;
	}	
.dangky {
	 width:270px; 
	 margin:auto; 
	 padding:0 0 20px 8px;
 }
 .tieude_left{
	 height:32px;
	 width:80px;
 }
 .textbox{
	 width:170px;
	
 }
 .table {
	 font-size:11px;
	 width:100%;
 }
 
}

@media (max-width:319px) {
	
	.dangky {
	 width:260px; 
	 margin:auto; 
	 padding:0 0 20px 5px;
 }
 .tieude_left{
	 height:32px;
	 width:80px;
 }
 .textbox{
	 width:180px;
	
 }
 .table {
	 font-size:10px;
	 width:100%;
 }
 
}
 
 
 .dangky2 {
	 float:left;
	 width:98%;
	 padding-left:2%;
	 padding-bottom:7px;
	 font-weight:bold;	
	 border-bottom:1px solid  #000;
	 margin-bottom:10px;
 }
 
 
 </style>
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 