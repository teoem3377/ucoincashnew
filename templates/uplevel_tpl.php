
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtrax(){
	
	 var x = document.frmUP.file.value ;
	 if(x == '') { 
			alert( "You have no bill !" );							
			return false;
		}
	
	
	document.frmUP.submit();
}
</script>



<?php
   
   
	if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu') {
	

    $sqlbill = "select * from #_upbill where maso='".$_SESSION['login']['maso']."' order by id desc";
	$d->query($sqlbill);
	$dsbill = $d->result_array();

?>



<div class="main">
 
     <div class="contact">
     
        <p class="f_para" style="color:#f00;">19oQBcCT4hwsaS785K1rhGre6okq2Zkvki</p>
         <p> <img src="images/qr.PNG" width="200" height="200"></p></br>
               
        
         <h2 class="style" style="color:#099; padding-bottom:15px">UP LEVEL</h2> 
         <div class="contact-form">
             <form name="frmUP" id="frmUP" method="post" action="uplevels.html" enctype="multipart/form-data"> 
             
                  <div>
                    <span><label>PLANS WANT UP</label></span>
                    
                    
                    <label>
                    <input type="radio" class="option-input radio" name="goi" value="100" />
                    <span class="dinhkhung">100$</span>                   
                    <input type="radio" class="option-input radio" name="goi" value="300" />
                    <span class="dinhkhung">300$</span>                   
                    <input type="radio" class="option-input radio" name="goi" value="500" />
                    <span class="dinhkhung">500$</span>
                    </label>
                    
                    <label>
                    <input type="radio" class="option-input radio" name="goi" value="1000" />
                    <span class="dinhkhung1">1,000$</span>
                    <input type="radio" class="option-input radio" name="goi" value="3000" />
                    <span class="dinhkhung1">3,000$</span>
                    <input type="radio" class="option-input radio" name="goi" value="5000" />
                    <span class="dinhkhung1">5,000$</span>
                    </label>
                    
                    <label>
                    <input type="radio" class="option-input radio" name="goi" value="10000" />
                    <span class="dinhkhung2">10,000$</span>
                    <input type="radio" class="option-input radio" name="goi" value="30000" />
                    <span class="dinhkhung2">30,000$</span>
                    <input type="radio" class="option-input radio" name="goi" value="50000" />
                    <span class="dinhkhung2">50,000$</span>
                    </label>
                                       
                </div>
                
                <div>
                    <span><label>BILL</label></span>
                    <span><input type="file" name="file" class="avatar" /></span>
                </div>
              
                <div>   
                    <span><input class="button" type="button" value="Up level"  onClick="kiemtrax();" /></span>
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
 
 
 @keyframes click-wave {
  0% {
    height: 30px;
    width: 30px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 30px;
  width: 30px;
  transition: all 0.15s ease-out 0s;
  background:#999;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background:#40e0d0;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 30px;
  width: 30px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 26.66667px;
  text-align: center;
  line-height: 30px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}


.dinhkhung{
	text-align:center;
	background:#F30;
	color:#fff;
	padding:5px 25px;
}

.dinhkhung1{
	line-height:30px;
	text-align:center;
	background:#060;
	color:#fff;
	padding:5px 19px;
}

.dinhkhung2{
	line-height:30px;
	text-align:center;
	background:#609;
	color:#fff;
	padding:5px 15px;
}

body label {
  display: block;
  line-height: 40px;
}

 
 
 
 
 
 
 </style>






 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 