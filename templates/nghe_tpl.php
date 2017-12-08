
<script type="text/javascript" src="./js/ImageTooltip.js"></script>


<script language="javascript">
	function addtocart(pid){
		document.form1.ngheid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
<form name="form1" action="index.php">
	<input type="hidden" name="ngheid" />
    <input type="hidden" name="command" />
</form>




<div class="khungbao" >
<div class="tieude" ><span class="maus3"><?=$name?></span></div>
<div class="noidung">
	<?php if(count($nghe9)==0) { ?> <div style="float:left; width:700px; padding-left:30px"><?=_chuacapnhat?></div> 
    <?php } else {?>
        
         <?php for($i=1;$i<=count($nghe9);$i++) { ?>
                   <div style="float:left; width:160px; margin:8px 0 0 13px;">
            	<div style="float:left; width:160px; box-shadow:2px 2px 3px  #999999">
                    <a href="thach-cao/<?=$nghe9[$i-1]['id']?>/<?=$nghe9[$i-1]['tenkhongdau']?>.html" >
                        <img  src="timthumb.php?src=<?=_upload_nghe_l.$nghe9[$i-1]['photo']?>&h=120&w=160&zc=1&q=100 "  onMouseOver="doTooltip(event, '<?=_upload_nghe_l.$nghe9[$i-1]['photo']?>')" onMouseOut="hideTip()"   />
                    </a>
                </div>
            	
                <div style="float:left; width:160px; margin-top:8px;">
                	<a href="thach-cao/<?=$nghe9[$i-1]['id']?>/<?=$nghe9[$i-1]['tenkhongdau']?>.html" class="maus1"><?=$nghe9[$i-1]['ten_'.$lang]?> </a>
                </div> 
                    
            </div>
        
        <?php if($i%4==0) { ?>
         <div class="line"></div>
         <div style="clear:both"></div>
        <?php } }?>
       
    <?php }?>
<div class="phantrang" ><?=$paging['paging']?></div>
</div>
</div>


