<h3>Danh mục cấp 2</h3>
<?php	
	function get_main_list()
	{
		$sql_huyen="select * from table_nghe_list order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_list" name="id_list">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form name="frm" method="post" action="index.php?com=nghe&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	    	    
        
    <b>Danh mục cấp 1:</b><?=get_main_list();?><br /><br /> 
   
   <?php if ($_REQUEST['act']=='edit_cat'){?>
	<b>Hình hiện tại:</b><img src="<?=_upload_nghe.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_nghe_type?><br />
    <br />
   
    
    
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br />
  <!--  <b>Tên (English) </b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br />
    <b>Tên (China) </b> <input type="text" name="ten_ci" value="<?=@$item['ten_ci']?>" class="input" /><br /><br />
    <b>Key</b> <input type="text" name="keywork" value="<?=@$item['keywork']?>" class="input" /><br /><br />-->
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nghe&act=man_cat'" class="btn" />
</form>