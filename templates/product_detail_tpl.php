

<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
<form name="form1" action="index.php">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  <?php if($lang=="vi") {?>  
  		js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  <?php } else { ?>
        js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1";
  <?php }?>
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<link href="css/reset.css" rel="stylesheet" type="text/css" /> 


<script type="text/javascript" src="js/yetii.js"></script>
<script type = "text/javascript" src = "js/magiczoomplus.js"></script>  
<link type = "text/css" rel = "stylesheet" href = "css/magiczoomplus.css" media="screen" />



  <script type="text/javascript">
	$(document).ready(function() {
		  $('.tad').click(function (){
			var str = $(this).attr('value');
			var str1 = $(this).attr('href');
		
			if(str != ''){
				$('#andi').load("ajax_chitiet.php?id="+str+"&giatri="+str1);
			}
			return false;
		});
	});
</script>  


<script type="text/javascript" src="./js/ImageTooltip.js"></script>
<script src="./js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>

<style>
	.loading_div{ width:100%; height:150px; background-color:rgba(0,0,0,0.7); }
</style>


<script type="text/javascript">
$(document).ready(function(){
	$(".jcarouse").jCarouselLite({  // Lấy class của ul và gọi hàm jCarouselLite() trong thư viện
		vertical: false,				// chạy theo chiều dọc
		hoverPause:true,			// Hover vào nó sẽ dừng lại
		visible: 1,					// Số bài viết cần hiện
		auto:8000,					// Tự động scroll
		scroll: 1,
		btnNext: ".next",
        btnPrev: ".prev",
		speed:2500					// Tốc độ scroll
	});
});
</script>






 <div class="khungbao" >
 	<div class="tieude"><?=_chitietsanpham?></div>
    <div class="noidung" style=" padding:10px 0; margin-top:40px">
       
     <div class="imgSP">
                <div class="ProductThumb">
                     <div id="slideShow" class="ImageCarouselBox">               
                        <div class="ProductTinyImageList listImages">
                            <ul id="mycarouselx" class="ulThumbImg scroll jcarousel jcarousel-skin-tango">  
                               
                            <?php 				
                                if(!empty($hinhsp)){
                                    foreach($hinhsp as $item_hinh){
                            ?>    
                                <li>
                                    <div class="TinyOuterDiv">
                                        <div>
                                            <a href="<?=_upload_nghe_l.$item_hinh['photo']?>" rel="zoom-id: Zoomer" rev="<?=_upload_nghe_l.$item_hinh['photo']?>" title="<?=$row_detail['ten']?>"><img src="<?=_upload_nghe_l.$item_hinh['photo']?>" class="jshop_img_thumb" alt="" title="" /></a>
                                                                                           
                                        </div>
                                    </div>
                                </li>
                            <?php
                               }
                            }
                            ?>                                
                            </ul> 
                        </div>
                     </div>
                    
                    <div class="ProductThumbImage">
                        <a id="Zoomer" href="http://g8help.net/upload/nghe/<?=$row_detail['photo']?>" class="MagicZoomPlus"  title="<?=$row_detail['ten_'.$lang]?>"><img src="<?=_upload_nghe_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" title="" /></a>              
                    </div>                             
                </div>
            </div>
            <div class="product_info">
            	<div class="price" style="color:#00f;"><strong><?=$row_detail['ten_vi']?></strong></div> 
                <div class="price" style="color:#000"><?=_masanpham?>: <strong><?=$row_detail['maso']?></strong></div> 
                <div class="price" style=" color:#f00">Giá bán: <strong><?=number_format($row_detail['gia'],0, ',', '.')?> Đ</strong></div>
               <!--                
                <div class="price">Lượt xem: <strong><?=$row_detail['luotxem']+960+$row_detail['id']?></strong></div>  
                -->
                <div class="price"  style="background:#090; width:100px; color:#fff; height:20px; line-height:20px; text-align:center"><a style="color:#fff" onclick="addtocart(<?=$row_detail['id']?>)" href="javascript:()">Đặt hàng</a></div>               
              
                <div class="price"> <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-519dbc9575f35bad"></script>
                 <!-- AddThis Button END --> 
               </div>
               
			</div>
            <div class="clear"></div>
    
   
 
</div>
</div>

<div class="khungbao" style="margin:10px 0 10px 0; min-height:100px" >
    <div class="tieude" >
    		CHI TIẾT SẢN PHẨM                       
    </div>
    
      <div class="noidung" style="padding:45px 15px 15px 15px; width:97%; font-size:14px; line-height:25px;">
      	<?=$row_detail['chitiet_vi']?>      
	</div>
    
 </div>

