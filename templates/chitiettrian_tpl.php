

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
function onSearch(evt) {
	
	
	
		var batdau = document.getElementById("batdau").value;
		var ketthuc = document.getElementById("ketthuc").value;
		var maso = document.getElementById("maso").value;
				
		
		var d=new Date();
		
		var ngay=d.getDate();
		
		var thang=d.getMonth()+1;
		
		var nam=d.getFullYear();
	    
		var abc = ngay+"/"+thang+"/"+nam;
		
		
		if(batdau=='') batdau = "01/"+thang+"/"+nam;
		if(ketthuc=='') ketthuc = ngay+"/"+thang+"/"+nam;
		
		if(batdau=='' && ketthuc==''){
			batdau = "01/"+thang+"/"+nam;
			ketthuc = ngay+"/"+thang+"/"+nam;
		}
				
				
		//var encoded = Base64.encode(keyword);
		
        location.href = "chi-tiet-tri-an/"+batdau+"/"+ketthuc+"/"+maso+".html";
		loadPage(document.location);
			
}


</script>


</script>


<?php 
  
  if($ngaybatdau1!="") $abcd = " -  Từ ngày:  <span style='color:#ffffff';>".$ngaybatdau1."</span>  đến ngày: <span style='color:#ffffff';>".$ngayketthuc1."</span>";
  else $abcd="";
	
 ?>


<div class="khungbao" >
 	<div class="tieude">Danh sách hưởng tri ân dài lâu của: <?=get_ten($hoten['gioithieu'])?> (<?=$hoten['gioithieu']?>)   <?=$abcd?> </div>
    <div class="noidung" >
     
      
        <div style="float:left; margin:10px; width:970px; font-size:13px;">
                
                Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
                Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />            
                <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
                <input type="hidden" name="maso" id="maso" class="input"  value="<?=$idz?>"/>
        </div>
      
      
      
        <table width="1100" border="0" cellpadding="1" cellspacing="1">
          <tr style="font-size:13px; height:30px; background:#6CF">
            <td align="center" width="10%"><strong>STT</strong></td>
            <td align="center" width="40%"><strong>Họ tên</strong></td>            
            <td align="center" width="25%"><strong>Thời gian</strong></td>
           
          </tr>
          <?php
		   for($i=0;$i<count($danhsachb);$i++){
			
			$sqlgt1="select gioithieu,ngaytao from table_product1 where  maso='".$danhsachb[$i]."'";
			$d->query($sqlgt1);		
			$ketquagt1= $d->fetch_array(); 
			 
		  ?>		
           <tr style="font-size:13px;height:30px; background: #E2F1F1">
               
                <td align="center"><?=$i+1?></td>
                <td align="center"><?=get_ten($ketquagt1['gioithieu'])?> (<?=$ketquagt1['gioithieu']?>)</td>               
                <td align="center"><?=date('d/m/Y H:i:s',$ketquagt1['ngaytao'])?></td>
              
           </tr> 
            <?php }?> 
            
        </table>
     
     
      <div class="phantrang" ><?=$paging['paging']?></div> 
    </div>
</div>

 <style>
   .xemx{
	   color:#00f;
	   font-style:italic;
	   text-decoration:underline;
	   font-weight:bold;
   }
   .xemx:hover{
	   color:#f00;
	  
   }
   </style>