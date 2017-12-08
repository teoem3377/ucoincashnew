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
		var id_list = document.getElementById("id_list").value;
	
			
		
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
		location.href = "index.php?com=product&act=lencap&batdau="+batdau+"&ketthuc="+ketthuc+"&id_list="+id_list;
		loadPage(document.location);
			
}


</script>

<?php
function get_main_list()
	{
		$sql="select ten_vi,id from table_product_list where id!=4 order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" class="main_font">
			<option value="">Cấp bậc lên mới </option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_list'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	

?>


<h3>Quản lý lên cấp</h3> 

<div style="float:left; margin-bottom:5px">
        <div style="float:left">
            <form name="frm" method="post" action="index.php?com=export1&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
                   <input type="submit" value="Export Excel" class="btn" style="height:25px; border-radius:5px; background:#060; color:#fff; line-height:20px; cursor:pointer" />
                   <input type="hidden"  name="id_listz" id="id_listz" value="<?=$_GET['id_list']?>" class="input" />
                   <input type="hidden"  name="batdauz" id="batdauz" value="<?=$_GET['batdau']?>" class="input" />
                   <input type="hidden" name="ketthucz" id="ketthucz" value="<?=$_GET['ketthuc']?>" class="input" />
            </form>   
        
        </div>      
</div>


<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<?=get_main_list();?>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
&nbsp;Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />



<table class="blue_table">
	<tr>
         
        <th style="width:5%;">STT</th>       
        <th style="width:15%;">Nhân viên </th> 
        <th style="width:10%;">Mã số </th>
        <th style="width:10%;">Cấp bậc cũ</th> 
        <th style="width:10%;">Cấp bậc mới</th> 
        <th style="width:8%;">Ngày lên</th>
       
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
        
        <td style="width:5%;"><?=$i+1?></td>      
        <td style="width:20%;"> <?=get_ten($items[$i]['maso'])?></td>
        <td style="width:10%;"><?=$items[$i]['maso']?></td>
        <td style="width:10%;">
			 <?=tencapbac($items[$i]['capbaccu'])?>
        </td>
         <td style="width:10%;">
			  <?=tencapbac($items[$i]['capbacmoi'])?>
        </td>
       <td style="width:8%;"><?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?></td>
      
	</tr>
	<?php	}?>
    </table></br>

<div class="paging"><?=$paging['paging']?></div>