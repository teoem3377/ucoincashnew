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

<div class="khungbao"  style="border-bottom:solid 1px #999999"> 
    <div class="tieude" ><?=$name?></div>
	<div class="noidung" >
    
               
	  <?php for($h=0;$h<count($product);$h++) { ?>
  
         <div class="sanpham">
           <div class="sanpham1 zooms">
                <a href="san-pham/<?=$product[$h]['id']?>/<?=$product[$h]['tenkhongdau']?>.html" >
                <img alt="<?=$product[$h]['ten_'.$lang]?>"  src="<?=_upload_nghe_l.$product[$h]['photo']?>" />
                </a>
            </div>            
            <div class="sanpham3">
                 <a href="san-pham/<?=$product[$h]['id']?>/<?=$product[$h]['tenkhongdau']?>.html" >
                  <?=$product[$h]['ten_'.$lang]?>
                 </a>   
            </div>                                        
            <div class="sanpham3"> Mã số: <?=$product[$h]['maso']?></div>
            <div class="sanpham3" style="color:#0080FF"> Giá: <?=number_format($product[$h]['gia'],0, ',', '.')?> Đ</div>
            
            <div class="sanpham9"><a onclick="addtocart(<?=$product[$h]['id']?>)" href="javascript:()">Đặt hàng</a></div>
               
        </div>
                          
        <?php }?>
             
              
         
        </div>  
 
</div>