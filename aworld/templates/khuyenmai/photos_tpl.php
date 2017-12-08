

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>		
       <!-- <th style="width:30%;">Vị trí</th>-->
        <th style="width:50%;">Hình ảnh</th>
      	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
        <!--<td style="width:30%;">
			<?php if($items[$i]['vitri']==1) echo 'Chạy bên trái';?>
            <?php if($items[$i]['vitri']==2) echo 'Chạy bên phải';?>
            <?php if($items[$i]['vitri']==3) echo 'Cột bên trái';?>
        
        </td>
        -->   
		<td style="width:50%;">
       
       <img src="<?=_upload_khuyenmai.$items[$i]['photo']?>" width="100" height="300" />
        
        </td>
       
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=khuyenmai&act=man_photo&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=khuyenmai&act=man_photo&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		
		<td style="width:5%;"><a href="index.php?com=khuyenmai&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>
		
	</tr>
	<?php	}?>
</table>
