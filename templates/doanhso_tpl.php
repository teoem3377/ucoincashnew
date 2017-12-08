

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
		location.href = "doanh-so/"+batdau+"/"+ketthuc+".html";
		loadPage(document.location);
			
}

</script>




<div class="khungbao" >
 	<div class="tieude">Doanh số - <?=$_SESSION['login']['hoten']?> ( <?=$_SESSION['login']['maso']?> )  </div>
    <div class="noidung" >
     
        
        <div style="float:left; margin:10px; width:970px; font-size:13px;">
                
                Từ ngày <input type="text" name="batdau" id="batdau" value="<?=$ngaybatdau1?>" class="input" />
                Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="<?=$ngayketthuc1?>" class="input" />            
                <input type="button" value=" Tìm "  onclick="guidi();"/>
                
        </div>
        
      <table width="1000" border="0" cellpadding="1" cellspacing="1">
          <tr style="font-size:13px; background:#6CF">
            <td align="center" height="30" width="5%"><strong>STT</strong></td>
            <td align="center" width="15%"><strong>Doanh số</strong></td>
            <td align="center" width="15%"><strong>Hoa hồng</strong></td>
            <td align="center" width="25%"><strong>Lý do</strong></td>
            <td align="center" width="30%"><strong>Ghi chú</strong></td>
            <td align="center" width="15%"><strong>Ngày nhập</strong></td>
          </tr>
          
          
		  <?php for($i=0;$i<count($bangluong);$i++){    
               
			  if(($i+1)%2==0) $mau='#E2F1F1';
			  else $mau='#DFFFFF';
          ?>
           <tr style="font-size:13px; background: <?=$mau?>">
                <td align="center" height="25"><?=$i+1?></td>
                <td style="padding:4px 0 4px 4px;"><?php if($bangluong[$i]['tien']==0) echo ""; else echo number_format($bangluong[$i]['tien'],0, ',', '.')." VNĐ";?> </td>
                <td style="padding:4px 0 4px 4px;"><?=number_format($bangluong[$i]['luong'],0, ',', '.')?> VNĐ</td>
                <td style="padding:4px 0 4px 4px;"><?=$bangluong[$i]['lydo']?></td>
                <td style="padding:4px 0 4px 4px;"><?=$bangluong[$i]['ghichu']?></td>
                <td style="padding:4px 0 4px 4px;"><?=date('d/m/Y',$bangluong[$i]['ngaytao'])?></td>
           </tr> 
          <?php }?>
         
                   
        </table>
         <div class="phantrang" ><?=$paging['paging']?></div>
       <table width="1000" border="1" cellpadding="0" cellspacing="0" style="margin-top:30px">
          <tr>
            <td align="center" height="30"><strong>Doanh số cá nhân</strong></td>
            <td align="center"><strong>Doanh số hệ thống</strong></td>
            <td align="center"><strong>Tổng hoa hồng</strong></td>
            <td align="center"><strong>Hỗ trợ</strong></td>
          </tr>         
          <tr>
            <td align="center" height="30"><strong><span style="color:#00f">
            <?=number_format($ds_cn,0, ',', '.')?> 
            VNĐ</span></strong></td>
            <td align="center"><strong><span style="color:#00f">
            <?=number_format($ds_ht,0, ',', '.')?> 
            VNĐ</span></strong></td>
            <td align="center"><strong><span style="color:#f00">
            <?=number_format($hoahong,0, ',', '.')?> 
            VNĐ</span></strong></td>
            <td align="center"><strong><span style="color:#f00">
            <?=number_format($hotro,0, ',', '.')?> 
            VNĐ</span></strong></td>
          </tr>
           <tr>
            <td colspan="4" height="30"><strong>&nbsp;&nbsp;&nbsp;Thực lãnh: <span style="color:#f00">
            <?=number_format($thuclanh,0, ',', '.')?> 
            VNĐ</span></strong></td>
          </tr>
        </table>
        

     
       
    </div>
</div>


