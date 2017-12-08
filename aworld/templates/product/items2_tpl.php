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
	
		//var batdau = document.getElementById("batdau").value;
		//var ketthuc = document.getElementById("ketthuc").value;
		//var id_list = document.getElementById("id_list").value;
		//var trangthai = document.getElementById("trangthai").value;		
		var keyword = document.getElementById("keyword").value;
				
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=product&act=man2&keyword="+keyword;
		loadPage(document.location);
		
		
}


</script>

<?php
function get_main_list()
	{
		$sql="select ten_vi,id from table_product_list order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" class="main_font">
			<option value="">Cấp bậc </option>			
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
	
	function get_main_cat1()
	{
		$sql="select ten_vi,id from table_product_cat1 order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat1" name="id_cat1" class="main_font">
			<option value="">Gói đầu tư </option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_cat1'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function trangthai()
	{
				
		$str='
			<select id="trangthai" name="trangthai" class="main_font">
			<option value="0"';
			if($_REQUEST['trangthai']==0) $str .='selected';
		$str.='>Trạng thái</option>
			<option value="1"';
			if($_REQUEST['trangthai']==1) $str .='selected';
		$str.='>Đã block</option>
			<option value="2"';
			if($_REQUEST['trangthai']==2) $str .='selected';
		$str.='>Đang hoạt động</option>			
			</select>
			';	
		return $str;
	}
    
	

?>


<h3> Tổng số người: <?=$tongso?></h3>


<div style="clear:both"></div>

Tìm kiếm: 
&nbsp;<input name="keyword" id="keyword" type="text" placeholder="User"  style="width:120px" />
<!--&nbsp;<?=trangthai();?>&nbsp;&nbsp;&nbsp;
&nbsp;<?=get_main_list();?>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;Từ ngày <input type="text" name="batdau" id="batdau" value="" class="input" />
&nbsp;Đến ngày <input type="text" name="ketthuc" id="ketthuc" value="" class="input" />-->
&nbsp;<input type="button" value=" Tìm "  onclick="onSearch(event)"/><br /><br />


<table class="blue_table">
	<tr>
        <th style="width:3%;">STT</th> 
        <th style="width:8%;">Giới thiệu</th>     
        <th style="width:15%;">Nhân viên </th> 
        <th style="width:5%;">Mã số </th> 
        <th style="width:8%;">User </th> 
        <th style="width:6%;">Gói tham gia </th>       
        <th style="width:7%;">Ngày kích hoạt</th>
        <?php	if($_SESSION['login']['username']=="king" ){?>
        <th style="width:5%;">Hoàn tác</th>
        <?php }?>		
	</tr>
	<?php
	
		
		
	
	 for($i=0, $count=count($items); $i<$count; $i++){
	
		
	?>
	<tr>
         <td style="width:3%;"><?=$i+1?></td>
       <td style="width:7%; font-weight:bold;"><?=get_user($items[$i]['gioithieu'])?></td>
        <td style="width:15%; font-weight:bold;"><?=$items[$i]['hoten']?></td>
        <td style="width:5%; font-weight:bold;"><?=$items[$i]['maso']?></td>
        <td style="width:7%; font-weight:bold;"><?=$items[$i]['user']?></td>
        <td style="width:6%; font-weight:bold; color:#00f"><?=number_format($items[$i]['goi'],0, '.', ',')?> $</td>
        <td style="width:8%;"><?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?></td>
      
	 
      <?php	if($_SESSION['login']['username']=="king" ){?>
       <td style="width:5%;">
		  <a onClick="if(!confirm('Xác nhận hoàn tác')) return false;" href="index.php?com=product&act=man2&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat1']!='') echo'&id_cat1='. $_REQUEST['id_cat1'];?><?php if($_REQUEST['daily']!='') echo'&daily='. $_REQUEST['daily'];?><?php if($_REQUEST['quanlyvung']!='') echo'&quanlyvung='. $_REQUEST['quanlyvung'];?><?php if($_REQUEST['trangthai']!='') echo'&trangthai='. $_REQUEST['trangthai'];?><?php if($_REQUEST['batdau']!='') echo'&batdau='. $_REQUEST['batdau'];?><?php if($_REQUEST['ketthuc']!='') echo'&ketthuc='. $_REQUEST['ketthuc'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
       </td> 
     <?php }?> 
		
		 
        
       
		
    </tr>
    
	<?php	 }?>
    
    
    </table></br>
  

<div class="paging"><?=$paging['paging']?></div>