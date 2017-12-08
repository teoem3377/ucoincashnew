<?php
	session_start();
	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	@define ( _upload_folder , './media/upload/' );


    //Lưu ngôn ngữ chọn vào $_SESSION
	if(!isset($_SESSION['lang2']))
	{
		$_SESSION['lang2']='vi';
	}
	
	$lang=$_SESSION['lang2'];	//Lấy ngỗn ngữ

    require_once _source."lang_$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
    include_once _lib."functions_giohang.php";
    include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."useronline.php";
    include_once _source."slider.php";
    
    if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
	$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		redirect("http://$config_url/gio-hang.html");}	
	
    //Lấy title bar
    if(!isset($title_bar)){
        $title_bar = _trangchu;
    }		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="http://<?=$config_url?>/"  />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$row_setting['keywords']?>  - <?=$keyword?> "/>
<meta name="description" content="<?=$row_setting['description']?>   - <?=$description?>  "/>

<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<meta name=”viewport” content=”width=1320, initial-scale=1″>
<meta name=”viewport” content=”initial-scale=1, maximum-scale=1″>
<meta property="og:image" content="http://davcantho.com/upload/product/<?=$hinhface?>" />
<meta name="google-site-verification" content="7IjjRyepx-iLDsV6Ex_-_ZF8uzxD1FrSrF8JRS1G8Ho" />


<meta name="geo.position" CONTENT="<?=$row_setting['toado']?>">
<meta name="geo.placename" CONTENT="Cần Thơ">
<meta name="geo.region" CONTENT="Cần Thơ">

<meta name="DC.title" content="Aguris:<?=$row_setting['title']?>" />
<meta name="DC.identifier" content="<?=$row_setting['website']?>" />
<meta name="DC.deion" content="<?=$row_setting['keywords']?>" />
<meta name="DC.subject" content="<?=$row_setting['keywords']?>" />
<meta name="DC.language" scheme="UTF-8" content="vi" />


<title><?=$title_bar?> - <?=$row_setting['title']?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
<link rel="stylesheet" type="text/css" href="css/topmenu.css"/>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/map.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/fotorama.css"/>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>




<!-- Ajax Zoom Images -->
<script src="Toolstip/ajax.js" type="text/javascript"></script>
<script src="Toolstip/ajax-dynamic-content.js" type="text/javascript"></script>
<script src="Toolstip/home.js" type="text/javascript"></script>
<link href="Toolstip/tootstip.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/collapsible.css"/>
<!-- End Ajax Zoom Images -->




<script type="text/javascript" src="js/ImageScroller.js"></script>

<!-- Jquery Pikachoose with Jcarousel -->
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<!-- End Jquery Pikachoose with Jcarousel -->


<!--PHẦN CODE SELECT BOX-->
  <link href="js/selectbox/css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="js/selectbox/js/jquery.selectbox-0.2.min.js"></script>  
  
<script type="text/javascript">
  $(document).ready(function(e) {
    //Mặc định SELECTBOX
    $("select").selectbox();                             	    
});
</script>
<!--END PHẦN CODE SELECT BOX-->


     <script>
	$(document).ready(function() {
	  
		var chieurong= $(window).width();
		var chieurong1= chieurong - 280;		
		$('.right').css('width',chieurong1);
	  
		   
		   
		$(".tieudes a.tad").click(function(e) {
        	var div_info = $(this).attr('href');
			$(".tieudes a.tad").removeClass('active');
			$(this).addClass('active');
		
			return false;
		});
		
		


		   
		   
		   
	});
	
	
	</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67744123-2', 'auto');
  ga('send', 'pageview');

</script>
	
	
	
</head>


<?php
	if(($_POST['emailkhachhang']))
	{
		
		$emailkhachhang=$_POST['emailkhachhang'];
		$emailkhachhang = trim(strip_tags($emailkhachhang));
		$emailkhachhang = mysql_real_escape_string($emailkhachhang);
		
		$sql = "INSERT INTO  table_newsletter (email) VALUES ('$emailkhachhang')";	
		if($d->query($sql)== true)
		{
			$s="Gửi thành công";
			echo '<script language="javascript"> alert("'.$s.'") </script>';
		}
		
	}
	
?>


<?php
	$d->reset();
	$sql = "select * from #_doitac ";
	$d->query($sql);
	$bg = $d->result_array();	
?>
<!--
<style type="text/css">
	body{
		background:url(<?=_upload_doitac_l.$bg[0]['photo']?>) no-repeat fixed center top;
	}
</style>
-->

<style>
	.nghile{
		color:#F00 !important;
	}
	.nghile:hover{
		color:#00f !important;
		text-decoration:underline !important;
	}
</style>

<body <?php if(@$_GET['com']=='lien-he') echo 'onLoad="initialize()"'; ?>>
 
                      
  
 	<div class="full"> 
    
                
                  <div id="menux" class="menu" >             
                          <?php include _template."layout/main_menu.php";?>
                   </div>  
                
                  <div class="banner">           
                       <?php include _template."layout/banner.php";?>                             
                  </div>                      
              
			 
                 <div class="main">
                       <div class="left">
                            <?php include _template."layout/left.php";?>
                       </div>                 
                      
                       <div class="right">
                            <?php include _template.$template."_tpl.php"; ?>
                       </div> 
                 </div>            
               
                  <div class="footer">                                   
                     <?php  include _template."layout/footer.php";?> 
                  </div>  
                 
             </div>             
                 
         </div> 
        
    <h1 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h1>
    <h2 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h2>
    <h3 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h3>
    <h4 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h4>
    <h5 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h5>
    <h6 style="display:none"><?=$row_setting['keywords']?>  - <?=$keyword?> </h6>
     <?php  //include _template."layout/khuyenmai.php";?> 
</body>
</html>