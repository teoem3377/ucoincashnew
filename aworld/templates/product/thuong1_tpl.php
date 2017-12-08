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
		location.href = "index.php?com=product&act=thuong1&keyword="+keyword;
		loadPage(document.location);
			
}


</script>



<h3>Quản lý up bill </h3> 
<!--
<div style="float:left; margin-bottom:5px">
        <div style="float:left">
            <form name="frm" method="post" action="index.php?com=export2&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
                   <input type="submit" value="Export Excel" class="btn" style="height:25px; border-radius:5px; background:#060; color:#fff; line-height:20px; cursor:pointer" />
                   <input type="hidden" name="keywordz" id="keywordz" value="<?=$_GET['keyword']?>" class="input" />
            </form>   
        
        </div>      
</div>
-->

<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<input name="keyword" id="keyword" type="text" placeholder="User" />
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />



<table class="blue_table">
	<tr>
         
        <th style="width:5%;">STT</th>       
        <th style="width:15%;">Người Up bill</th>        
        <th style="width:15%;">Người cần kích hoạt</th>          
        <th style="width:7%;">Ngày up</th>
        <th style="width:6%;">Đã xử lý</th>
        <th style="width:6%;">Xem bill</th>
        <!--<th style="width:6%;">Xóa</th>-->
       
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
        
        <td style="width:5%;"><?=$i+1?></td>      
        <td style="width:15%;"> <?=$items[$i]['user']?> - <?=get_ten($items[$i]['maso'])?></td>
       <td style="width:15%;"><?=$items[$i]['noidung']?></td>
       <td style="width:7%;"><?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?></td>
       <td style="width:6%;">
		 <?php if(@$items[$i]['xacnhan']==1){?>
          <img src="media/images/active_1.png" border="0" />
		 <? } else{ ?>
         	<a onClick="if(!confirm('Xác nhận đã đã xử lý')) return false;" href="index.php?com=product&act=thuong1&xacnhan=<?=$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
        
         <?php }?>      
       
       </td>
        
         <td style="width:6%;" align="center"><a href="index.php?com=product&act=editx&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<!--
        <td style="width:6%;">
        
        	<a href="index.php?com=product&act=deletex&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a>
        
        </td>
        -->
	</tr>
	<?php	}?>
    </table></br>

<div class="paging"><?=$paging['paging']?></div>