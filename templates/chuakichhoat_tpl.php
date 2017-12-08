
<?php 

    $d->reset();
	$sql_setting = "select * from #_product where hienthi=0 and  gioithieu='".$_SESSION['login']['maso']."' order by id asc" ;
	$d->query($sql_setting);
	$capduoi= $d->result_array();
	
	
		
?>

<div class="khungbao">
  <div class="tieude" >Danh sách chưa kích hoạt</div>
  <div class="noidungs">
  
        <table width="1080" border="0" cellpadding="1" cellspacing="1">
          <tr style="font-size:13px; height:30px; background:#6CF">
            <td align="center" width="5%"><strong>STT</strong></td>
            <td align="center" width="20%"><strong>Họ tên</strong></td>
            <td align="center" width="12%"><strong>Mã số</strong></td>
            <td align="center" width="15%"><strong>Gói đầu tư</strong></td>
            <td align="center" width="12%"><strong>Điện thoại</strong></td>
            <td align="center" width="12%"><strong>Ngày tạo</strong></td>
          </tr>
  
      <?php
       for($i=0;$i<count($capduoi);$i++){
	  ?>
           <tr style="font-size:13px;height:30px; background: #E2F1F1">
               
                <td align="center"><?=$i+1?></td>
                <td align="center"><?=$capduoi[$i]['hoten']?></td>
                <td align="center"><?=$capduoi[$i]['maso']?></td>
                <td align="center"><?=dinhmucthamgia($capduoi[$i]['maso'])?></td>
                <td align="center"><?=$capduoi[$i]['dienthoai']?></td>
                <td align="center"><?=date('d/m/Y  H:i:s',$capduoi[$i]['ngaytao'])?></td>
           </tr> 
    
     <?php }?>     
         
                   
        </table>
    
   </div>
</div>
   
   <style>
   .xemx{
	   color:#00f;
	   font-style:italic;
	   text-decoration:underline;
	   font-weight:bold;
   }
   .xemx:hover{
	   color:#f00;
	  
   }
   </style>