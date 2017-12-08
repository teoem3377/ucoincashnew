
<?php
function get_main_list()
	{
		$sql="select ten_vi,id from table_nghe_list order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục cấp 1</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_list'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
 

?>

<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=nghe&act=man_cat&id_list="+a.value;	
		return true;
	}
    
					
</script>

<h3><a href="index.php?com=nghe&act=add_cat">Thêm danh mục cấp 2</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:30%;"><?=get_main_list();?></th>
        <th style="width:40%;">Tên  </th>
        <th style="width:15%;">Chi tiết</th>
       <!-- <th style="width:10%;">Hiện trang chủ</th>-->
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
	 <td align="center" style="width:30%;">
        
        <?php
		$sql_danhmuc="select ten_vi from table_nghe_list where id='".$items[$i]['id_list']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['ten_vi']
	?>
        
        
        </td>		      
        
        <td align="center" style="width:40%;"><a href="index.php?com=nghe&act=edit_cat&id_list=<?=$items[$i]['id_list']?>&id=<?=$items[$i]['id']?>" style="text-decoration: none;"><?=$items[$i]['ten_vi']?></a></td>		
		 <td align="center" style="width:15%;"><a href="index.php?com=nghe&act=man_cat1&id_list=<?=$items[$i]['id_list']?>&id_dm=<?=$items[$i]['id']?>" style="text-decoration: none;">Xem</a></td>		
		
        
        <!--<td style="width:10%;">		
			<?php 
            if(@$items[$i]['trangchu']==1)
            {
            ?>
            <a href="index.php?com=nghe&act=man_cat&trangchu=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
            <? 
            }
            else
            {
            ?>
             <a href="index.php?com=nghe&act=man_cat&trangchu=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
             <?php
             }?>        
        </td>-->
        <td style="width:5%;">		
			<?php 
            if(@$items[$i]['hienthi']==1)
            {
            ?>
            <a href="index.php?com=nghe&act=man_cat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
            <? 
            }
            else
            {
            ?>
             <a href="index.php?com=nghe&act=man_cat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
             <?php
             }?>        
        </td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=edit_cat&id_list=<?=$items[$i]['id_list']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=delete_cat&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=nghe&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>