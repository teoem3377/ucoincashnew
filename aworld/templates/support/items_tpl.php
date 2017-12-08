
<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}


function onSearch(evt) {
	
		var user = document.getElementById("user").value;
		 location.href = "index.php?com=support&act=man&user="+user;
		loadPage(document.location);
		
		
}


</script>



<h3>Quản lý  Support</h3>
<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<input name="user" id="user" type="text" placeholder="User"  style="width:250px" />

&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />


<table class="blue_table">
	<tr>
		<th style="width:20%;">User</th>
	    <th style="width:20%;">Tiêu đề</th>        
        <th style="width:15%;">Ngày gửi</th>       
		<th width="6%" style="width:6%;">Xem</th>
		<th width="6%" style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td align="center" style="width:20%;"><?=$items[$i]['user']?></td>
		<td align="center" style="width:20%;"><?=$items[$i]['tieude']?></td>
		<td align="center" style="width:15%;"><?=make_date($items[$i]['ngaytao'])?></td>
		<td style="width:6%;" align="center"><a href="index.php?com=support&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;">Xem</a></td>
		<td style="width:6%;"><a href="index.php?com=support&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>