
<?php
$phi=2;


?>

<h3>Cập nhật rút tiền </h3>
<form name="frm" method="post" action="index.php?com=product&act=savex" enctype="multipart/form-data" class="nhaplieu">	
    <b>Họ tên</b> <input type="text" name="hoten" id="hoten" value="<?=get_ten(@$item['maso'])?>" class="input"  readonly='readonly'/><br /><br />
    <b>User</b> <input type="text" name="user" id="user" value="<?=@$item['user']?>" class="input"  readonly='readonly'/><br /><br />
    <b>Email</b> <input type="text" name="email" id="email" value="<?=get_email(@$item['maso'])?>" class="input"  readonly='readonly'/><br /><br />
    
	
    	<b>Số tiền rút ($)</b> <input type="text" name="sotien" id="sotien" value="<?=@$item['sotien']?>" class="input"  readonly='readonly'/><br /><br />
    
    	<b>Cần chuyển ($)</b> <input type="text" style="color:#f00" name="canchuyen" id="canchuyen" value="<?=(@$item['sotien']-$phi)?>" class="input"  readonly='readonly'/><br /><br />
    
       	<b>Blockchain</b> <input type="text" name="vi" id="vi" value="<?=@$item['vi']?>" class="input" readonly='readonly' /><br /><br />
        <b>Mã QR</b> <img src="<?=_upload_product.$item['maqr']?>"  alt="NO PHOTO" width="180" height="180" /><br /><br />
    <!--
        <b>TK Vietcombank</b> <input type="text" name="taikhoan" id="taikhoan" value="<?=@$item['taikhoan']?>" class="input" readonly='readonly' /><br /><br />
        <b>Chủ TK</b> <input type="text" name="chutaikhoan" id="chutaikhoan" value="<?=@$item['chutaikhoan']?>" class="input" readonly='readonly' /><br /><br />
   -->
    
    <b>Phản hồi lại</b> <input type="text" name="phanhoi" id="phanhoi" value="<?=@$item['phanhoi']?>" class="input1" /><br /><br />
    <b>Cập nhật bill:</b> <input type="file" name="file" /><br />
    <b>Bill đã chuyển:</b><img src="<?=_upload_product.$item['photo']?>"  alt="NO PHOTO" width="350" height="450"/><br />
	
	
    <br /> 
    
    
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=thuong'" class="btn" />
</form>

<style>
.input{
	width:400px !important;
	background:#CCC;
}
.input1{
	width:500px !important;
	
}
</style>