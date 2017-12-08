<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true) && $_SESSION['login']['kendy']=='kendey'){?>  




<div class="block_menu">
	<div id="title"><strong style="color:#990000;">THÀNH VIÊN</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
                     
            <li><a href="index.php?com=product&act=man">Danh sách</a></li>         
           
           
		</ul>
	</div></div>
</div>


<div class="block_menu">
	<div id="title"><strong style="color:#990000;">SUPPORT</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>             
            <li><a href="index.php?com=support&act=man">Quản lý support </a></li>
                         
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title"><strong style="color:#990000;">HOA HỒNG</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>             
            <li><a href="index.php?com=product&act=thuong">Quản lý rút hoa hồng </a></li>
                         
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title"><strong style="color:#990000;">UP BILL</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>             
            <li><a href="index.php?com=product&act=thuong1">Quản lý up bill </a></li>
                         
		</ul>
	</div></div>
</div>



<div class="block_menu">
	<div id="title"><strong style="color:#990000;">Thiết lập </strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
            <li><a href="index.php?com=setting&act=capnhat">Thiết lập hệ thống</a></li>
       	</ul>
	</div></div>
</div>


<!--
<div class="block_menu">
	<div id="title"><strong style="color:#990000;">Thiết lập tài khoản</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
           <li><a href="index.php?com=user&act=admin_edit">Quản lý Tài khoản</a></li>
		</ul>
	</div></div>
</div>
-->
<?php }?>