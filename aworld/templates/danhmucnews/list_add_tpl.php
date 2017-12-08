<h3>Tỉnh thành</h3>
<form name="frm" method="post" action="index.php?com=danhmucnews&act=save_list" enctype="multipart/form-data" class="nhaplieu">	
  <!-- <?php if ($_REQUEST['act']=='edit_list')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_danhmucnews.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_danhmucnews_type?><br />
    <br />
     --> 	  
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br />
    <b>Tên (English)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br />
    <!--<b>Tên (China)</b> <input type="text" name="ten_ci" value="<?=@$item['ten_ci']?>" class="input" /><br /><br />
    <b>Key</b> <input type="text" name="keywork" value="<?=@$item['keywork']?>" class="input" /><br /><br />-->
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=danhmucnews&act=man_list'" class="btn" />
</form>