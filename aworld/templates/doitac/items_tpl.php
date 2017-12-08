<h3><a href="index.php?com=doitac&act=add">Thêm giải pháp kỹ thuật</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		 <th style="width:15%;">Tên</th>
       <th style="width:25%;">Link</th>
        <th style="width:32%;">Hình</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
        <td style="width:15%;"><a href="index.php?com=doitac&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration: none;"><?=$items[$i]['ten_vi']?></a></td>
		<td style="width:25%;">
		<?=$items[$i]['url']?>
        </a>
        </td>
       
		<td style="width:32%;"><img src="<?=_upload_doitac.$items[$i]['photo']?>" width="100" height="100"  /></td>
       <td style="width:6%;">
		<?php
		 if(@$items[$i]['hienthi']==1)
		 {
		 ?>
         <a href="index.php?com=doitac&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png" /></a>
		 <? 
		 }
		 else
		 {
		 ?>
          <a href="index.php?com=doitac&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" /></a>
          <?php
		  }?>
         </td>
		<td style="width:6%;"><a href="index.php?com=doitac&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=doitac&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>