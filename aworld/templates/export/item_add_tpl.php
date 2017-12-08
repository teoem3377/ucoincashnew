<?php
function get_main_category()
{
	$sql="select * from table_product_list";
	$stmt=mysql_query($sql);
	while ($row=@mysql_fetch_array($stmt)) 
	{
		$str.='<optgroup label="'.$row['ten_vi'].'">';
		$sql_huyen="select * from table_product_cat where id_list=".$row['id']." order by id desc ";
		$result=mysql_query($sql_huyen);		
		while ($row_huyen=@mysql_fetch_array($result)) 
		{			
			$str.='<option value='.$row_huyen["id"].'>'.$row_huyen["ten_vi"].'</option>';			
		}		
		
		$str.='</optgroup>';
	}		
	return $str;
}	
?>
<link href="multiselect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css" /> 
<script src="multiselect/jquery.js" type="text/javascript"></script>
<script src="multiselect/jquery-ui.js" type="text/javascript"></script>
 	
<h3>Xuất danh sách sản phẩm</h3>   
<form name="frm" method="post" action="index.php?com=export&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
    <select multiple="multiple" id="my-select" name="my-select[]">
        <?=get_main_category()?>
    </select>
    <script src="multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#my-select').multiSelect({
        selectableOptgroup: true,
        selectableHeader: "<div class='custom-header'>Chọn danh mục</div>",
        selectionHeader: "<div class='custom-header'>Danh mục đã chọn</div>"		 
    });</script>
    <input type="submit" value="Xuất" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=export&act=man'" class="btn" />
</form>   