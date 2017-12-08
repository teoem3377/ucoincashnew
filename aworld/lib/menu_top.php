<?php         
    $d->reset();
    $sql_dm_dichvu = "select id,ten,tenkhongdau from #_service order by stt,id desc";
    $d->query($sql_dm_dichvu);
    $result_dm_dichvu = $d->result_array();
    
    $d->reset();
    $sql_dm_gioithieu = "select id,ten,tenkhongdau from #_about order by stt,id desc";
    $d->query($sql_dm_gioithieu);
    $result_dm_gioithieu = $d->result_array();
    
    $d->reset();
    $sql_dm_tailieu = "select id,ten,tenkhongdau from #_news_item order by stt,id desc";
    $d->query($sql_dm_tailieu);
    $result_dm_tailieu = $d->result_array();
    
    $d->reset();
    $sql_dm_tuyendung = "select id,ten,tenkhongdau from #_tuyendung_item order by stt,id desc";
    $d->query($sql_dm_tuyendung);
    $result_dm_tuyendung = $d->result_array();
    
    $d->reset();
    $sql_dm_chamsockh = "select id,ten,tenkhongdau from #_chamsockh_item order by stt,id desc";
    $d->query($sql_dm_chamsockh);
    $result_dm_chamsockh = $d->result_array();
?>
<ul>
    <li><a href="#">Trang chủ</a></li>
    <li><a href="gioi-thieu.html">Giới thiệu</a>
        <ul>
            <?php 
            if(count($result_dm_gioithieu)== 0){
                echo "<li>Nội dung đang cập nhật...</li>";
            }else {
            for($i=0,$count_dm_gioithieu=count($result_dm_gioithieu);$i<$count_dm_gioithieu;$i++){ ?>
            <li><a href="gioi-thieu/<?=$result_dm_gioithieu[$i]['tenkhongdau']?>-<?=$result_dm_gioithieu[$i]['id']?>.html"><?=$result_dm_gioithieu[$i]['ten']?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li><a href="dich-vu.html">Dịch vụ</a>
        <ul>
            <?php 
            if(count($result_dm_dichvu)== 0){
                echo "<li>Nội dung đang cập nhật...</li>";
            }else {
            for($i=0,$count_dm_dichvu=count($result_dm_dichvu);$i<$count_dm_dichvu;$i++){ ?>
            <li><a href="dich-vu/<?=$result_dm_dichvu[$i]['tenkhongdau']?>-<?=$result_dm_dichvu[$i]['id']?>.html"><?=$result_dm_dichvu[$i]['ten']?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li><a href="tin-tuc.html">Tin tức</a>
        <ul>
            <?php 
            if(count($result_dm_tailieu)== 0){
                echo "<li>Nội dung đang cập nhật...</li>";
            }else {
            for($i=0,$count_dm_tailieu=count($result_dm_tailieu);$i<$count_dm_tailieu;$i++){ ?>
            <li><a href="tin-tuc/<?=$result_dm_tailieu[$i]['tenkhongdau']?>-<?=$result_dm_tailieu[$i]['id']?>.html"><?=$result_dm_tailieu[$i]['ten']?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li><a href="tuyen-dung.html">Tuyển dụng</a>
        <ul>
            <?php 
            if(count($result_dm_tuyendung)== 0){
                echo "<li>Nội dung đang cập nhật...</li>";
            }else {
            for($i=0,$count_dm_tuyendung=count($result_dm_tuyendung);$i<$count_dm_tuyendung;$i++){ ?>
            <li><a href="tuyen-dung/<?=$result_dm_tuyendung[$i]['tenkhongdau']?>-<?=$result_dm_tuyendung[$i]['id']?>.html"><?=$result_dm_tuyendung[$i]['ten']?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li><a href="cham-soc-khach-hang.html">Chăm sóc KH</a>
        <ul>
            <?php 
            if(count($result_dm_chamsockh)== 0){
                echo "<li>Nội dung đang cập nhật...</li>";
            }else {
            for($i=0,$count_dm_chamsockh=count($result_dm_chamsockh);$i<$count_dm_chamsockh;$i++){ ?>
            <li><a href="cham-soc-khach-hang/<?=$result_dm_chamsockh[$i]['tenkhongdau']?>-<?=$result_dm_chamsockh[$i]['id']?>.html"><?=$result_dm_chamsockh[$i]['ten']?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li><a href="lien-he.html">Liên hệ</a></li>
    <li><a href="ban-do.html">Bản đồ</a></li>
</ul>