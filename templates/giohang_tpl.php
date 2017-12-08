<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Bạn có thật sự muốn xóa?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('Bạn sẽ xoa tất cả?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>

<div class="khungbao" >
    <div class="tieude"><?=_giohang?></div>
    
    <div class="noidung">
    
    	<div class="box_cart">
        	<form name="form1" method="post">
                <input type="hidden" name="pid" />
                <input type="hidden" name="command" /> 
        				<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Arial, Geneva, sans-serif; font-size:12px; margin-left:1%" width="96%">
            	   <?php
        			if(is_array($_SESSION['cart'])){
                    	echo '<tr bgcolor="#5F9601" style="font-weight:bold;color:#FFF"><td height="30px" align="center">STT</td><td  align="center">Sản phẩm</td><td  align="center">Mã SP</td><td align="center">'._gia.'</td><td align="center">'._soluong.'</td><td align="center">'._tonggia.'</td><td align="center">'._xoa.'</td></tr>';
        				$max=count($_SESSION['cart']);
        				for($i=0;$i<$max;$i++){
        					$pid=$_SESSION['cart'][$i]['productid'];
        					$q=$_SESSION['cart'][$i]['qty'];					
        					$pname=get_product_name($pid,$lang);
							$masp=get_masox($pid);
        					if($q==0) continue;
        			?>
                    		<tr bgcolor="#FFFFFF"><td width="8%"  height="40px" align="center"><?=$i+1?></td>
                    		<td width="35%" align="center"><?=$pname?></td>
                            <td width="15%" align="center"><?=$masp?></td>
                            <td width="10%" align="center">                            
                             <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ 
                          
                            </td>
                            <td width="10%" align="center"><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #333" />&nbsp;</td>                    
                            <td width="15%" align="center">
							
                             <?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;VNĐ
                             
                            
                            </td>
                            <td width="10%" align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/delete.png" width="15px" height="15px" border="0" title="<?=_xoa?>" /></a></td>
                    		</tr>
                      <? } ?>
        				<tr><td colspan="6" style="background:#E6E6E6; color:#005093; font-size: 13px;" height="20px">
                       
                                                
                            
                              <b><?=_tonggiaban?>: <span style="color:#f00"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VNĐ</span></b>
                                                       
                          
                       
                        </td></tr>
                        <tr>
                        	<td colspan="6" align="right" height="30px">
                             <input style="padding:2px 3px" type="button" value="<?=_muatiep?>" onclick="window.location='http://<?=$config_url?>/san-pham.html'" class="button border_radius" title="<?=_muatiep?>" />&nbsp;
                             <input style="padding:2px 3px" type="button" value="<?=_xoatatca?>" onclick="clear_cart()" class="button border_radius" title="<?=_xoatatca?>" />&nbsp;&nbsp;<input type="button" style="padding:2px 3px" value="<?=_capnhat?>" onclick="update_cart()" class="button border_radius" title="<?=_capnhat?>"/>&nbsp;&nbsp;<input type="button" style="padding:2px 3px" value="Đặt hàng" onclick="window.location='http://<?=$config_url?>/xac-nhan.html'" class="button border_radius" title="Đặt hàng" />
                            </td>
                        </tr>
        			<?
                    }
        			else{
        				echo "<tr bgColor='#FFFFFF'><td>"._khongcosanpham."</td>";
        			}
        		?>
                </table>			
          </form>
      </div>
    </div><!-- End .content_box_primary -->
</div><!-- End .box_primary -->   