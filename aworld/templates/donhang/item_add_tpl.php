<?php
function tinhtrang($i=0)
	{
		$sql="select * from table_tinhtrang order by id";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_tinhtrang" name="id_tinhtrang" class="main_font">					
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$i)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Chi tiết đơn hàng</h3>

<form name="frm" method="post" action="index.php?com=donhang&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b style="width:150px; margin-bottom:3px;">Mã đơn hàng:</b> <strong><?=@$item['madonhang']?></strong><br />		    
    <b style="width:150px; margin-bottom:13px;">Ngày đặt: </b><strong><?=date('d/m/Y  H:i:s',$item['ngaytao'])?></strong><br />
    <b style="width:150px; margin-bottom:3px;">Người nhận hàng:</b> <strong><?=@$item['nguoinhan']?></strong><br />		    
    <b style="width:150px; margin-bottom:3px;">Địa chỉ người nhận: </b><strong><?=@$item['diachinguoinhan']?></strong><br />
    <b style="width:150px; margin-bottom:3px;">Điện thoại người nhận: </b><strong><?=@$item['dienthoainguoinhan']?></strong><br />		  
   		  
    <div style="margin:10px 0 15px 0;">    
     <?=@$item['lydo']?>    
    </div>
		
    <b>Ghi chú</b>
     <textarea name="ghichu" cols="50" rows="5" id="ghichu"><?=@$item['ghichu']?></textarea><br/>
     <b>Tình trạng</b><?=tinhtrang($item['trangthai'])?><br/>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
    <input type="hidden" name="id_lists" id="id_lists" value="<?php if($_REQUEST['id_lists']!='') echo'&id_list='. $_REQUEST['id_lists'];?>" />
    <input type="hidden" name="batdaus" id="batdaus" value="<?php if($_REQUEST['batdaus']!='') echo'&batdau='. $_REQUEST['batdaus'];?>" />
    <input type="hidden" name="ketthucs" id="ketthucs" value="<?php if($_REQUEST['ketthucs']!='') echo'&ketthuc='. $_REQUEST['ketthucs'];?>" />
    <input type="hidden" name="curPage" id="curPage" value="<?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" />
    
    
    
    
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=donhang&act=man'" class="btn" />
</form>