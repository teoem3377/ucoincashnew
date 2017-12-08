<div class="khungbao" >
    <div class="tieude" >Bài viết: <?=$row_detail['ten_'.$lang]?></div>
    <div class="noidungs">
        <div style="width:95%; padding-left:2%; line-height:25px;"> 
        <?=$row_detail['noidung_'.$lang]?>
        </div>
        <div class="tinlienquan">
            <p style="font-size:16px; margin:10px 0 5px 0; color:red"><?=_baivietkhac?></p>
            <ul>
                <?php for($i=0,$count=count($tintuc_khac);$i<$count;$i++) { ?>
                <li><a href="bai-viet/<?=$tintuc_khac[$i]['id']?>/<?=$tintuc_khac[$i]['tenkhongdau']?>.html"><?=$tintuc_khac[$i]['ten_'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </div>
       
    </div><!-- End .box_tintuc -->
</div>