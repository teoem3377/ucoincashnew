<h3>Cập nhật logo top</h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save_logo_footer" enctype="multipart/form-data" class="nhaplieu">
	<b>Hình hiện tại:</b> 
	<?php if($item['photo']!=NULL) { ?>
       <img src="<?=_upload_logo.$item['photo']?>" />
	 <?php } else { echo "Chưa có logo"; }
	 ?><br /><br />
	<b>Logo hiện tại: </b> 
    <input type="file" name="file" /> <?=_logo_footer_type?><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=logo_footer'" class="btn" />
</form>