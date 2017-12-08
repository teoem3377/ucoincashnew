

<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">INFORMATION SHOULD BE SAVED</h2> 
         <div class="contact-form">
            <form name="frmTM" id="frmTM" method="post" action="index.html" enctype="multipart/form-data">
              
                <div>
                    <span><label>PLANS</label></span>
                    <span><input name="plans" id="plans" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['goi']?>$" style="color:#f00; font-weight:bold"></span>
                </div>
                <div>
                    <span><label>FULL NAME</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['fullname']?>"></span>
                </div>
                
                  <div>
                    <span><label>USER</label></span>
                    <span><input name="user" id="user" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['user']?>"></span>
                </div>
                
                 <div>
                    <span><label>PASSWORD</label></span>
                    <span><input name="user" id="user" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['password']?>"></span>
                </div>
                
                <div>
                    <span><label>PHONE</label></span>
                    <span><input name="dienthoai" id="dienthoai" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['phone']?>"></span>
                </div>
                
                 <div>
                    <span><label>EMAIL</label></span>
                    <span><input name="email" id="email" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['email']?>"></span>
                </div>
              
                <div>
                    <span><label>COUNTRY</label></span>
                    <span><input name="quocgia" id="quocgia" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['quocgia']?>"></span>
                </div>
                <div>
                    <span><label>ADDRESS</label></span>
                    <span><input name="diachi" id="diachi" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['diachi']?>"></span>
                </div>
                
                <div>
                    <span><label>WALLET DOGECOIN</label></span>
                    <span><input name="dogecoin" id="dogecoin" type="text" class="textbox" readonly="readonly" value="<?=$_SESSION['tao']['vi']?>"></span>
                </div>
                
               
             </form>
         </div>
    
    </div>
    
</div>

<div class="clear"> </div>		











