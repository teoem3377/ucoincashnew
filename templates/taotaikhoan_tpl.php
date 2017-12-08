

<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtra(){
	
	
	
	if(isEmpty(document.getElementById('hovaten'), "Please enter a full name.")){
		document.getElementById('hovaten').focus();
		return false;
	}
	if(isEmpty(document.getElementById('user'), "Please enter user.")){
		document.getElementById('user').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('matkhau'), "Please enter a password.")){
		document.getElementById('matkhau').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('xacnhanmatkhau'), "Please confirm your password.")){
		document.getElementById('xacnhanmatkhau').focus();
		return false;
	}
	
	if(frmTM.matkhau.value != frmTM.xacnhanmatkhau.value) 
			{ 
				alert( "Confirm password mismatch!" );
				frmTM.xacnhanmatkhau.value='';
				frmTM.xacnhanmatkhau.focus();				
				return false;
			}
	
	
	if(isEmpty(document.getElementById('email'), "Please enter email.")){
		document.getElementById('email').focus();
		return false;
	}
	

	if(!check_email(document.frmTM.email.value)){
		alert("Email is invalid");
		document.frmTM.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "Please enter the phone number.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	var len = document.frmTM.dienthoai.value.length;
	if( len >11 || len <10){
		alert("Phone number is malformed");
		document.frmTM.dienthoai.focus();
		return false;
	}
	
	
	/*
	if(isEmpty(document.getElementById('bitcoin'), "Please confirm your BLOCKCHAIN")){
		document.getElementById('bitcoin').focus();
		return false;
	}
	
	
	if(isEmpty(document.getElementById('chutaikhoan'), "Vui lòng nhập chủ tài khoản ngân hàng Vietcombank.")){
		document.getElementById('chutaikhoan').focus();
		return false;
	}
	*/
	if(isEmpty(document.getElementById('diachi'), "Please enter an address.")){
		document.getElementById('diachi').focus();
		return false;
	}
	
		
	
	if(isEmpty(document.getElementById('capcha'), "Please enter a captcha.")){
		document.getElementById('capcha').focus();
		return false;
	}
	
	
	document.frmTM.submit();
}
</script>


<script type="text/javascript">

	$(document).ready(function() {	
	//Kiem tra user
	 	$('#user').blur(function(){
			 $.post("check1.php", {
			 user: $('#user').val(),			 
			}, function(response){
			  $('#userResult').fadeOut();
			  setTimeout("finishAjax('userResult', '"+escape(response)+"')", 400);
		  });
			return false;
		});
	});
	
	function finishAjax(id, response) {
	   $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	}; //finishAjax
		
	
</script>

<script type="text/javascript">

	$(document).ready(function() {	
	//Kiem tra user
	  
		$('#email').blur(function(){			
			 $.post("check2.php", {
			 email: $('#email').val()
			}, function(response){
			  $('#emailResult').fadeOut();
			  setTimeout("finishAjax('emailResult', '"+escape(response)+"')", 400);
		  });
			return false;
		});
	});
	
	function finishAjax(id, response) {
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	}; //finishAjax
		
	
</script>



<?php 
if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') {
?>



<div class="main">
 
     <div class="contact">
     
         <p style="font-weight:bold; font-size:19px ">Link send: </p>
         
         <p style="height:60px; line-height:35px; font-weight:bold; font-size:19px; color:#f00 "><?=$config_url?>/creat/<?=$_SESSION['login']['maso']?>/link.html</p>
         
         
         <h2 class="style" style="color:#099; padding-bottom:15px">CREATE NEW ID</h2> 
         <div class="contact-form">
            <form name="frmTM" id="frmTM" method="post" action="creates.html" enctype="multipart/form-data">          
                
                 <div>
                    <span><label>PLANS</label></span>
                    <span>
                    <select  name="goi" name="goi" style="height:35px; width:100%">
                         <option value="20">20$</option>
                         <option value="100">100$</option>
                         <option value="300">300$</option>
                         <option value="500">500$</option> 
                         <option value="1000">1,000$</option>
                         <option value="3000">3,000$</option>
                         <option value="5000">5,000$</option> 
                         <option value="10000">10,000$</option>
                         <option value="30000">30,000$</option>
                         <option value="50000">50,000$</option>             
                    </select>
                    </span>
                </div>
                
                <div>
                    <span><label>FULL NAME</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" ></span>
                </div>
                
                <div>
                    <span><label>USER</label></span>
                     <span id="userResult" style="color:#f00"></span> 
                    <span><input name="user" id="user" type="text" ></span>
                </div>
                
                 <div>
                    <span><label>PASSWORD</label></span>
                    <span><input name="matkhau" id="matkhau" type="password"></span>
                </div>
                
                 <div>
                    <span><label>CONFIRM PASSWORD</label></span>
                    <span><input name="xacnhanmatkhau" id="xacnhanmatkhau" type="password"></span>
                </div>
                
                 <div>
                    <span><label>EMAIL</label></span>
                    
                    <span><input name="email" id="email" type="text"></span>
                </div>
                
                <div>
                    <span><label>PHONE</label></span>
                    <span><input name="dienthoai" id="dienthoai" type="number"></span>
                </div>
               
                <div>
                    <span><label>COUNTRY</label></span>
                    <span>
                    <select  name="quocgia" name="quocgia" style="height:35px; width:100%">
                         <option value="Australia">Australia</option>
                         <option value="Austria">Austria</option>
                         <option value="Belgium">Belgium</option>
                         <option value="Brazil">Brazil</option>
                         <option value="Brunei">Brunei</option>
                         <option value="Cambodia">Cambodia</option>
                         <option value="Canada">Canada</option>
                         <option value="Chile">Chile</option>
                         <option value="China">China</option>
                         <option value="Czech">Czech</option>
                         <option value="Egypt">Egypt</option>
                         <option value="France">France</option>
                         <option value="Finland">Finland</option>
                         <option value="Greece">Greece</option>
                         <option value="India">India</option>
                         <option value="Indonesia">Indonesia</option>
                         <option value="Italy">Italy</option>
                         <option value="Japan">Japan</option>
                         <option value="Korea">Korea</option>
                         <option value="Laos">Laos</option>
                         <option value="Mexico">Mexico</option> 
                         <option value="Peru">Peru</option>
                         <option value="Philippines">Philippines</option>
                         <option value="Russia">Russia</option>
                         <option value="Singapore">Singapore</option>
                         <option value="Spain">Spain</option>
                         <option value="Sweden">Sweden</option>
                         <option value="Taiwan">Taiwan</option>
                         <option value="Thailand">Thailand</option>
                         <option value="Turkey">Turkey</option>
                         <option value="UnitedKingdom">United Kingdom</option>
                         <option value="UnitedStates">United States</option>
                         <option value="Uruguay">Uruguay</option>
                         <option value="Vietnam">Vietnam</option>                        
                    </select>
                    </span>
                </div>
                
                <div>
                    <span><label>ADDRESS</label></span>
                    <span><input name="diachi" id="diachi" type="text" ></span>
                </div>
                
                 <div>
                    <span><label>WALLET DOGECOIN</label></span>
                    <span><input name="dogecoin" id="dogecoin" type="text"></span>
                </div>
                
                 <div>
                    <span><label>QR CODE DOGCOIN</label></span>
                    <span><input type="file" name="file" class="avatar" /></span>
                </div>
                
                <div>
                    <span><label>CAPTCHA <img style="margin:1px 0 0 30px"  src="capcha.php" title="" alt="" /></label> </span>
                    <span><input name="capcha" id="capcha" type="text" ></span>
                </div>
                
                <div>
                     <span><input type="button" value="Create" onClick="kiemtra();"  /></span>
                   
                </div>
             </form>
         </div>
    
    </div>
    
</div>

<div class="clear"> </div>		






   <?php }?>
 
