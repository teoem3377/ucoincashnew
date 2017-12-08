
<?php 

@$id =  addslashes($_GET['id']);
@$maso =  addslashes($_GET['maso']);

$sql = "select * from #_chonhan where id=".$id;
$d->query($sql);
$phieu= $d->fetch_array();

?>

<div class="khungbao" >
  <div class="tieude" >Phiếu chuyển tiền của mã pin: <b style="color:#f00"><?=$phieu['pincho']?></b> cho mã pin: <b style="color:#f00"><?=$maso?></b></div>
  <div class="noidungs">
      
           <form name="frmTM" id="frmTM" method="post" action="xembills.html" enctype="multipart/form-data">          
          
          <div class="dangky">          	
            <table width="345"  border="0" cellpadding="0" cellspacing="0" class="table">
             
           
              <tr>
                <td align="right" class="tieude_left">Phiếu chuyển tiền</td>
                <td>&nbsp;&nbsp;<img src="<?=_upload_product_l.$phieu['photo']?>" width="400" height="500" alt="Chưa có phiếu chuyển tiền" /></td>
              </tr>
             
             <tr>
                <td align="right" class="tieude_left">Phản hồi</td>
                <td>&nbsp;&nbsp;<input type="text" name="phanhoi" value='<?=$phieu['phanhoi']?>' style="width:400px;"/></td>
              </tr>
                         
             <input type="hidden" value="<?=$id?>" name="idpin" />
             <input type="hidden" value="<?=$phieu['pincho']?>" name="masopincho" />
             <input type="hidden" value="<?=$maso?>" name="masopinnhan" />
               
               <?php if($phieu['danhan']==0 && $phieu['photo']!=''){?>       
              <tr>
                <td >&nbsp;</td>
                <td align="left" class="sizechunut">
                	<input class="button" type="submit" value="Xác nhận đã nhận tiền"  />
                   
                </td>
              </tr>
              <?php }?>
              
            </table>
          </div>
          
           
          </form>       
    
</div>
</div>
   
   
   
 
 
 
 <style type="text/css">
 .dangky {
	 width:650px; 
	 margin:auto; 
	 padding:0 0 20px 10px;
 }
 .tieude_left{
	 height:32px;
	 width:150px;
	 padding-right:10px;
	 font-size:15px;
	 font-weight:bold;
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 