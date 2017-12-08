<?php
	session_start();
	$session=session_id();
	$_SESSION['url']="";	
	
?>

<link rel="stylesheet" type="text/css" href="./media/css/blitzer/jquery-ui-1.8.18.custom.css"/>
<script type="text/javascript" src="./media/scripts/jquery-ui-1.8.18.custom.min.js"></script>

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


function onSearch(evt) {
	
	
	
		var batdau = document.getElementById("batdau").value;
		var ketthuc = document.getElementById("ketthuc").value;
		var keyword = document.getElementById("keyword").value;
			
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
		location.href = "index.php?com=product&act=luong&batdau="+batdau+"&ketthuc="+ketthuc+"&keyword="+keyword;
		loadPage(document.location);
			
}


</script>

<h3>Quản lý tri ân</h3> 

<div style="float:left; margin-bottom:5px">
        <div style="float:left">
            <form name="frm" method="post" action="index.php?com=export7&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
                   <input type="submit" value="Export Excel" class="btn" style="height:25px; border-radius:5px; background:#060; color:#fff; line-height:20px; cursor:pointer" />
                   <input type="hidden"  name="batdauz" id="batdauz" value="<?=$_GET['batdau']?>" class="input" />
                   <input type="hidden" name="ketthucz" id="ketthucz" value="<?=$_GET['ketthuc']?>" class="input" />
                   <input type="hidden" name="keywordz" id="keywordz" value="<?=$_GET['keyword']?>" class="input" />
            </form>   
        
        </div>      
</div>


<div style="clear:both"></div>

Tìm kiếm: 
<input name="keyword" id="keyword" type="text" placeholder="Mã nhân viên" />
&nbsp;Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
&nbsp;Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />



<table class="blue_table">
	<tr>
         
        <th style="width:10%;">STT</th>       
        <th style="width:15%;">Mã số </th>
        <th style="width:30%;">Họ tên </th>
        <th style="width:15%;">Hoa hồng tri ân</th> 
      
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){
		$hoahongtructiep=0;;
	
	$hoahongtructiep = 	laitinh($items[$i]['maso'],$batdauv,$ketthucv);
		
	?>
	<tr>        
        <td style="width:10%;"><?=$i+1?></td>      
        <td style="width:15%;"><b><?=$items[$i]['maso']?></b></td>
        <td style="width:30%;"><b><?=get_ten($items[$i]['maso'])?></b></td>
        <td style="width:15%;"><?=number_format($hoahongtructiep,0, ',', '.')?> Đ</td>
          
	</tr>
	<?php	}?>
    </table></br>
    
  <table class="blue_table">
	<tr>         
        <th style="width:10%;">TỔNG</th>       
        <th style="width:15%;"><?=$songuoi?></th> 
        <th style="width:30%;"></th>      
        <th style="width:15%;"><?=number_format($tall_tructiep,0, ',', '.')?> Đ</th> 
      
	</tr>
  </table>

<div class="paging"><?=$paging['paging']?></div>