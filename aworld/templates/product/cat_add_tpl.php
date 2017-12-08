


<script type="text/javascript">
$(document).ready(function() {
	
	$('#phanthuong').priceFormat(); // GỌI HÀM ĐỊNH DẠNG KIỂU TIỀN TỆ TỪ priceFormat.js ngoài index.php

});

</script>

<h3>Thêm mức thưởng</h3>

<form name="frm" method="post" action="index.php?com=product&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	    	    
  
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br />
    <b>Định mức nhánh</b> <input type="text" name="dinhmucnhanh" value="<?=@$item['dinhmucnhanh']?>" class="input" /><br /><br />
    <b>Định mức tổng</b> <input type="text" name="dinhmuctong" value="<?=@$item['dinhmuctong']?>" class="input" /><br /><br />
    <b>Phần thưởng</b> <input type="text" name="phanthuong" id="phanthuong" value="<?=@$item['phanthuong']?>" class="input" /><br /><br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_cat'" class="btn" />
</form>