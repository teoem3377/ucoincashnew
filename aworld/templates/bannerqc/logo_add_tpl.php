<h3>Quảng lý logo</h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Hình hiện tại:</b> 
	
        <img src="<?=_upload_banner.$item['photo']?>" width="200px" height="150px" />
    <br /><br />
	<b>Banner hiện tại: </b> 
    <input type="file" name="file" /> <strong> Width:200px&nbsp;-&nbsp;Height:150px&nbsp;Type:&nbsp;.png</strong><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bannerqc&act=capnhat'" class="btn" />
</form>