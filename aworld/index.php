<?php
	 date_default_timezone_set('Asia/Ho_Chi_Minh');	
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'vitconxauxi';
	
	$d = new database($config['database']);
	
	switch($com){
		
		case 'support':
			$source = "support";
			break;
		case 'pins':
			$source = "pins";
			break;
		case 'import':
			$source = "import";
			break;
		case 'import1':
			$source = "import1";
			break;
		case 'export':
			$source = "export";
			break;
		case 'export1':
			$source = "export1";
			break;
		case 'export2':
			$source = "export2";
			break;
		case 'export3':
			$source = "export3";
			break;
		case 'export4':
			$source = "export4";
			break;
		case 'export5':
			$source = "export5";
			break;
		case 'export6':
			$source = "export6";
			break;
		case 'export7':
			$source = "export7";
			break;
		case 'export8':
			$source = "export8";
			break;
		case 'export9':
			$source = "export9";
			break;
		case 'export10':
			$source = "export10";
			break;
		case 'hinhduan':
			$source = "hinhduan";
			break;
		case 'danhmucnews':
			$source = "danhmucnews";
			break;
		case 'hinhalbum':
			$source = "hinhalbum";
			break;
		case 'duan':
			$source = "duan";
			break;
		case 'album':
			$source = "album";
			break;
		case 'hasp':
			$source = "hasp";
			break;
		case 'hasp1':
			$source = "hasp1";
			break;
		case 'newsletter':
			$source = "newsletter";
			break;
		case 'product':
			$source = "product";
			break;
		case 'product1':
			$source = "product1";
			break;
		case 'nghe':
			$source = "nghe";
			break;
 		
         case 'tuyendung':
			$source = "tuyendung";
			break;
 		case 'doitacchienluoc':
			$source = "doitacchienluoc";
			break;
            
        case 'donhang':
			$source = "donhang";
			break;

		case 'user':
			$source = "user";
			break;		
		case 'lkweb':
			$source = "lkweb";
			break;
		case 'download':
			$source = "download";
			break;				
		case 'slider':
			$source = "slider";
			break;	
		case 'footer':
			$source = "footer";
			break;		
		case 'title':
			$source = "title";
			break;			
		case 'news':
			$source = "news";
			break;
		case 'dichvu':
			$source = "dichvu";
			break;
		case 'thongtincongty':
			$source = "thongtincongty";
			break;
		case 'chinhsachbanhang':
			$source = "chinhsachbanhang";
			break;
		case 'hotrokhachhang':
			$source = "hotrokhachhang";
			break;		
            
        case 'about':
			$source = "about";
			break;
		case 'baogia':
			$source = "baogia";
			break;
        case 'doitac':
			$source = "doitac";
			break;
		case 'doitac1':
			$source = "doitac1";
			break;
		case 'thanhtoan':
			$source = "thanhtoan";
			break;
		case 'khuyenmai1':
			$source = "khuyenmai1";
			break;
       
      
		 case 'khuyenmai':
			$source = "khuyenmai";
			break;
       
        case 'video':
			$source = "video";
			break;
            		
		case 'setting':
			$source = "setting";
			break;		
		case 'quangcao':
			$source = "quangcao";
			break;						
		case 'yahoo':
			$source = "yahoo";
			break;				
		case 'lienhe':
			$source = "lienhe";
			break;
		case 'hotline':
			$source = "hotline";
			break;	
		case 'bannerqc':
			$source = "bannerqc";
			break;
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
	
	if($source!="") include _source.$source.".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Administration</title>
<link href="media/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../images/logo.png" />
<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
 <script type="text/javascript" src="media/scripts/jquery.js"></script>
  
<!-- /TinyMCE -->
<script type="text/javascript" src="media/scripts/priceFormat.js"></script>


</head>

<body>

<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true) && $_SESSION['login']['kendy']=='kendey'){?>  
<div id="wrapper">
	<?php include _template."header_tpl.php"?>
    
    <div id="main"> 
		 
        <!-- Right col -->
        <div id="contentwrapper">
        <div id="content">
          <?php include _template.$template."_tpl.php"?>
        </div>
        </div>
        <!-- End right col -->
        
        <!-- Left col -->
        <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php";?>
          </div>
        </div>
        <!-- End Left col -->
		
			<div class="clr"></div>
    </div>
  <div id="footer">
		<?php include _template."footer_tpl.php"?>
	</div>
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php"?>
		<?php }?>
</body>
</html>
