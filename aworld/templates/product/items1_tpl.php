<?php
	session_start();
	$session=session_id();
	$_SESSION['url']="";

?>





<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}


function onSearch(evt) {
	
				
		var keyword = document.getElementById("keyword").value;
		location.href = "index.php?com=product&act=man1&keyword="+keyword;
		loadPage(document.location);
		
		
}


</script>



<h3> Tổng số người: <?=$tongso?></h3>


<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<input name="keyword" id="keyword" type="text" placeholder="User"  style="width:120px" />

&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />


<table class="blue_table">
	<tr>
        <th style="width:3%;">STT</th> 
        <th style="width:8%;">Giới thiệu</th>      
        <th style="width:15%;">Nhân viên </th> 
        <th style="width:8%;">User </th> 
        <th style="width:7%;">Mã số </th> 
        <th style="width:6%;">Gói tham gia </th>       
        <th style="width:7%;">Ngày Tạo</th>
        <th style="width:5%;">Kích hoạt</th>		
		<th style="width:4%;">Xóa</th>
	</tr>
	<?php
	
	 for($i=0, $count=count($items); $i<$count; $i++){
		
	?>
	<tr>
         <td style="width:3%;"><?=$i+1?></td>
          <td style="width:7%; font-weight:bold;"><?=get_user($items[$i]['gioithieu'])?></td>
        <td style="width:15%; font-weight:bold;"><?=$items[$i]['hoten']?></td>
        <td style="width:7%; font-weight:bold;"><?=$items[$i]['user']?></td>
      <td style="width:7%; font-weight:bold;"><?=$items[$i]['maso']?></td>
       <td style="width:6%; font-weight:bold; color:#00f"><?=number_format($items[$i]['goi'],0, '.', ',')?> $</td>
       <td style="width:8%;"><?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?></td>
     
       <td style="width:5%;">
         	  <a onClick="if(!confirm('Xác nhận kích hoạt')) return false;" href="index.php?com=product&act=man1&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['daily']!='') echo'&daily='. $_REQUEST['daily'];?><?php if($_REQUEST['quanlyvung']!='') echo'&quanlyvung='. $_REQUEST['quanlyvung'];?><?php if($_REQUEST['trangthai']!='') echo'&trangthai='. $_REQUEST['trangthai'];?><?php if($_REQUEST['batdau']!='') echo'&batdau='. $_REQUEST['batdau'];?><?php if($_REQUEST['ketthuc']!='') echo'&ketthuc='. $_REQUEST['ketthuc'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
       
        </td>
       
		
        <td style="width:4%;">
       
       		 <a href="index.php?com=product&act=delete1&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a>
       
        </td>
	 
    </tr>
	<?php	 }?>
    
    
    </table></br>
  
   <!--<a href="index.php?com=product&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>-->


<div class="paging"><?=$paging['paging']?></div>