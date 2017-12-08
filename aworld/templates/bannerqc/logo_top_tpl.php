<h3>Cập nhật logo top</h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save_logo_top" enctype="multipart/form-data" class="nhaplieu">
<b>Hình hiện tại:</b> 
	<?php if($item['photo']!=NULL) { ?>        
        <object width="424" height="273" data="<?=_upload_logo.$item['photo']?>" type="application/x-shockwave-flash">
            <param value="<?=_upload_logo.$item['photo']?>" name="movie" />
            <param value="high" name="quality" />
            <param value="transparent" name="wmode" />
        </object>       
    <?php } else { echo "Chưa có logo"; } ?><br /><br />
	<b>Logo hiện tại: </b> 
    <input type="file" name="file" /> <strong> Width:424px&nbsp;-&nbsp;Height:273px&nbsp;Type:&nbsp;.swf|.jpg|.png|.gif|.JPG|.jpeg|.JPEG|.Jpg|.PNG</strong><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=logo_top'" class="btn" />
</form>