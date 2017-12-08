<script type="text/javascript" src="./js/ImageTooltip.js"></script>
<script type="text/javascript" src="./js/fotorama.js"></script>
<link rel="stylesheet" type="text/css" href="./css/fotorama.css"/>

<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.js"></script>
<link rel="stylesheet" type="text/css" href="./css/fancybox/jquery.fancybox-1.3.4.css"/>
<?php 
 

	$d->reset();
    $sql="select * from #_nghe_list where id=".$row_detail['id_list'];
	$d->query($sql);
	$list=$d->fetch_array(); 

	
	
    
?>

 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="khungbao" >
    <div class="tieude" ><span class="maus3"><?=_chitietsanpham?></span></div>
    <div class="noidung" style="position:relative">
        <div  id="fotorama"  data-width="350" data-height="250" style="margin-left:5px"> </div>
        <div style="width:340px; position:absolute; top:1px; right:10px" >
        	<div style="float:left; width:340px; color:#00F"><span style=" font-weight:bold; color:#333"><?=_tensanpham?>:</span> <?=$row_detail['ten_'.$lang]?></div>
            <div style="float:left; width:340px;color:#00F"><span style=" font-weight:bold; color:#333"><?=_masanpham?>:</span> <?=$row_detail['maso']?></div>
            <div style="float:left; width:340px;"><span style=" font-weight:bold; color:#333"><?=_mota?>:</span> <?=$row_detail['mota_'.$lang]?></div>
        </div>
        
 </div>
  <div class="noidung">
  	<div style="float:left; width:720px; text-align:justify; margin:10px 0" class="maxhinh">
    	<?=$row_detail['chitiet_'.$lang]?>
    </div>
    <div style="float:left; width:720px; margin:3px 0 10px 0; color:#00F; font-weight:bold; font-size:20px;"><?=_thongsokythuat?>:</div>
    <div style="float:left; width:720px; margin:3px 0 10px 0">
    
   	  <table width="718" height="65" border="1" cellpadding="0" cellspacing="0">
    	  <tr >
    	    <td width="218" height="29" align="center" style="background:#decca6"><?=_hangmuc?></td>
    	    <td width="154" align="center" style="background:#decca6"><?=_kichthuoc?>(mm)</td>
    	    <td width="147" align="center" style="background:#decca6"><?=_trongluong?></td>
    	    <td width="189" align="center" style="background:#decca6"><?=_ghichu1?></td>
  	    </tr>
    	  <tr>
    	    <td height="34" align="center"><?=$list['ten_'.$lang]?></td>
    	    <td align="center"><?=$row_detail['kichthuoc']?></td>
    	    <td align="center"><?=$row_detail['trongluong']?></td>
    	    <td align="center"><?=$row_detail['ghichu_'.$lang]?></td>
  	    </tr>
  	  </table>
    </div>
      <div style="float:left; width:720px; margin:3px 0 10px 0; color:#00F; font-weight:bold; font-size:20px;"><?=_ykienkhachhang?>:</div>
      <div style="float:left; width:720px; margin:3px 0 10px 0">
      		<div  class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="710"></div>  
      </div>
  </div>
</div><!-- End .box_tintuc -->





<script>
$(function () {
	var imgData = [
	{img: 'timthumb.php?src=<?=_upload_nghe_l.$row_detail['photo']?>&h=400&w=600&zc=1&q=100', href: 'timthumb.php?src=<?=_upload_nghe_l.$row_detail['photo']?>&h=400&w=600&zc=1&q=100'}, 
	<?php   for($j=0;$j<count($hinhsp9);$j++) {?>		
		{img: 'timthumb.php?src=<?=_upload_product_l.$hinhsp9[$j]['photo']?>&h=400&w=600&zc=1&q=100', href: 'timthumb.php?src=<?=_upload_product_l.$hinhsp9[$j]['photo']?>&h=400&w=600&zc=1&q=100'}, 
	<?php } ?>	
	];

	/*! Photos by Alexei Lebedev: http://alexeilebedev.com/ */

	$.fn.noop = function(){return this};
	var fotorama = $('#fotorama');

fotorama.fotorama({
  data: imgData,
  width: 400,
  aspectRatio: 700/467,
  thumbsPreview: true,
  caption: 'simple',
  nav: 'thumbs',
  autoplay: true,
  onClick: function(data){
    var fotoramaClasses = fotorama.attr('class');
    var fotoramaTouchStyle = fotorama.data('options').touchStyle;
    // fancybox manual call
			$.fancybox(fotorama.data('options').data,
			{
				type: 'image',
				index: data.index,
				changeFade: 333,
				transitionIn: 'elastic',
				transitionOut: 'elastic',
				padding: 0,
				orig: $('.fotorama__wrap', fotorama),
				onStart: function(fancybox, i) {
					$.extend(fotorama.data('options'), {touchStyle: false});
					fotorama
							.trigger('showimg', [i, 333])
							.removeClass('fotorama_csstransitions')
							.find('.fotorama__wrap')
							.removeClass('fotorama__wrap_style_touch')
							.addClass('fotorama__wrap_style_fade')
							.find('.fotorama__frame').not('.fotorama__frame_active')
							[fotoramaTouchStyle ? 'fadeTo': 'noop'](0, 0);
				},
				onClosed: function() {
					$.extend(fotorama.data('options'), {touchStyle: fotoramaTouchStyle});
					fotorama
						.trigger('showimg', [undefined, 0])
						.attr({'class': fotoramaClasses})
						.find('.fotorama__wrap')
						[fotoramaTouchStyle ? 'addClass' : 'removeClass']('fotorama__wrap_style_touch')
						[!fotoramaTouchStyle ? 'addClass' : 'removeClass']('fotorama__wrap_style_fade')
						.find('.fotorama__frame')
						[fotoramaTouchStyle ? 'fadeTo': 'noop'](0, 1);
				}
			});

			// stop fotorama
			return false;
		}
	});
});
</script>











<div class="khungbao" >
    <div class="tieude" ><span class="maus3"><?=_sanphamcungloai?></span></div>
    <div class="noidung">
    	<?php for($i=1,$count=count($other_nghe);$i<=$count;$i++) { ?>
        	   <div style="float:left; width:160px; margin:8px 0 0 13px;">
            	<div style="float:left; width:160px; box-shadow:2px 2px 3px  #999999">
                    <a href="thach-cao/<?=$other_nghe[$i-1]['id']?>/<?=$other_nghe[$i-1]['tenkhongdau']?>.html" >
                        <img  src="timthumb.php?src=<?=_upload_nghe_l.$other_nghe[$i-1]['photo']?>&h=120&w=160&zc=1&q=100 "  onMouseOver="doTooltip(event, '<?=_upload_nghe_l.$other_nghe[$i-1]['photo']?>')" onMouseOut="hideTip()"   />
                    </a>
                </div>
            	
                <div style="float:left; width:160px; margin-top:8px;">
                	<a href="thach-cao/<?=$other_nghe[$i-1]['id']?>/<?=$other_nghe[$i-1]['tenkhongdau']?>.html" class="maus1"><?=$other_nghe[$i-1]['ten_'.$lang]?> </a>
                </div> 
                    
            </div>
        
			<?php if($i%4==0) { ?>
             <div class="line"></div>
             <div style="clear:both"></div>
        <?php }} ?>
    
    </div><!-- End .box_tintuc -->
</div>




