

<?php 
    @$id =  addslashes($_GET['id']);
	
	@$temp =  addslashes($_GET['temp']);
	
	
		if($temp=='active')
		{	
			$tatus='Actived';
			$mau='#090';
			$sql_setting = "select * from #_product where id=".$id ;	
			
		}
		else
		{
			$tatus=' Not Active';
			$mau='#f00';
			$sql_setting = "select * from #_product1 where id=".$id ;	
			
		}
		
	
	
			
	$d->query($sql_setting);
	$taikhoan= $d->fetch_array();	
	
?>

<div class="main">
 
     <div class="contact">
     
         <h2 class="style" style="color:#099; padding-bottom:15px">INFORMATION USER</h2> 
         <div class="contact-form">
            <form name="frmTM" id="frmTM" method="post" action="index.html" enctype="multipart/form-data">
               <div>
                    <span><label>STATUS</label></span>
                    <span><input  type="text"  readonly="readonly" value="<?=$tatus?>" style="color:<?=$mau?>"></span>
                </div>
               
               
                <div>
                    <span><label>PLANS</label></span>
                    <span><input name="plans" id="plans" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['goi']?>$" </span>
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
                
                 <div>
                    <span><label>COUNTRY</label></span>
                    <span><input name="quocgia" id="quocgia" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['quocgia']?>"></span>
                </div>
              
                <div>
                    <span><label>ADDRESS</label></span>
                    <span><input name="diachi" id="diachi" type="text" class="textbox" readonly="readonly" value="<?=$taikhoan['diachi']?>"></span>
                </div>
                
               
             </form>
         </div>
    
    </div>
    
</div>

<div class="clear"> </div>		











