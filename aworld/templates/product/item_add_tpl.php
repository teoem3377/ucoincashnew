
<h3>Quản lý thành viên: </h3>




<form name="frm" method="post" action="index.php?com=product&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
  
    
    
   <b>Người giới thiệu</b> <input type="text" name="gioithieu" id="gioithieu" readonly="readonly"   value="<?=$item['gioithieu']?>"class="input" style="width:400px;"/><br /><br />
   <b>Email</b> <input type="text" name="email" readonly="readonly" value="<?=$item['email']?>" class="input" style="width:400px;"  /><br /><br />
   <b>User</b> <input type="text" name="user" readonly="readonly" value="<?=$item['user']?>" class="input" style="width:400px;"/><br /><br />
   <b>Mật khẩu</b> <input type="text" name="matkhau" id="matkhau" class="input" style="width:400px;"   /><br /> <br />
   <b>Điện thoại</b> <input type="text" name="dienthoai" id="dienthoai" value="<?=$item['dienthoai']?>" class="input" style="width:400px;"   /><br /> <br />
   <b>Quốc gia</b> <input type="text" name="quocgia" value="<?=$item['quocgia']?>" class="input" style="width:400px;"  /><br /><br />
   <b>WalletBBC</b> <input type="text" name="walletbbc" readonly="readonly" value="<?=$item['walletbbc']?>" class="input" style="width:400px;"/><br /> <br />
   <b>Wallet ETH</b> <input type="text" name="walleteth" readonly="readonly" value="<?=$item['walleteth']?>" class="input" style="width:400px;"/><br /> <br />
   <b>Xác thực Wallet ETH</b> <input type="text" name="xacthuceth" value="<?=$item['xacthuceth']?>" class="input" style="width:400px;"  /><br /><br />
  
    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
    <input type="hidden" name="batdaus" id="batdaus" value="<?php if($_REQUEST['batdaus']!='') echo'&batdau='. $_REQUEST['batdaus'];?>" />
    <input type="hidden" name="ketthucs" id="ketthucs" value="<?php if($_REQUEST['ketthucs']!='') echo'&ketthuc='. $_REQUEST['ketthucs'];?>" />
    <input type="hidden" name="curPage" id="curPage" value="<?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" />
    </br> </br>
   	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man<?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>'" class="btn" />
</form>




 <style type="text/css">
 
 .dangky5 {
	 float:left;
	 width:560px;
	 font-size:13px;
 }
 .dangky6 {
	 float:left;
	 width:255px;
	 margin:5px 0 5px 10px;
 }
 .nhaplieu b{
	 width:120px;
	
 }

 </style>
 


