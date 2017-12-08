
<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true) && $_SESSION['login']['kendy']=='kendey'){?>  


<div id="header">
    	<div id="banner">
    		<div id="company_name" >ADMINISTRATOR</div>
        </div>
        <div id="h_nav">
        			<div id="left_links">
						<a href="../" title="Xem website" target="_blank">Xem website</a>
					</div>
                    <div id="left_links">
						<a href="index.php" title="Trang chủ" style="width:50px">Trang chủ</a>
					</div>
                   <!-- 
                    
                    <div id="left_links">
						<a href="?com=about&act=capnhat" title="Giới thiệu">Giới thiệu</a>
					</div>
                   
                    -->                                                                                                                                    
					<div id="right_links">
						<a href="index.php?com=user&act=logout">Thoát</a>
					</div>
        </div>
    </div>
   
 <?php }?>