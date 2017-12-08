<h3>Hinh ảnh</h3>

<form name="frm" method="post" action="index.php?com=hasp&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> <img src="<?=_upload_product.$item['photo']?>"  width="100" height="100"/><br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>.jpg|.gif|.png - Width: 600px | Height: 500px</strong><br />
	  <br />
<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hasp&act=man_photo&idc=<?=$_REQUEST['idc']?>'" class="btn" />
</form>