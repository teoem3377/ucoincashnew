
<div class="khungbao" style="margin-bottom:10px;">
<div class="tieude" ><?=_tuyendung?></div>
<div class="noidung">
	<?php if(count($result_tintuc)==0) { ?> <div style="float:left; width:740px; padding-left:30px"><?=_chuacapnhat?> </div> 
    <?php } else {?>
        
         <?php for($h=0;$h<count($result_tintuc);$h++) { ?>
                    <div style=" float:left; width:740px; margin:10px ">                   
                         <a href="tuyen-dung/<?=$result_tintuc[$h]['id']?>/<?=$result_tintuc[$h]['tenkhongdau']?>.html" class="mauchu8" >
                              <?=$result_tintuc[$h]['ten_'.$lang]?>
                         </a>
                    </div>
                         
        <?php } ?>
       
    <?php }?>
   
</div>
 <div class="phantrang" ><?=$paging['paging']?></div>
</div>
