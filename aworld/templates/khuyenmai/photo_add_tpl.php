<h3>Màu</h3>
<form name="frm" method="post" action="index.php?com=khuyenmai&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<5; $i++){?>	
    <b>Màu <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong><?=_khuyenmai_type?></strong><br />
    <br />
	<!--<b>Link: </b> <input name="mota<?=$i?>" type="text" size="40"   />	
	<br />
    <br />
    <b>Vị trí:</b> <select name="vitri<?=$i?>" id="vitri<?=$i?>">
    	
        <option value="1">Chạy bên trái</option>
        <option value="2">Chạy bên phải</option>
    </select><br/><br/>-->
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=man_photo'" class="btn" />
</form>