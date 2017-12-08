

<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=product&act=delete1&listid=" + listid;
});
});
</script>



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
function guidix() {
	
	   var d=new Date();

		
		var ngay=d.getDate();
		
		var thang=d.getMonth()+1;
		
		var nam=d.getFullYear();
	    
		var abc = ngay+"/"+thang+"/"+nam;
	
		
		var keyword = document.getElementById("keyword").value;
		var batdau = document.getElementById("batdau").value;
		var ketthuc = document.getElementById("ketthuc").value;	
		
		if(batdau=='') batdau = "01/"+thang+"/"+nam;
		if(ketthuc=='') ketthuc = ngay+"/"+thang+"/"+nam;
		
		if(batdau=='' && ketthuc==''){
			batdau = "01/"+thang+"/"+nam;
			ketthuc = ngay+"/"+thang+"/"+nam;
		}
			
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=product&act=danhsachluong&keyword="+keyword+"&batdau="+batdau+"&ketthuc="+ketthuc;
		loadPage(document.location);
			
}

</script>
<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=product&act=man1&id_list="+a.value;	
		return true;
	}    
					
</script>





Tìm kiếm: 
<input name="keyword" id="keyword" type="text" placeholder="Mã nhân viên" />
Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />

<input type="button" value=" Tìm "  onclick="guidix();"/><br /><br />
<table class="blue_table">
	<tr>
        
        <th style="width:2%; height:20px;">Stt</th>
        <th style="width:15%;">Nhân viên </th>
        <th style="width:7%;">Doanh số CN </th>
        <th style="width:8%;">Doanh số HT </th>
        <th style="width:6%;">Hoa hồng </th>
        <th style="width:6%;">Hỗ trợ C.Phí</th>      
        <th style="width:6%;">Hỗ trợ L.Cấp </th>
        <th style="width:6%;">Lương CB </th>
        <th style="width:7%;">Thực lãnh </th> 
		
	</tr>
	<?php for($i=0; $i<count($items); $i++){
		
						
		$doanhso_cn = $items[$i]['doanhso']; 
		$hoahong_cn = $items[$i]['hoahong'];		
		$lencap_cn =$items[$i]['hotro'];		
		 
		 $hotro_cp_cn =  hotro_cp($doanhso_cn);
		 $doanhso_ht  =  doanhso_1thang($items[$i]['maso'],$batdauxx,$ketthucxx);
		
		 $thuclanh_cn = $hoahong_cn + $hotro_cp_cn + $lencap_cn + $items[$i]['luongcb'];
		
		
	?>
	<tr>
        
        <td style="width:2%;"><?=$i+1?></td>
        <td style="width:15%;"><a style="text-decoration:none;" href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id=<?=$items[$i]['id']?>"><?=$items[$i]['maso']?> - <?=$items[$i]['hoten']?></a></td>
        <td style="width:7%;"><?=number_format($doanhso_cn,0, ',', '.')?> VNĐ</td>
        <td style="width:8%;"><?=number_format($doanhso_ht,0, ',', '.')?> VNĐ</td>
        <td style="width:6%;"><?=number_format($hoahong_cn,0, ',', '.')?> VNĐ</td>
        <td style="width:6%;"><?=number_format($hotro_cp_cn,0, ',', '.')?> VNĐ</td>
       
        <td style="width:6%;"><?=number_format($lencap_cn,0, ',', '.')?> VNĐ</td>
        <td style="width:6%;"><?=number_format($items[$i]['luongcb'],0, ',', '.')?> VNĐ</td>
        <td style="width:7%;"><?=number_format($thuclanh_cn,0, ',', '.')?> VNĐ</td>
	</tr>
	<?php	}?>
    </table></br>
    
   
    
   Tổng lương danh sách: <b><?=number_format ($thuclanh_tt,0,",",".")." VNĐ";?></b></br></br>
    
    <form name="frm" method="post" action="index.php?com=export&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
       <input type="submit" value="Xuất Excel" class="btn" style="height:25px; border-radius:5px; background:#060; color:#fff; line-height:20px; cursor:pointer" />
       <input type="hidden"  name="batdauz" id="batdauz" value="<?=$_GET['batdau']?>" class="input" />
       <input type="hidden" name="ketthucz" id="ketthucz" value="<?=$_GET['ketthuc']?>" class="input" />
    </form>   


<div class="paging"><?=$paging['paging']?></div>

<style>
 td{
	 text-align:left !important;
	 padding:0 0 0 8px !important;
	 height:20px;
 }

</style>