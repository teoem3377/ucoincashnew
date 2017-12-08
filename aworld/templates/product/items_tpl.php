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
	
		var email = document.getElementById("email").value;
		var walletbbc = document.getElementById("walletbbc").value;
		var walleteth = document.getElementById("walleteth").value;
		 location.href = "index.php?com=product&act=man&email="+email+"&walletbbc="+walletbbc+"&walleteth="+walleteth;
		loadPage(document.location);
		
		
}


</script>




<h3> Tổng số người: <?=$tongso?></h3>

<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<input name="email" id="email" type="text" placeholder="Email"  style="width:250px" />
&nbsp;&nbsp;<input type="text" name="walletbbc" id="walletbbc" placeholder="Wallet BBC" style="width:250px"/>
&nbsp;&nbsp;<input type="text" name="walleteth" id="walleteth" placeholder="wallet ETH" style="width:250px" />
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />


<table class="blue_table">
	<tr>
        <th style="width:5%;">STT</th> 
        <th style="width:20%;">Email </th> 
        <th style="width:8%;">User </th> 
        <th style="width:5%;">Chi tiết</th>
		<!--<th style="width:5%;">Xóa</th>-->
       
	</tr>
	<?php
	 for($i=0, $count=count($items); $i<$count; $i++){	
	?>
	<tr>
        <td style="width:5%;"><?=$i+1?></td>
        <td style="width:20%; font-weight:bold;"><?=$items[$i]['email']?></td>      
        <td style="width:8%; font-weight:bold;"><?=$items[$i]['user']?></td>
		<td style="width:5%;">
          <?php if($_SESSION['login']['username']=="aworld"){?>
        	<a href="index.php?com=product&act=edit<?php if($_REQUEST['id_list']!='') echo'&id_lists='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1s='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['trangthai']!='') echo'&trangthais='. $_REQUEST['trangthai'];?><?php if($_REQUEST['daily']!='') echo'&dailys='. $_REQUEST['daily'];?><?php if($_REQUEST['quanlyvung']!='') echo'&quanlyvungs='. $_REQUEST['quanlyvung'];?><?php if($_REQUEST['batdau']!='') echo'&batdaus='. $_REQUEST['batdau'];?><?php if($_REQUEST['ketthuc']!='') echo'&ketthucs='. $_REQUEST['ketthuc'];?>&id_list=<?=$items[$i]['id_list']?>&id_cat1=<?=$items[$i]['id_cat1']?>&trangthai=<?=$_REQUEST['trangthai']?>&daily=<?=$items[$i]['daily']?>&quanlyvung=<?=$items[$i]['quanlyvung']?>&batdau=<?=$_REQUEST['batdau']?>&ketthuc=<?=$_REQUEST['ketthuc']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" /></a>
          <?php }?>
        </td>
		<!--
        <td style="width:5%;">
        <?php if($_SESSION['login']['username']=="aworld"){?>
       		 <a href="index.php?com=product&act=delete&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a>
        <?php }?>
        </td>
	  -->
    </tr>
	<?php	 }?>
    
    </table></br>
  
<div class="paging"><?=$paging['paging']?></div>