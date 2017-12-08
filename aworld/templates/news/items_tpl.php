
<script language="javascript">
	function select_onchange()
	{
		
		var a=document.getElementById("danhmuc");
		window.location ="index.php?com=news&act=man&danhmuc="+a.value;	
		return true;
	}
    
</script>



<h3><a href="index.php?com=news&act=add">Thêm bài viết</a></h3>
<table class="blue_table">

	<tr>
		<th style="width:5%;">STT</th>      
        <th style="width:25%;">Tên</th>      
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>
      		        
        <td style="width:25%;" align="center"><a href="index.php?com=news&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
		
      
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['danhmuc']!='') echo'&danhmuc='. $_REQUEST['danhmuc'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['danhmuc']!='') echo'&danhmuc='. $_REQUEST['danhmuc'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
        <td style="width:5%;" align="center"><a href="index.php?com=news&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=news&act=delete&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>