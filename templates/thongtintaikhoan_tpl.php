
<?php 

    
	$sql_setting = "select * from #_product where id=".$_SESSION['login']['id'] ;  		
	$d->query($sql_setting);
	$taikhoan= $d->fetch_array();
	
		
?>

<div class="main" style="padding-top:20px">
   <?php  if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){?>
      <div style="float:left"><a  class="uplevel" href="uplevel.html">UP LEVEL</a></div>
      <div  style="float:left"><a  class="uplevel1" href="changepas.html">CHANGE PASS</a></div>
     
     <div class="contact" style="padding-top:40px">
     
         <h2 class="style" style="color:#099; padding-bottom:15px; ">INFORMATION</h2> 
         <div class="contact-form">
          
            <form name="frmTM" id="frmTM" method="post" action="taomoi.html" enctype="multipart/form-data">
               
               <div>
                    <span><label>MANAGER</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=get_ten($taikhoan['gioithieu'])?>"></span>
                </div>
                
               <div>
                    <span><label>PHONE</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=get_sdt($taikhoan['gioithieu'])?>"></span>
                </div>
                
                <div>
                    <span><label>EMAIL</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=get_email($taikhoan['gioithieu'])?>"></span>
                </div>
               
               <p style="padding:5px 0; color:#f00">-------------------------------------------------</p>
               
                <div>
                    <span><label>TIME ACTIVE</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=date('d/m/Y H:i:s',$taikhoan['ngaykichhoat'])?> "></span>
                </div>
               
                <div>
                    <span><label>PLAN</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=number_format($taikhoan['goi'],0, '.', ',')?> $"></span>
                </div>
                <div>
                    <span><label>FULL NAME</label></span>
                    <span><input name="hovaten" id="hovaten" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['hoten']?>"></span>
                </div>
                
                  <div>
                    <span><label>USER</label></span>
                    <span><input name="user" id="user" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['user']?>"></span>
                </div>
                
                <div>
                    <span><label>PHONE</label></span>
                    <span><input name="dienthoai" id="dienthoai" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['dienthoai']?>"></span>
                </div>
                
                 <div>
                    <span><label>EMAIL</label></span>
                    <span><input name="email" id="email" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['email']?>"></span>
                </div>
               <!--
                <div>
                    <span><label>BLOCKCHAIN</label></span>
                    <span><input name="bitcoin" id="bitcoin" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['bitcoin']?>"></span>
                </div>
                -->
                 <div>
                    <span><label>COUNTRY</label></span>
                    <span><input name="quocgia" id="quocgia" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['quocgia']?>"></span>
                </div>
                <div>
                    <span><label>ADDRESS</label></span>
                    <span><input name="diachi" id="diachi" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['diachi']?>"></span>
                </div>
                
                 <div>
                    <span><label>WALLET DOGECOIN</label></span>
                    <span><input name="dogecoin" id="dogecoin" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['vi']?>"></span>
                </div>
                
                 
                
                <!--
                <div>
                    <span><input type="submit" class="" value="Submit" id="dangnhap9"></span>
                </div>
                -->
             </form>
         </div>
    
    </div>
     <?php }?>
</div>

<div class="clear"> </div>		




<style>
.uplevel{
	padding:10px 25px;
	background:#060;
	color:#fff;
	font-weight:bold;
}
.uplevel:hover{
	background:#C30;
	
}
.uplevel1{
	padding:10px 20px;
	background:#309;
	color:#fff;
	font-weight:bold;
}
.uplevel1:hover{
	background:#C30;
	
}
</style>






