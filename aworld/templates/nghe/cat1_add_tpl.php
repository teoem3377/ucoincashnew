
<?php	
	function get_sp()
	{
		$sql_huyen="select * from table_nghe where hienthi=1 order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_sp" name="id_sp">
			<option value="0">Chọn sản phẩm</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_sp"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	
	$sqlsp22 = "select ten_vi,id_list from #_nghe_cat where id=".(int)@$_REQUEST["id_dm"];
	$d->query($sqlsp22);
	$sp22=$d->fetch_array();
	
	$sqlsp11 = "select ten_vi from #_nghe_list where id=".$sp22["id_list"];
	$d->query($sqlsp11);
	$sp11=$d->fetch_array();
	
?>
<h3>Cập nhật sản phẩm của <b style="color:#f00"><?=$sp22['ten_vi']?></b> thuộc  <b style="color:#f00"><?=$sp11['ten_vi']?></b></h3>

<form name="frm" method="post" action="index.php?com=nghe&act=save_cat1" enctype="multipart/form-data" class="nhaplieu">	    	    
        
    <b>Sản phẩm:</b><?=get_sp();?><br /><br />   
    <b>Số lượng</b> <input type="text" name="soluong" value="<?=@$item['soluong']?>" class="input" /><br /><br />
  	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id_dm" id="id_dm" value="<?=(int)@$_REQUEST["id_dm"]?>" />
    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nghe&act=man_cat1&id_dm=<?=(int)@$_REQUEST["id_dm"]?>'" class="btn" />
</form>