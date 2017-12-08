
<?php  if(!defined('_source')) die("Error");	
@define ( '_lib' , './aworld/lib/');	
	// thanh tieu de
	$title_bar .= "Đặt hàng ";
	
	
		
		$nguoinhan=$_POST['nguoinhan'];
		$dienthoainguoinhan=$_POST['dienthoainguoinhan'];
		$diachinguoinhan=$_POST['diachinguoinhan'];
			
			//validate dữ liệu
		
		$nguoinhan = trim(strip_tags($nguoinhan));
		$dienthoainguoinhan = trim(strip_tags($dienthoainguoinhan));	
		$diachinguoinhan = trim(strip_tags($diachinguoinhan));	
		
		if (get_magic_quotes_gpc()==false) {
			$nguoinhan = mysql_real_escape_string($nguoinhan);
			$dienthoainguoinhan = mysql_real_escape_string($dienthoainguoinhan);
			$diachinguoinhan = mysql_real_escape_string($diachinguoinhan);
							
		}
				
		if ($nguoinhan == "") { 
			transfer("Chưa nhập họ tên người nhận!", "xac-nhan.html");
		} 
		if ($dienthoainguoinhan == "") { 
			transfer("Chưa nhập số điện thoại người nhận!", "xac-nhan.html");
		}
		if ($diachinguoinhan == "") { 
			transfer("Chưa nhập địa chỉ người nhận!", "xac-nhan.html");
		}	
		
		
		
			
				
				 $body.='<table border="0" cellpadding="5px" cellspacing="1px" style=" font-size:13px; background-color:#E1E1E1; padding:5px;" width="100%">';
				if(is_array($_SESSION['cart']))
				{
					$body.='<tr bgcolor="#075992"><td height=30px align="center" style="font-weight:bold;color:#FFF">STT</td><td  align="center" style="font-weight:bold;color:#FFF">Tên</td><td  align="center" style="font-weight:bold;color:#FFF">Mã SP</td><td align="center" style="font-weight:bold;color:#FFF">Giá</td><td align="center" style="font-weight:bold;color:#FFF">Số lượng</td><td align="center" style="font-weight:bold;color:#FFF">Tổng giá</td></tr>';
					$max=count($_SESSION['cart']);
					for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];					
						$pname=get_product_name($pid,$lang);
						$masp=get_masox($pid);					
						if($q==0) continue;
						$body.='<tr bgcolor="#FFFFFF"><td  height=30px width="8%" align="center">'.($i+1).'</td>';
						$body.='<td  align="center"width="35%">'.$pname;				
						$body.='</td>';
						$body.='<td  align="center"width="12%">'.$masp;				
						$body.='</td>';
						$body.='<td align="center" width="15%">'.number_format(get_price($pid),0, ',', '.').'&nbsp;VNĐ</td>';
						$body.='<td align="center" width="15%">'.$q.'</td>';                 
						$body.='<td align="center">'.number_format(get_price($pid)*$q,0, ',', '.') .'&nbsp;VNĐ</td>
						</tr>
						';
					}
					$body.='<tr><td colspan="5">
				  <table width="100%" cellpadding="0" cellspacing="0" border="0">
				  <tr>
				  <td style="text-align:left;"> '; 
				   $body.=' <strong>Tổng giá bán:'. number_format(get_order_total(),0, ',', '.') .' &nbsp;VNĐ</strong></td>
				  <td colspan="5" align="right">&nbsp;</td>
				 </tr>
				 </table>   
					</td></tr>';
				}
				else{
					$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
				}
			   $body.='</table>';
				
				$madonhang=date("dmY",time())."_".ChuoiNgauNhien(6);
				$maso=$_SESSION['login']['maso'];
				$sotien=get_order_total();
				$ngaytao=strtotime(date("Y-m-d H:i:s",time()));
				$nguoitao=$_SESSION['login']['maso'];		
				
				
				$sql = "INSERT INTO  table_donhang (madonhang,maso,sotien,lydo,nguoinhan,dienthoainguoinhan,diachinguoinhan,ngaytao,nguoitao,trangthai) 
					  VALUES ('$madonhang','$maso','$sotien','$body','$nguoinhan','$dienthoainguoinhan','$diachinguoinhan','$ngaytao','$nguoitao','1')";	
				mysql_query($sql) or die(mysql_error());
				$iduser = mysql_insert_id();
				
				unset($_SESSION['cart']);		
				transfer("Đặt hàng thành công!<br/>", "san-pham.html");		
						
	
	
?>