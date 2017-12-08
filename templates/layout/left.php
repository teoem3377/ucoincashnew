<?php

    
	$d->reset();
	$sql = "select * from #_product_list where hienthi=1 order by stt asc";
	$d->query($sql);
	$danhmuc = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_yahoo where hienthi=1 order by stt,id asc";
	$d->query($sql);
	$yahoo = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_setting ";
	$d->query($sql);
	$company = $d->fetch_array();
		
	$d->reset();
	$sql = "select * from #_news where hienthi=1  order by id desc";
	$d->query($sql);
	$tintuc = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_lkweb where hienthi=1 order by stt,id asc";
	$d->query($sql);
	$doitac = $d->result_array();
	
?>

</script>




<!-- JQ Accordion -->
<script type='text/javascript' src='js/jquery.cookie.js'></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcjqaccordion.2.7.min.js'></script>
<script>
jQuery(document).ready(function($){
    jQuery('#accordion-1').dcAccordion({
    	eventType: 'hover',
    	autoClose: true,
    	saveState: true,
    	disableLink: false,
    	speed: 'slow',
    	showCount: false,
    	autoExpand: true,
    	cookie	: 'dcjq-accordion-1',
    	classExpand	 : 'dcjq-current-parent'
    });						
});
</script>
<!-- JQ Accordion -->



<div class="danhmucsp">
        <div class="titlex">MENU HỆ THỐNG</div>
        <div class="content"> 
        
    	    <div class="memu"><a href="home.html">Trang chủ</a></div>                         
            <div class="memu"><a href="thongtincanhan.html">Thông tin cá nhân</a></div> 
            <div class="memu"><a href="cayhethong.html">Cây hệ thống</a></div>
            <div class="memu"><a href="danhsachpin.html">Danh sách Pin</a></div>
            <div class="memu1"><a href="lichsunhanpin.html">Lịch sử nhận Pin</a></div>
            <div class="memu1"><a href="lichsuchuyenpin.html">Lịch sử chuyển Pin</a></div>            
            <div class="memu"><a href="lenhph.html">Lệnh PH</a></div>
            <div class="memu"><a href="lenhgh.html">Lệnh GH</a></div>
            <div class="memu"><a href="tienhoahong.html">Rút hoa hồng</a></div>
            <div class="memu"><a href="taonguoichoi.html">Tạo người chơi</a></div>
            <div class="memu"><a href="thaymatkhau.html">Thay mật khẩu</a></div>
            <?php if($_SESSION['login']['maso']=='VINA206054'){?>
            <div class="memu"><a href="doipas.html">Đổi Pas cấp dưới</a></div>
            <?php }?>
            <div class="memu"><a href="dangxuat.html">Thoát</a></div> 
                   
         
      </div>        
   
</div>

<style>
.memu{
	width:200px;
	height:50px;
	line-height:50px;
	background:url(./images/kichhoat.png) no-repeat center left;
	padding-left:30px;
	margin-left:10px;
}
.memu a{
	color:#007DFB;
	font-size:22px;
	font-weight:bold;
}
.memu a:hover{
	color:#f00;	
}
.memu:hover{
	background:url(./images/chuakichhoat.png) no-repeat center left;
	
}


.memu1{
	width:160px;
	height:30px;
	line-height:30px;
	background:url(./images/kichhoat.png) no-repeat center left;
	padding-left:30px;
	margin-left:30px;
}
.memu1 a{
	color:#346767;
	font-size:19px;
	font-weight:bold;
}
.memu1 a:hover{
	color:#f00;	
}
.memu1:hover{
	background:url(./images/chuakichhoat.png) no-repeat center left;
	
}

</style>









