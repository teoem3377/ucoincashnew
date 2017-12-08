
<script type="text/javascript">
$(document).ready(function() {
	
	$('#luongcung').priceFormat(); // GỌI HÀM ĐỊNH DẠNG KIỂU TIỀN TỆ TỪ priceFormat.js ngoài index.php

});

</script>




<h3>Thêm đại lý</h3>

<form name="frm" method="post" action="index.php?com=product&act=save_cat3" enctype="multipart/form-data" class="nhaplieu">	    	    
  
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br /> 
    <b>Định mức</b> <input type="text" name="dinhmuc" value="<?=@$item['dinhmuc']?>" class="input" /><br /><br />   
    <b>Chiết khấu</b> <input type="text" name="luongcung" id="luongcung" value="<?=@$item['chietkhau']?>" class="input" /><br /><br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_cat3'" class="btn" />
</form>