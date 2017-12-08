<div class="khungbao" >
    <div class="tieude" ><?=_dichvu?></div>
    <div class="noidung">
   <div style="width:560px; float:left; padding:0 0 20px 10px; text-align:justify;">
        <!--<div class="img_detail_tintuc">
            <img src="<?=_upload_news_l.$row_detail['photo']?>" width="300" height="216" onmouseover="doTooltip(event, '<?=_upload_news_l.$row_detail['photo']?>')" onmouseout="hideTip()"/>
        </div>-->
        <div >
            <p class="tieudetin"><?=$row_detail['ten_'.$lang]?></p>
           <!-- <p class="small"><?=_dangluc?>: <?=date('d-m-Y h:i:s A',$row_detail['ngaytao'])?> - <?=_luotxem?>: <?=$row_detail['luotxem']?></p>
            <p class="mota"><?=$row_detail['mota_'.$lang]?></p>-->
            <div class="clear"></div>
           <div class="maxhinh" style="text-align:justify; line-height:22px; font-size:14px;"> <?=$row_detail['noidung_'.$lang]?></div>
        </div>
        <div class="tinlienquan">
            <p style="font-size:16px; margin:10px 0 5px 0; color:red"><?=_baivietkhac?></p>
            <ul>
                <?php for($i=0,$count=count($tintuc_khac);$i<$count;$i++) { ?>
                <li><a href="dich-vu/<?=$tintuc_khac[$i]['id']?>/<?=$tintuc_khac[$i]['tenkhongdau']?>.html"><?=$tintuc_khac[$i]['ten_'.$lang]?> (<?=date('d-m-Y',$tintuc_khac[$i]['ngaytao'])?> - <?=_luotxem?>: <?=$tintuc_khac[$i]['luotxem']?>)</a></li>
                <?php } ?>
            </ul>
        </div>
        </div>
    </div><!-- End .box_tintuc -->
</div>