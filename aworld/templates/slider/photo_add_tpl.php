<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=slider&act=save_photo" enctype="multipart/form-data" class="nhaplieu">		

	
	<b>Hình ảnh</b> <input type="file" name="file" /> <strong> jpg|.png|.gif|.jpeg   Width_1300px | Height_700px </strong> <br />	 <br />
    <!--<b>Link</b> <input type="text" name="ten" value="" class="input" /><br />-->
    	       	    
    <b>Số thứ tự </b> <input type="text" name="stt" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slider&act=man_photo'" class="btn" />
</form>