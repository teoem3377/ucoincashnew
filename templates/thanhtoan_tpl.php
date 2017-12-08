


<script language="javascript" src="aworld/media/scripts/my_script.js"></script>

<script type="text/javascript">


function check9()
		{
			var frm = document.frmDH;
			
			if(frm.nguoinhan.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên của người nhận." );
				frm.nguoinhan.focus();
				return false;
			}
			
			if(frm.dienthoainguoinhan.value=='') 
			{ 
				alert( "Bạn chưa điền điện thoại của người nhận." );
				frm.dienthoainguoinhan.focus();
				return false;
			}
			
			
			if(!isNumber(document.getElementById('dienthoainguoinhan'), "Số điện thoại phải là số, vui lòng kiểm tra lại!")){
				document.getElementById('dienthoainguoinhan').focus();
				return false;
			}
					
			
			if(frm.diachinguoinhan.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ của người nhận." );
				frm.diachinguoinhan.focus();
				return false;
			}										
			frm.submit();		
		}
			
</script>
<div class="khungbao" >
    <div class="tieude">Thông tin giao hàng</div>
    <div class="noidung">
   	  <div class="box_thanhtoan" style="margin-left:50px">
            <table border="0" cellpadding="5px" cellspacing="1px" style="font-size:13px; background-color:#E1E1E1;" width="1100px">
        	    <?php
    			if(is_array($_SESSION['cart'])){
                	echo '<tr bgcolor="#5F9601" style="font-weight:bold;color:#FFF"><td  height="30px" align="center">STT</td><td align="center">'._ten.'</td><td align="center">Mã SP</td><td align="center">'._gia.'</td><td align="center">'._soluong.'</td><td align="center">'._tonggia.'</td></tr>';
    				$max=count($_SESSION['cart']);
    				for($i=0;$i<$max;$i++){
    					$pid=$_SESSION['cart'][$i]['productid'];
    					$q=$_SESSION['cart'][$i]['qty'];				
    					$pname=get_product_name($pid,$lang);
						$masp=get_masox($pid);
    
    					if($q==0) continue;
    			?>
                		<tr bgcolor="#FFFFFF"><td width="6%" align="center" height="30px"><?=$i+1?></td>
                		<td width="35%"  height="18px" align="center"><?=$pname?></td>
                        <td width="12%"  height="18px" align="center"><?=$masp?></td>
                        <td width="12%" align="center">
                                
                                  <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ
                        </td>
                        <td width="15%" align="center"><?=$q?></td>                    
                        <td width="15%" align="center">
						                            
                                  <?=number_format(get_price($pid)*$q,0, ',', '.')?>
						
                        </td>                  
                		</tr>
                <?					
    				}
    			?>
    				<tr><td colspan="5">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                  <td style="color: #005093; font-size:16px" height="50px"> 
                                    
                      <b><?=_tonggiaban?>: <span style="color:#f00"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VNĐ</span></b>
                     
                    </td>
                  <td colspan="5" align="right">&nbsp;</td>
                 </tr>
                 </table>   
                    </td></tr>
    			<?
                }
    			else{
    				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
    			}
    		?>
            </table>
        <form method="post" name="frmDH" action="thanh-toan.html" enctype="multipart/form-data" >          
        <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe" >   
          <tr>
            <td colspan="2" style="color: #060; font-size:18px" align="left" height="35px"><b><i><?=_thongtinkhachhang?></i></b></td>                
          </tr>
          <tr>
            <td align="right" class="thanhtoan">Họ tên người nhận</td>        
            <td align="left"><input name="nguoinhan" id="nguoinhan"  value="<?=$taikhoan['nguoinhan']?>"  class="thanhtoan1"/><span>(*)</span></td>
          </tr>
          <tr>
            <td align="right" class="thanhtoan">Số điện thoại người nhận</td>
            <td align="left"><input name="dienthoainguoinhan" id="dienthoainguoinhan" value="<?=$taikhoan['dienthoainguoinhan']?>" class="thanhtoan1"/><span>(*)</span></td>
          </tr>
          
          <tr>
            <td align="right" class="thanhtoan">Địa chỉ người nhận</td>
            <td align="left"><input  name="diachinguoinhan"  id="diachinguoinhan"   value="<?=$taikhoan['diachinguoinhan']?>" class="thanhtoan1"/><span>(*)</span></td>
           </tr>
                        
        </table>
    
        <div style="text-align:left; padding:20px 50px 10px 0;">
          
            <input title='Kết thúc đặt hàng' style="padding:2px 3px" class="button border_radius"  type="button" name="next" value="Kết thúc đặt hàng" style="cursor:pointer;" onclick="check9()"/>  
        </div>
          </form>      
        </div><!-- End .box_thanhtoan -->  
    </div><!-- End .content_box_primary -->
</div><!-- End .box_primary --> 






<style type="text/css">

.tablelienhe {
	margin-top:20px;
}
.thanhtoan {
	font-size:14px;
	color:#00F;
	padding-right:5px;
	height:32px;
}
.thanhtoan1 {
	width:410px;	
	background:#FFC;
}
</style>




