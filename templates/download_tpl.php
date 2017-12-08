<?php
	$d->reset();
	$sql_hotro="select * from #_thongtincongty where hienthi =1 order by stt asc";
	$d->query($sql_hotro);
	$ct=$d->result_array();

?>


<div class="khungbao" >
 	<div class="tieude"><?=_tailieu?></div>
    <div class="noidungs">
      <table width="1080" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="8%" height="28" align="center" style="background:#0867ab; font-size:14px; color:#fff; font-family:Arial, Helvetica, sans-serif"><?=_stt?></td>
              <td width="40%" align="center" style="background:#0867ab; font-size:14px;  color:#fff; font-family:Arial, Helvetica, sans-serif"><?=_ten?></td>
              <td width="23%" align="center" style="background:#0867ab; font-size:14px;  color:#fff; font-family:Arial, Helvetica, sans-serif">View</td>
              <td width="23%" align="center" style="background:#0867ab; font-size:14px;  color:#fff; font-family:Arial, Helvetica, sans-serif">Download</td>
            </tr>
           <?php for($i=1;$i<=count($ct);$i++ ) { ?>  
           <?php if($i%2==0) { ?>         
            <tr>
              <td height="26" align="center" style="background: #E8FFFF"><?=$i?></td>
              <td align="center" style="background:#E8FFFF; font-size:14px;color:#00F; font-weight:bold"><?=$ct[$i-1]['ten_'.$lang]?></td>
              <td align="center" style="background:#E8FFFF"><a href="https://docs.google.com/gview?url=http://<?=$config_url?>/<?=_upload_news_l.$ct[$i-1]['photo']?>"> <img src="./images/old_edit_find.png" height="25" width="25"></a></td>
              <td align="center" style="background:#E8FFFF"><a href="<?=_upload_news_l.$ct[$i-1]['photo']?>"> <img src="./images/view_sort_descending.png" height="25" width="25"></a></td>
            </tr>
           <?php } else { ?>
           <tr>
              <td height="26" align="center" style="background: #F5F5F5"><?=$i?></td>
              <td align="center" style="background:#F5F5F5; font-size:14px; color:#00F;font-weight:bold"><?=$ct[$i-1]['ten_'.$lang]?></td>
              <td align="center" style="background:#F5F5F5"><a href="https://docs.google.com/gview?url=http://<?=$config_url?>/<?=_upload_news_l.$ct[$i-1]['photo']?>"> <img src="./images/old_edit_find.png" height="25" width="25"></a></td>
              <td align="center" style="background:#F5F5F5"><a href="<?=_upload_news_l.$ct[$i-1]['photo']?>"> <img src="./images/view_sort_descending.png" height="25" width="25"></a></td>
            </tr>
           
           <?php }} ?>
      </table>
    </div>
</div>
