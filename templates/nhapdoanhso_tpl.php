<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtra(){
	
	if(document.frmNDS.sanpham.value == 0){
		alert('Vui lòng chọn sản phẩm');
		document.frmNDS.sanpham.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('capcha'), "Xin vui lòng nhập vào mã xác nhận ở trên.")){
		document.getElementById('capcha').focus();
		return false;
	}
	
	
	document.frmNDS.submit();
}
</script>

<?php


function danhsach()
	{
		$sql="select * from table_nghe order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="sanpham" name="sanpham"  class="main_font" style="width:200px;">
			<option value="0">Chọn sản phẩm </option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	function soluong()
	{
		
			$str='<select id="soluong" name="soluong"  class="main_font" style="width:200px;">';
			for($i=1;$i<=100;$i++){
			$str.='<option value="'.$i.'">'.$i.'</option>';	
			}
			$str.='</select>';
		return $str;
	}
	
         $d->reset();
		 $sql = "select * from #_luutam where maso='".$_SESSION['login']['maso']."'";
		 $d->query($sql);
		 $luutam = $d->result_array();

?>


<div class="khungbao" >
    <div class="tieude">Nhập doanh số</div>
    <div class="noidung" >
            
            
             <form name="frmNDS" id="frmNDS" method="post" action="nhapdoanhso.html" enctype="multipart/form-data">          
          
          <div class="dangky">          	
            <table width="345"  border="0" cellpadding="0" cellspacing="0" class="table">
             
                           
              <tr >
                <td align="right" class="tieude_left">Sản phẩm</td>
                <td>&nbsp;&nbsp;<?=danhsach()?></td>
              </tr>
              
               <tr>
                <td align="right" class="tieude_left">Số lượng</td>
                <td>&nbsp;&nbsp;<?=soluong()?></td>
              </tr>
               
              <tr>
                <td align="right" class="tieude_left"></td>
                <td>&nbsp;&nbsp;<img src="capcha.php" title="" alt="" /></td>
              </tr>
              
              <tr>
                <td align="right" class="tieude_left">Mã xác nhận<span style="color:#f00">(*)</span></td>
                <td>&nbsp;&nbsp;<input type="text" name="capcha" id='capcha'   class="textbox"  /></td>
              </tr>
                               
              <tr>
                <td >&nbsp;</td>
                <td align="left" class="sizechunut">
                	<input class="button" type="button" value="Lưu lại" onClick="kiemtra();"  />&nbsp;&nbsp;<input class="button"  type="reset" value="Nhập lại"  />&nbsp;&nbsp;
                   
                </td>
              </tr>
            </table>
          </div>
          
           
          </form>       
            
            
    </div>


 	<div class="tieude" style="margin-top:30px">Doanh số chưa duyệt</div>
    <div class="noidung" >
     
     
      <table width="1000" border="0" cellpadding="1" cellspacing="1">
          <tr style="font-size:13px; background:#6CF">
            <td align="center" height="30" width="8%"><strong>STT</strong></td>
            <td align="center" width="20%"><strong>Doanh số</strong></td>
            <td align="center" width="40%"><strong>Lý do</strong></td>
            <td align="center" width="15%"><strong>Ngày nhập</strong></td>
          </tr>
          
          
		  <?php for($i=0;$i<count($luutam);$i++){    
               
			   
			     $d->reset();
				 $sql = "select * from #_nghe where id='".$luutam[$i]['sanpham']."'";
				 $d->query($sql);
				 $sanpham = $d->fetch_array();				 
				 
				 $sql = "select * from #_nghe_list where id='".$sanpham['id_list']."'";
				 $d->query($sql);
				 $phantram = $d->fetch_array();
				 
				 
				 $doanhso= ($sanpham['gia']*$luutam[$i]['soluong'])*($phantram['giatri']/100);
			   
			  if(($i+1)%2==0) $mau='#E2F1F1';
			  else $mau='#DFFFFF';
          ?>
           <tr style="font-size:13px; background: <?=$mau?>">
                <td align="center" height="25"><?=$i+1?></td>
                <td align="center" style="padding:4px 0 4px 4px; font-weight:bold; color:#f00"><?=number_format($doanhso,0, ',', '.')?> VNĐ </td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=$luutam[$i]['lydo']?></td>
                <td align="center" style="padding:4px 0 4px 4px;"><?=date('d/m/Y',$luutam[$i]['ngaytao'])?></td>
           </tr> 
          <?php }?>
         
                   
        </table>
         <div class="phantrang" ><?=$paging['paging']?></div>
     
     
       
    </div>
</div>


 
 
 <style type="text/css">
 .dangky {
	 width:580px; 
	 margin:auto; 
	 padding:40px 0 20px 10px;
 }
 .tieude_left{
	 height:32px;
	 width:100px;
	 padding-right:10px;
 }
 .textbox{
	 width:400px;
	 -moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;
	border:1px solid #CCC;	
	height:22px;
	padding-left:5px;
	background:#FFC;	
 }
 .table {
	 font-size:13px;
	 width:100%;
 }
 .button{
	 padding:2px 8px;
	 margin: 5px 0 0 10px;
 }
 

 </style>
 
