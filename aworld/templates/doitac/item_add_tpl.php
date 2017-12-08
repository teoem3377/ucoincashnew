<h3>Giải pháp kỹ thuật</h3>

<form name="frm" method="post" action="index.php?com=doitac&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <?php if ($_REQUEST['act']==edit)
	{?>
    <b>Hình hiện tại:</b><img src="<?=_upload_doitac.$item['photo']?>" alt="NO PHOTO" width="200" height="200" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" />  .jpg|.png|.gif _Width: 200px | _Height: 180px <br />
    <br />
  
 
	<b>Tên:</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /><br />
    <b>Tên (English):</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br /><br />
    <!--<b>Tên (China):</b> <input type="text" name="ten_ci" value="<?=$item['ten_ci']?>" class="input" /><br /><br />-->
	<b>Link</b> <input type="text" name="url" value="<?=$item['url']?>" class="input" />
&nbsp;Dạng:&nbsp;http://www.tenmien.com

<br />

	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px" /><br />
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man'" class="btn" />
</form>