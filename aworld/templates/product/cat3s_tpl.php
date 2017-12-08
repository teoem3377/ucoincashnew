



<h3><a href="index.php?com=product&act=add_cat3">Thêm đại lý</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
	    <th style="width:20%;">Tên</th>
        <th style="width:20%;">Định mức</th>
        <th style="width:20%;">Chiết khấu</th>     
		<th style="width:5%;">Sửa</th>
		<!--<th style="width:5%;">Xóa</th>-->
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
	    <td align="center" style="width:20%;"><a href="index.php?com=product&act=edit_cat3&id=<?=$items[$i]['id']?>" style="text-decoration: none;"><?=$items[$i]['ten_vi']?></a></td>		
		<td style="width:20%;"><?=$items[$i]['dinhmuc']?></td>
        <td style="width:20%;"><?=number_format($items[$i]['chietkhau'],0, ',', '.')?> VNĐ</td>
       	<td style="width:5%;"><a href="index.php?com=product&act=edit_cat3&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<!--<td style="width:5%;"><a href="index.php?com=product&act=delete_cat1&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>-->
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=product&act=add_cat3"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>