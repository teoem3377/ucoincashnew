<h3>Xem thông tin Support</h3>

<form name="frm" method="post" action="index.php?com=support&act=save" enctype="multipart/form-data" class="nhaplieu">
<br />
	<b>User</b> <input type="text" name="user" value="<?=@$item['user']?>" class="input" readonly="readonly" /><br />
    <b>Tiêu đề</b> <input type="text" name="tieude" value="<?=@$item['tieude']?>" class="input" /><br />
	<b>Nội dung</b>
    <div>
    <textarea name="noidung" cols="70" rows="10" id="noidung"><?=@$item['noidung']?></textarea>
    </div>
    <b>Trả lời</b>
    <div>
    <textarea name="traloi" cols="70" rows="10" id="traloi"><?=@$item['traloi']?></textarea>
    </div>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
    <input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=support&act=man'" class="btn" />
</form>