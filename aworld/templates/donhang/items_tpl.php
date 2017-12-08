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
	
	
	    var id_list = document.getElementById("id_list").value;
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
		location.href = "index.php?com=donhang&act=man&batdau="+batdau+"&ketthuc="+ketthuc+"&id_list="+id_list+"&keyword="+keyword;
		loadPage(document.location);
			
}


</script>


<?php
function trangthai()
	{
		$sql="select * from table_tinhtrang  order by id asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" class="main_font">
			<option value="">Trạng thái </option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_list'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	

?>



<h3> Quản lý đơn hàng </h3>

<?php if($_SESSION['login']['username']=="admin" || $_SESSION['login']['username']=="llthanh714" ){?>
<div style="float:left; margin-bottom:5px">
        <div style="float:left">
            <form name="frm" method="post" action="index.php?com=export9&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
                   <input type="submit" value="Export Excel" class="btn" style="height:25px; border-radius:5px; background:#060; color:#fff; line-height:20px; cursor:pointer" />
                   <input type="hidden"  name="id_listz" id="id_listz" value="<?=$_GET['id_list']?>" class="input" />
                   <input type="hidden"  name="batdauz" id="batdauz" value="<?=$_GET['batdau']?>" class="input" />
                   <input type="hidden" name="ketthucz" id="ketthucz" value="<?=$_GET['ketthuc']?>" class="input" />
                   <input type="hidden" name="keywordz" id="keywordz" value="<?=$_GET['keyword']?>" class="input" />
            </form>   
        
        </div>      
</div>

<?php }?>

<br /><br /><br />
Tìm kiếm: 
&nbsp;<input name="keyword" id="keyword" type="text" placeholder="Mã số" />
&nbsp;<?=trangthai();?>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
&nbsp;Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />

<table class="blue_table">

	<tr>
    	<th style="width:5%" align="center">ID</th>
		<th style="width:10%;">Mã đơn hàng</th>	
       <th style="width:25%;">Người đặt</th>
        <th style="width:20%;">Ngày đặt</th>
        <th style="width:10%;">Số tiền</th>
          <th style="width:15%;">Tình trạng</th>     
		<th style="width:5%;">Sửa</th>
		<?php if($_SESSION['login']['username']=="admin"){?>
        <th style="width:5%;">Xóa</th>
        <?php }?>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){ $tongthu=$tongthu+$items[$i]['sotien']; ?>
	<tr>
		<td style="width:5%;" align="center"><?=$i+1?></td>
        <td style="width:10%;" align="center"><?=$items[$i]['madonhang']?></td>       
		<td style="width:25%;" align="center"><?=$items[$i]['nguoinhan']?></td>
      <td style="width:20%;" align="center"><?=date('d/m/Y  H:i:s',$items[$i]['ngaytao'])?></td>          
      <td style="width:10%;" align="center"><?=number_format($items[$i]['sotien'],0, ',', '.')?>&nbsp;VNĐ</td>
      <td style="width:15%;" align="center">
		   <?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$items[$i]['trangthai']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
           
       </td>         
		<td style="width:5%;" align="center"><a href="index.php?com=donhang&act=edit<?php if($_REQUEST['id_list']!='') echo'&id_lists='. $_REQUEST['id_list'];?><?php if($_REQUEST['batdau']!='') echo'&batdaus='. $_REQUEST['batdau'];?><?php if($_REQUEST['ketthuc']!='') echo'&ketthucs='. $_REQUEST['ketthuc'];?>&id_list=<?=$items[$i]['trangthai']?>&batdau=<?=$_REQUEST['batdau']?>&ketthuc=<?=$_REQUEST['ketthuc']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<?php if($_SESSION['login']['username']=="admin"){?>
        <td style="width:5%;"><a href="index.php?com=donhang&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	   <?php }?>
    </tr>
	<?php	}?>
</table><br/>
Tổng giá trị danh sách: <b><?=number_format ($tongsotien,0,",",".")." VNĐ";?></b>
<div class="paging"><?=$paging['paging']?></div>