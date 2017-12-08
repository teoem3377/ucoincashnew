

<div class="khungbao" style="margin-bottom:10px;">
<div class="tieude" ><?=_dichvu?></div>
<div class="noidung">
	<?php if(count($result_tintuc)==0) { ?> <div style="float:left; width:560px; padding-left:30px"><?=_chuacapnhat?> </div> 
    <?php } else {?>
        
         <?php for($h=0;$h<count($result_tintuc);$h++) { ?>
                  <div style=" float:left; width:580px; margin:10px 0 15px 10px">
                   
                        <div style="float:left; width:145px;border:1px solid #fff;">
                             <a href="dich-vu/<?=$result_tintuc[$h]['id']?>/<?=$result_tintuc[$h]['tenkhongdau']?>.html" title="<?=$result_tintuc[$h]['ten_'.$lang]?>"  >
                                <img src="timthumb.php?src=<?=_upload_news_l.$result_tintuc[$h]['photo']?>&h=115&w=145&zc=1&q=100"   title="<?=$result_tintuc[$h]['ten_'.$lang]?>" />
                             </a>
                        </div>
                        <div style="float:left; width:400px; margin-left:5px">
                        	<div style="float:left; width:400px;  padding:2px 0;">
                                <a href="dich-vu/<?=$result_tintuc[$h]['id']?>/<?=$result_tintuc[$h]['tenkhongdau']?>.html" class="mauchu8" >
                                    <?=$result_tintuc[$h]['ten_'.$lang]?>
                                </a>    
                            </div>
                            <div style="float:left; font-size:13px; width:400px; text-align:justify" >
                            	<?=_substr($result_tintuc[$h]['mota_'.$lang],400)?>
                            </div>
                        </div>
                    </div>
                   
                   
                         
        <?php } ?>
       
    <?php }?>
   
</div>
 <div class="phantrang" ><?=$paging['paging']?></div>
</div>

