<script type="text/javascript">
$(document).ready(function() {
	
	$('#giatri').priceFormat(); // GỌI HÀM ĐỊNH DẠNG KIỂU TIỀN TỆ TỪ priceFormat.js ngoài index.php

});

</script>



<h3>Danh mục </h3>
<form name="frm" method="post" action="index.php?com=nghe&act=save_list" enctype="multipart/form-data" class="nhaplieu">	
  
    	  
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nghe&act=man_list'" class="btn" />
</form>