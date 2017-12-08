<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt) {	
		var keyword = document.getElementById("keyword").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=nghe&act=man&keyword="+keyword;
		loadPage(document.location);
			
}

</script>
<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=nghe&act=man&id_list="+a.value;	
		return true;
	}
    function select_onchange1()
	{				
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=nghe&act=man&id_list="+a.value+"&id_cat="+b.value;	
		return true;
	}
    function select_onchange2()
	{				
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
        var c=document.getElementById("id_item");
		window.location ="index.php?com=nghe&act=man&id_list="+a.value+"&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}
    function select_onchange3()
	{				
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
        var c=document.getElementById("id_item");
        var d=document.getElementById("id_item1");
		window.location ="index.php?com=nghe&act=man&id_list="+a.value+"&id_cat="+b.value+"&id_item="+c.value+"&id_item1="+d.value;	
		return true;
	}
    function select_onchange4()
	{				
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
        var c=document.getElementById("id_item");
        var d=document.getElementById("id_item1");
        var e=document.getElementById("id_item2");
		window.location ="index.php?com=nghe&act=man&id_list="+a.value+"&id_cat="+b.value+"&id_item="+c.value+"&id_item1="+d.value+"&id_item2="+e.value;	
		return true;
	}
					
</script>
<?php
function get_main_list()
	{
		$sql="select ten_vi,id from table_nghe_list order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục</option>			
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
    
function get_main_category()
	{
		$sql="select * from table_nghe_cat where id_list=".$_REQUEST['id_list']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange1()" class="main_font">
			<option>Danh mục cấp 2</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}

?>
<h3><a href="index.php?com=nghe&act=add">Thêm sản phẩm</a></h3>
Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/><br />
<table class="blue_table">
	<tr>
        <th style="width:5%;">Stt</th>
        
        <th style="width:10%;"><?=get_main_list();?></th>
        <!--<th style="width:15%;"><?=get_main_category();?></th> 
      		-->
        <th style="width:15%;">Tên</th>
        <th style="width:10%;">Mã số</th>
        <th style="width:10%;">Giá</th>  
        <th style="width:5%;">Khuyến mãi</th> 
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
        <td style="width:5%;"><?=$items[$i]['stt']?></td>
        
        <td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten_vi from table_nghe_list where id='".$items[$i]['id_list']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten_vi']
            ?>      
        </td>
       <!--
         <td style="width:15%;">
			  <?php
				$sql_danhmuc="select ten_vi from table_nghe_cat where id='".$items[$i]['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten_vi']
			?>      
        </td>
      
       -->
       <td style="width:15%;"><a href="index.php?com=nghe&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_item1=<?=$items[$i]['id_item1']?>&id_item2=<?=$items[$i]['id_item2']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
       <td style="width:10%;"><?=$items[$i]['maso']?></td>
       <td style="width:10%;"><?=number_format($items[$i]['gia'],0, ',', '.')?> VNĐ</td>
      
      <td style="width:5%;">
		<?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        
        <a href="index.php?com=nghe&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=nghe&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
     
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=nghe&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=nghe&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id_item1=<?=$items[$i]['id_item1']?>&id_item2=<?=$items[$i]['id_item2']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=nghe&act=delete&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=nghe&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>