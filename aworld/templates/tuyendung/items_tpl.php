<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_item");
		window.location ="index.php?com=tuyendung&act=man&id_item="+a.value;	
		return true;
	}
					
</script>
<?php
function get_main_item()
	{
		$sql="select ten,id from table_tuyendung_item order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục cấp 1</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_item'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<h3><a href="index.php?com=tuyendung&act=add">Thêm bài viết</a></h3>

<table class="blue_table">

	<tr>
		<th style="width:5%;">Stt</th>
        <th style="width:25%;"><?=get_main_item();?></th>	
        <th style="width:55%;">Tên</th>
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>
        <td style="width:25%;">
            <?php
				$sql_danhmuc="select ten from table_tuyendung_item where id='".$items[$i]['id_item']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>       
		<td style="width:55%;" align="center"><a href="index.php?com=tuyendung&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>
		<td style="width:5%;">
        
        
		
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=tuyendung&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=tuyendung&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:5%;" align="center"><a href="index.php?com=tuyendung&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=tuyendung&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=tuyendung&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>