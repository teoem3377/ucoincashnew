



<h3><a href="index.php?com=product&act=add_cat2">Thêm thưởng pin</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
	    <th style="width:20%;">Tên</th>
        <th style="width:15%;">Thành tích Tháng</th>
        <th style="width:20%;">Thưởng</th>
       
       	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<!--<th style="width:5%;">Xóa</th>-->
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
	    <td align="center" style="width:20%;"><a href="index.php?com=product&act=edit_cat2&id=<?=$items[$i]['id']?>" style="text-decoration: none;"><?=$items[$i]['ten_vi']?></a></td>		
		<td style="width:15%;"><?=$items[$i]['thanhtich']?></td>
        <td style="width:20%;"><?=number_format($items[$i]['thuong'],0, ',', '.')?> VNĐ</td>
      
        <td style="width:5%;">		
			<?php 
            if(@$items[$i]['hienthi']==1)
            {
            ?>
             <a href="index.php?com=product&act=man_cat2&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
            <? 
            }
            else
            {
            ?>
             <a href="index.php?com=product&act=man_cat2&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
             <?php
             }?>        
        </td>
		<td style="width:5%;"><a href="index.php?com=product&act=edit_cat2&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<!--<td style="width:5%;"><a href="index.php?com=product&act=delete_cat1&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>-->
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=product&act=add_cat2"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>