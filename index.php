<?php
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	@session_start();
	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './aworld/lib/');
	@define ( _upload_folder , './media/upload/' );
  
   
	
	
    //Lưu ngôn ngữ chọn vào $_SESSION
	if(!isset($_SESSION['lang2']))
	{
		$_SESSION['lang2']='vi';
		
	}
	$_SESSION['abc']='vi';
	
	$lang=$_SESSION['lang2'];	//Lấy ngỗn ngữ

    require_once _source."lang_$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";   
    include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."useronline.php";
    include_once _source."slider.php";
    
 
    if(!isset($title_bar)){
        $title_bar = 'BitBankCoin';
    }
	
	/*$sqltt = "select website from table_setting ";
	$d->query($sqltt);		
	$kqtt = $d->fetch_array();
	*/
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="http://<?=$config_url?>/"  />
<head>
<title>BitBankCoin.co</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
 <link href="css/jquery.flipster.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flipclock.css"> 
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/effect.css">
<link rel="stylesheet" href="css/chart.css">
<link rel="stylesheet" href="css/font-awesome.min.css">


 

<!--start slider -->
   
   <style type="text/css" media="screen">
       .flip-clock-divider .flip-clock-label {
    
    color: #ffffff;
}
.fa{margin-top:10px;}
.text-center {
    text-align: center !important;
}
   </style>

<!--end slider -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/effect.js"></script>
<script type="text/javascript" src="js/jquery-hover-effect.js"></script>
<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
/*jQuery(function() {
	jQuery('ul.da-thumbs > li').hoverdir();
});*/
   $("button#button-menu-left-toggle").click(function(event) {
      if($("nav#nav-menu--push-left").hasClass('is-active'))
        $("nav#nav-menu--push-left").addClass('hide-to-left');
      else 
        $("nav#nav-menu--push-left").addClass('show-to-right');
    
});
});
</script>
<?php
	$thoigian= get_ngayketthuc()-time();
?>

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
                    
            clock.setTime(<?=$thoigian?>);
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
<body <?php if($com=="account" ){?> class="body-register" <?php }?> >


 <?php if($com=="account" ){
	 
     include _template."register_tpl.php";
	 
 } else{?>
 
    <!-- header -->
    <div class="header_bg">
    <div class="wrap">
        <div class="header">	
            <?php include _template."layout/main_menu.php";?> 
            <div class="clear"></div>
        </div>
    </div>
    </div>
    <!-- /header -->
          
        
   <?php  include _template."layout/feature_coin.php";?> 
    
   <?php include _template."layout/ico.php";?> 
   <?php include _template."layout/chart.php"; ?>
        
   <?php include _template."layout/roadmap.php";?> 
   <div class="clear"></div>
   
    <div class="footer_top_bg">
        <div class="wrap">
            <!-- <div class="footer_top">
                <h2 style="color:#060">This is what everyone wants. its free for limited time WBANKCOIN</h2>
            </div> -->
        </div>
    </div>
    <style>
        img.img-responsive.close-button {
            position: absolute;
            right: 15px;
            cursor: pointer;
        }

        img.img-responsive.left-banner {
            position: absolute;
            left: 0;
            top: 0;
        }

        img.img-responsive.right-banner {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .div-content {
            padding: 40px;
            text-align: justify;
            position: relative;
            z-index: 1500;
        }

        @media(max-width:768px) {
            .div-content {
                padding: 20px;
            }
        }
        @media screen and (max-width: 700px)
{
.flip-clock-wrapper {
    text-align: center;
    position: relative;
    width: 100%;
    margin: 3em 0px!important;
    padding-left: 20px!important;
}
}
/*====response menu====*/
.navbar-nav {
    margin: 0;
}
@media (min-width: 768px){
  .navbar-nav {
    margin:7.5px -15px;
}
}
@media (max-width: 767px)
{
  .navbar {
    background-color: rgba(59,59,59,0.9);
}
}


    </style>

        
    <?php include _template."popup_tpl.php";?> 
     <?php include _template."ourteam_tpl.php";?> 
      <?php include _template."lending_tpl.php";?> 
    <div class="footer">
       <?php include _template."footer_tpl.php";?> 
    </div>
      
    <!-- / footer  -->
<?php }?>

</body>
</html>

























