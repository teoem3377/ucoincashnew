<?php
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	@session_start();
	$session=session_id();
	@define ( '_template' , './../templates/');
	@define ( '_source' , './../sources/');
	@define ( '_lib' , './../aworld/lib/');
	@define ( _upload_folder , './../media/upload/' );

   
	
	
    //Lưu ngôn ngữ chọn vào $_SESSION
	if(!isset($_SESSION['lang2']))
	{
		$_SESSION['lang2']='vi';
		
	}
	$_SESSION['abc']='vi';
	
	$lang=$_SESSION['lang2'];	//Lấy ngỗn ngữ

   // require_once _source."./../lang_$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
    //include_once _lib."functions_giohang.php";
    include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."useronline.php";
    include_once _source."slider.php";
    
 //    if(@$_REQUEST['command']=='add' && @$_REQUEST['productid']>0){
	// $pid=$_REQUEST['productid'];
	// 	addtocart($pid,1);
	// 	redirect("http://$config_url/gio-hang.html");}	
	
    //Lấy title bar
    if(!isset($title_bar)){
        $title_bar = 'Wbankcoin';
    }
	
	/*$sqltt = "select website from table_setting ";
	$d->query($sqltt);		
	$kqtt = $d->fetch_array();
	
	
    $sqlb = "select * from #_photo where hienthi=1 and com='banner_top'";
    $d->query($sqlb);
    $banner = $d->fetch_array();*/
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="http://<?=$config_url?>/"  />
<head>
<title>ucoincash</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery.flipster.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flipclock.css">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/effect.css">



<!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/fwslider.js"></script>
    <script src="js/effect.js"></script>


<!--end slider -->
<script type="text/javascript" src="js/jquery-hover-effect.js"></script>
<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
jQuery(function() {
	jQuery('ul.da-thumbs > li').hoverdir();
});
});
</script>
<!-- Add fancyBox main JS and CSS files -->
<!-- <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: true,
                    midClick: true,
                    removalDelay: 200,
                    mainClass: 'my-mfp-zoom-in'
            });
        });
        </script> -->
<!--nav-->

<!-- start top_js_button -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="js/flipclock.min.js"></script>     
   <script type="text/javascript">

		jQuery(document).ready(function($) {
        
            var clock;
        
        $(document).ready(function() {
            var clock;
              
            clock = $('.clock').FlipClock({
                clockFace: 'DailyCounter',
                autoStart: false,
                callbacks: {
                    stop: function() {
                        $('.message').html('The clock has stopped!')
                    }
                }
            });
                    
            clock.setTime(864000);
            clock.setCountdown(true);
            clock.start();

        });

           
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>

     
     
    <!-- header -->
    <div class="header_bg">
    <div class="wrap">
        <div class="header">	
                   <!-- start h_menu4 -->
                        <?php include _template."layout/main_menu.php";?> 
                    <!-- end h_menu4 -->
    
            <div class="clear"></div>
        </div>

    </div>
    </div>
    <!-- /header -->
    
    
     
     <?php if($com=="" || $com=="index" || $com=="home" ){?> 
     
     
      <!-- BITCOIN -->     
        
   		<?php 
            include _template."layout/feature_coin.php";?> 
   

     <!-- ///BITCOIN -->

     
     
     
        <!-- start main -->
        <div>
            <?php include _template."layout/ico.php";?> 
            
        </div>
        </div>
        <!-- /start main -->
        
        <!-- start testimonial  -->
        
        <div>
            <?php include _template."layout/roadmap.php";?> 
        </div>
    
        <div class="clear"></div>
          
             
        
        <div class="wrap">
            <?php include _template."layout/global_site.php";?> 
        </div>
        </div>
     
    
    
    <?php } else { ?>
     
       <!-- start main -->
        <div class="main_bg">
        <div class="wrap">
             <?php include _template.$template."_tpl.php";
                 //include _template."layout/register.php";
              ?>
            
        </div>
        </div>
        <!-- /start main -->
    
      	
    
	<?php } ?>
    <?php ?>
    
     <div style="clear: both"></div>
    <!-- start footer_top  -->
    <div class="footer_top_bg">
    <div class="wrap">
        <div class="footer_top">
            <h2 style="color:#060">This is what everyone wants. its free for limited time WBANKCOIN</h2>
        </div>
    </div>
    </div>
    <!-- /footer_top  -->
    
     
    
    <div class="footer_top_bg dede" style="background:none">
    <div class="wrap doitacz">
       <?php// include _template."layout/doitac.php";?>	
    </div>
    </div>
    
    
    <!-- /footer_top  -->
     
     
    <!-- start footer  -->
    <div class="footer_bg">
    <div class="wrap">
        
        
    </div>
    </div>
    <!-- / footer  -->


</body>
</html>

























