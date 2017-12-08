<?php 
 
    $d->reset();
    $sql="select * from #_danhmucnews where hienthi=1 order by stt asc ";
	$d->query($sql);
	$danhmuc=$d->result_array(); 
 

	$d->reset();
    $sql="select * from #_news where hienthi=1  order by id desc limit 2 ";
	$d->query($sql);
	$news1=$d->result_array(); 

	$d->reset();
    $sql="select * from #_news where hienthi=1 and noibat <> 0 order by id desc limit 2 ";
	$d->query($sql);
	$news2=$d->result_array(); 
    
?>




<div class="khungbao" style="margin-bottom:10px;">
<div class="tieude" ><?=_tintuc?></div>
<div class="noidungs">
	<?php if(count($result_tintuc)==0) { ?> Chưa cập nhật nội dung
    <?php } else {?>
        
         <?php for($h=0;$h<count($result_tintuc);$h++) { ?>
                  <div style=" float:left; width:470px; margin:5px 0 10px 10px">
                   
                        <div style="float:left; width:125px;border:1px solid #fff;">
                             <a href="tin-tuc/<?=$result_tintuc[$h]['id']?>/<?=$result_tintuc[$h]['tenkhongdau']?>.html" title="<?=$result_tintuc[$h]['ten_'.$lang]?>"  >
                                <img src="timthumb.php?src=<?=_upload_news_l.$result_tintuc[$h]['photo']?>&h=105&w=125&zc=1&q=100"   title="<?=$result_tintuc[$h]['ten_'.$lang]?>" />
                             </a>
                        </div>
                        <div style="float:left; width:300px; margin-left:5px">
                        	<div style="float:left; width:300px;">
                                <a href="tin-tuc/<?=$result_tintuc[$h]['id']?>/<?=$result_tintuc[$h]['tenkhongdau']?>.html" class="mauchu8" >
                                    <?=$result_tintuc[$h]['ten_'.$lang]?>
                                </a>    
                            </div>
                            <div style="float:left; font-size:13px; width:300px; text-align:justify" >
                            	<?=_substr($result_tintuc[$h]['mota_'.$lang],150)?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if(($h+1)%2==0){?> <div style=" clear:both"></div> <?php }?>                  
                   
                         
        <?php } ?>
       
    <?php }?>
   
</div>
 <div class="phantrang" ><?=$paging['paging']?></div>
</div>

