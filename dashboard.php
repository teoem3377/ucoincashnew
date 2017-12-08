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
    
    $lang=$_SESSION['lang2'];   //Lấy ngỗn ngữ

    require_once _source."lang_$lang.php";
    include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."class.database.php";
    include_once _lib."file_requick.php";
    include_once _source."counter.php";
    include_once _source."useronline.php";
    include_once _source."slider.php";
    
   //Lấy title bar
    if(!isset($title_bar)){
        $title_bar = 'BitBankCoin.co';
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
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/style-layout.min.css" />
<link rel="stylesheet" href="css/menu-control.min.css" />
<link rel="stylesheet" href="css/main_dashboard.css" />
<link rel="stylesheet" href="css/effect.css" />
<link rel="stylesheet" href="css/flipclock.css"> 
<link rel="stylesheet" href="css/profile.css"> 
<link rel="stylesheet" href="css/font-awesome.min.css"> 

<?php

$thoigian= get_ngayketthuc()-time();
$thoigian1= get_ngaysapban()-time();


?>




<script src="js/jquery.min.js"></script>
<script src="js/slide_menu.js"></script> 
 <script src="js/jquery-1.12.4.min.js"></script>
  
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/flipclock.min.js"></script>    
<script type="text/javascript">

//Image Hover
jQuery(document).ready(function(){

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

  
            var clock_ico;
            clock_ico = $('.clock_ico').FlipClock({
                clockFace: 'DailyCounter',
                autoStart: false,
                callbacks: {
                    stop: function() {
                        $('.message').html('The clock has stopped!')
                    }
                }
            });
                    
            clock_ico.setTime(<?=$thoigian1?>);
            clock_ico.setCountdown(true);
            clock_ico.start();


             var clock_buy;
            clock_buy = $('.clock_buy').FlipClock({
                clockFace: 'DailyCounter',
                autoStart: false,
                callbacks: {
                    stop: function() {
                        $('.message').html('The clock has stopped!')
                    }
                }
            });
                    
            clock_buy.setTime(<?=$thoigian?>);
            clock_buy.setCountdown(true);
            clock_buy.start();

        });





});
</script>


<!-- start top_js_button -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

  <script src="js/bootstrap.min.js"></script>
 
  

</head>
<body class="index-page has-active-menu">

     
     
     
      <!-- BITCOIN -->     
        
        <?php 
            include _template."layout/header_dashboard.php";?> 
   

     <!-- ///BITCOIN -->

     <div id="main--body" class="main--body has-push-left">
     
     <?php if($com=="" || $com=="index" || $com=="home" ){?> 
        <!-- start main -->
        <div>
		  
              <?php include _template."main_default_tpl.php";?>
          <?php } else { ?>
       
   

   
          
     
       <!-- start main -->
        <div class="main_bg">
        <div class="wrap">
             <?php echo include _template.$com."_tpl.php";              
              ?>
            
        </div>
        </div>
        <!-- /start main -->
    
        
    
    <?php } ?>			
         </div>    
        </div>
       
        </div>
        <!-- /start main -->
        
        <!-- start testimonial  -->
        
        <div>
            <?php include _template."layout/left-menu.php";?> 
        </div>
    
        <div class="clear"></div>
          
             
        
        <div class="wrap">
            <?php //include _template."layout/global_site.php";?> 
        </div>
        </div>
     
    
    
    
    <?php ?>
    
     <div style="clear: both"></div>
    <!-- start footer_top  -->
    <div class="footer_top_bg">
    
    </div>
    <!-- /footer_top  -->
    
     
    
    <div class="footer_top_bg dede" style="background:none">
    <div class="wrap doitacz">
       <?php// include _template."layout/doitac.php";?> 
    </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal-lending">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <div class="div-time-icmain--body--container">
                        <div class="block-time-ico text-center" style="">
                            <h4 class="ico-title-time"><img style="width:30px" src="images/time-ico.png">LENDING BEGIN AT: </h4>
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <b>Lending amount</b>
                                </td>
                                <td>
                                    <b>Profit</b>
                                </td>
                                <td>
                                    <b>Capital back</b>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="span-lending-amount">100$ - 1000$</span></td>
                                <td>Balance system</td>
                                <td>In <span class="span-lending-amount">291</span> days</td>
                            </tr>
                            <tr>
                                <td><span class="span-lending-amount">1,010$ - 6,000$</span></td>
                                <td>Balance system <span class="span-daily">+0.1% daily</span></td>
                                <td>In <span class="span-lending-amount">241</span> days</td>
                            </tr>
                            <tr>
                                <td><span class="span-lending-amount">6,010$ - 12,000$</span></td>
                                <td>Balance system <span class="span-daily">+0.2% daily</span></td>
                                <td>In <span class="span-lending-amount">181</span> days</td>
                            </tr>
                            <tr>
                                <td><span class="span-lending-amount">12,010$ - 50,000$</span></td>
                                <td>Balance system <span class="span-daily">+0.25% daily</span></td>
                                <td>In <span class="span-lending-amount">121</span> days</td>
                            </tr>
                            <tr>
                                <td><span class="span-lending-amount">50,010$ - 100,000$</span></td>
                                <td>Balance system <span class="span-daily">+0.3% daily</span></td>
                                <td>In <span class="span-lending-amount">101</span> days</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
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

























