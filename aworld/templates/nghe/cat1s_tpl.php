<?php

   
	$sqlsp2 = "select ten_vi,id_list from #_nghe_cat where id=".(int)@$_REQUEST["id_dm"];
	$d->query($sqlsp2);
	$sp2=$d->fetch_array();
	
	 $sqlsp1 = "select ten_vi,giatri from #_nghe_list where id=".$sp2["id_list"];
	$d->query($sqlsp1);
	$sp1=$d->fetch_array();

?>

<h3>Danh sách sản phẩm của <b style="color:#f00"><?=$sp2['ten_vi']?></b> thuộc <b style="color:#f00"><?=$sp1['ten_vi']?></b> , giá trị: <?=number_format($sp1['giatri'],0, ',', '.')?> VNĐ</h3>
<table class="blue_table">
	<tr>
		<th style="width:3%;">STT</th>
		<th style="width:40%;">Tên sản phẩm</th>
        <th style="width:8%;">Đơn giá</th>
        <th style="width:6%;">Số lượng</th>
        <th style="width:8%;">Tổng tiền </th>
       	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){
		
	    $sqlsp = "select ten_vi from #_nghe where id=".$items[$i]['id_sp'];
		$d->query($sqlsp);
		$sp=$d->fetch_array();		
		
	?>
	<tr>
		<td style="width:3%;"><?=$i+1?></td>
	    <td align="center" style="width:40%;"><a href="index.php?com=nghe&act=edit_cat1&id_dm=<?=$items[$i]['id_dm']?>&id_sp=<?=$items[$i]['id_sp']?>&id=<?=$items[$i]['id']?>" style="text-decoration: none;"><?=$sp['ten_vi']?></a></td>		
		<td align="center" style="width:8%;"><?=number_format(giasp($items[$i]['id_sp']),0, ',', '.')?> VNĐ</td>
        <td align="center" style="width:6%;"><?=$items[$i]['soluong']?></td>
        <td align="center" style="width:8%;"><?=number_format((giasp($items[$i]['id_sp'])*$items[$i]['soluong']),0, ',', '.')?> VNĐ</td>		
		    
        <td style="width:5%;">		
			<?php 
            if(@$items[$i]['hienthi']==1)
            {
            ?>
            <a href="index.php?com=nghe&act=man_cat1&id_dm=<?=$items[$i]['id_dm']?>&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
            <? 
            }
            else
            {
            ?>
             <a href="index.php?com=nghe&act=man_cat1&&id_dm=<?=$items[$i]['id_dm']?>&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
             <?php
             }?>        
        </td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=edit_cat1&id_dm=<?=$items[$i]['id_dm']?>&id_sp=<?=$items[$i]['id_sp']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=delete_cat1&id_dm=<?=$items[$i]['id_dm']?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div style="font-size:15px; font-weight:bold; color:#f00; margin:10px 0">Giá trị thực: <?=number_format($giasp,0, ',', '.')?> VNĐ</div>

<a href="index.php?com=nghe&act=add_cat1&id_dm=<?=(int)@$_REQUEST["id_dm"]?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>