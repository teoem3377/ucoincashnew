<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=product&act=delete_item&listid=" + listid;
});
});
</script>
<h3>Cấp bậc</h3>
<h3><a href="index.php?com=product&act=add_list">Thêm cấp bậc</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:20%;">Cấp bậc</th>
        <th style="width:10%;">Tối đa ngày</th>     
        <th style="width:10%;">Tối đa tuần</th>
        <th style="width:10%;">Tối thiểu ngày</th>
        <th style="width:10%;">Thưởng</th>
		<?php if($_SESSION['login']['username']=="king" ){?>
        <th style="width:5%;">Sửa</th>
        <?php }?>
        <!--<th style="width:5%;">Xóa</th>-->
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td align="center" style="width:20%;"><?=$items[$i]['ten_vi']?> </td>		
	    <td align="center" style="width:10%;"><?=$items[$i]['toidangay']?></td>   
        <td align="center" style="width:10%;"><?=$items[$i]['toidatuan']?></td>
        <td align="center" style="width:10%;"><?=$items[$i]['toithieutuan']?></td>
        <td align="center" style="width:10%;"><?=number_format($items[$i]['thuong'],0, ',', '.')?> Đ</td>
       <?php if($_SESSION['login']['username']=="king" ){?>
        <td style="width:5%;"><a href="index.php?com=product&act=edit_list&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
	  <?php }?>
        <!--<td style="width:5%;"><a href="index.php?com=product&act=delete_list&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>-->
	</tr>
	<?php	}?>
</table>

<!--<a href="index.php?com=product&act=add_list"><img src="media/images/add.jpg" border="0"  /></a>-->
<div class="paging"><?=$paging['paging']?></div>