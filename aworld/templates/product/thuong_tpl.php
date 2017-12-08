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
		location.href = "index.php?com=product&act=thuong&keyword="+keyword;
		loadPage(document.location);
			
}


</script>



<h3>Quản lý rút hoa hồng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tổng số tiền đã rút: <span style="color:#f00"><?=number_format($sotiendarut,2, '.', ',')?> $</span></h3> 
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
        <th style="width:25%;">Họ tên</th> 
        <th style="width:10%;">User</th>
        <th style="width:10%;">Mã số </th>
        <th style="width:10%;">Số tiền</th>          
        <th style="width:10%;">Ngày rút</th>
        <th style="width:10%;">Xác nhận</th>       
        <th style="width:10%;">Ngày xác nhận</th>
        <th style="width:10%;">Xem</th>
       
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){
	$phi=2;
	
	?>
	<tr>
        
        <td style="width:5%;"><?=$i+1?></td>      
        <td style="width:20%;"> <?=get_ten($items[$i]['maso'])?></td>
        <td style="width:10%;"><?=$items[$i]['user']?></td> 
        <td style="width:10%;"><?=$items[$i]['maso']?></td>      
        <td style="width:10%;"><b style="color:#f00"><?=number_format(($items[$i]['sotien']-$phi),2, '.', ',')?> $</b></td>
       <td style="width:10%;"><?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?></td>
       <td style="width:10%;">
		
		 <?php if(@$items[$i]['xacnhan']==1){?>
          <img src="media/images/active_1.png" border="0" />
		 <? } else{ ?>
			<a onClick="if(!confirm('Xác nhận đã rút tiền')) return false;" href="index.php?com=product&act=thuong&xacnhan=<?=$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         
         <?php }?> 
		  
        </td>
         <td style="width:10%;"><?=date('d/m/Y H:i:s',$items[$i]['ngayxacnhan'])?></td>
         <td style="width:10%;" align="center"><a href="index.php?com=product&act=editx1&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png"  border="0"/></a></td>
		
      
	</tr>
	<?php	}?>
    </table></br>

<div class="paging"><?=$paging['paging']?></div>