


<link rel="stylesheet" type="text/css" href="./css/blitzer/jquery-ui-1.8.18.custom.css"/>
<script type="text/javascript" src="./js/jquery-ui-1.8.18.custom.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){						
	var dates = $( "#batdau, #ketthuc" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'dd/mm/yy',
			changeMonth: true,			
			maxDate: 0,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "batdau" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
		
    })
</script>

<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function guidi() {
	
	    var d=new Date();

		
		var ngay=d.getDate();
		
		var thang=d.getMonth()+1;
		
		var nam=d.getFullYear();
	    
		var abc = ngay+"/"+thang+"/"+nam;
	
		 
		var batdau = document.getElementById("batdau").value;
		var ketthuc = document.getElementById("ketthuc").value;	
		
		if(batdau=='') batdau = "01/"+thang+"/"+nam;
		if(ketthuc=='') ketthuc = ngay+"/"+thang+"/"+nam;
		
		if(batdau=='' && ketthuc==''){
			batdau = "01/"+thang+"/"+nam;
			ketthuc = ngay+"/"+thang+"/"+nam;
		}
			
		//var encoded = Base64.encode(keyword);
		location.href = "cap-duoi/"+batdau+"/"+ketthuc+".html";
		loadPage(document.location);
			
}

</script>

<?php
	if($ngaybatdau1=="//")
		$date_bd="";
	else
		$date_bd = $ngaybatdau1;

    if($ngayketthuc1=="//")
		$date_kt="";
	else
		$date_kt = $ngayketthuc1;

?>

<div class="khungbao" >
 	<div class="tieude">Cấp dưới của <?=$_SESSION['login']['hoten']?> ( <?=$_SESSION['login']['maso']?> )</div>
    <div class="noidung" >
     <div style="float:left; margin:10px; width:970px; font-size:13px;">
                
                Từ ngày <input type="text" name="batdau" id="batdau" value="<?=$date_bd?>" class="input" />
                Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="<?=$date_kt?>" class="input" />            
                <input type="button" value=" Tìm "  onclick="guidi();"/>
                
        </div>
      
        
      <table width="1000" border="0" cellpadding="1" cellspacing="1">
          <tr style="font-size:13px; background:#6CF">
            <td align="center" height="30" width="5%"><strong>STT</strong></td>
            <td align="center" width="18%"><strong>Họ tên</strong></td>
            <td align="center" width="11%"><strong>Mã số</strong></td>
            <td align="center" width="11%"><strong>SĐT</strong></td>
            <td align="center" width="11%"><strong>Chức vụ</strong></td>
            <td align="center" width="11%"><strong>Doanh số</strong></td>            
            <td align="center" width="11%"><strong>Ngày vào</strong></td>
          </tr>
          
          
		  <?php for($i=0;$i<count($danhsachcon);$i++){    
               
			  if(($i+1)%2==0) $mau='#E2F1F1';
			  else $mau='#DFFFFF';
			  
		    $chuoi = "select ten_vi from #_product_list where id='".$danhsachcon[$i]['id_list']."'";		
			$d->query($chuoi);
			$chucvu = $d->fetch_array();	
			  
			  
          ?>
           <tr style="font-size:13px; background: <?=$mau?>">
                <td align="center" height="25"><?=$i+1?></td>
                <td style="padding:4px 0 4px 4px;"><?=$danhsachcon[$i]['hoten']?></td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=$danhsachcon[$i]['maso']?></td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=$danhsachcon[$i]['dienthoai']?></td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=$chucvu['ten_vi']?></td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=number_format(doanhso_1thang($danhsachcon[$i]['maso'],$koco1,$koco2),0, ',', '.')?> VNĐ</td>               
                <td align="center" style="padding:4px 0 4px 4px;"><?=date('d/m/Y',$danhsachcon[$i]['ngaytao'])?></td>
           </tr> 
          <?php }?>
         
                   
        </table>
         <div class="phantrang" ><?=$paging['paging']?></div>
    </div>
</div>


