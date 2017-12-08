<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$tam = (isset($_REQUEST['tam'])) ? addslashes($_REQUEST['tam']) : "";
	$d = new database($config['database']);
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();
	
	

	switch($com){
			
		 //=============== ĐĂNG NHẬP ==================
		    
			case 'supports':
			$source = "support";							
            break;
			
			case 'verifyemail':
		   	$source = "verifyemail";					
            break;
			
			case 'resetpasss':			
		   	$source = "resetpass";					
            break;
			
			case 'package':			
		   	$template = "package";					
            break;
            case 'ico':
            $template="ico";
            break;
            case 'byico':
            $template="byico";
            break;
           			
            case 'dashboard':
			$template = "dashboar";					
            break;
			
			case 'promotion':			
		   	$template = "promotion";					
            break;
			
			 case 'viewbill':			
		   	$template = "view";					
            break;
			
			case 'views':			
		   	$template = "views";					
            break;
			
			case 'doipas':
		   	$template = "doipas";
			break;
			
			case 'withdraw':
		   	$template = "withdraw";					
            break;
			
			case 'withdraws':
		   	$source = "withdraw";					
            break;
			
			case 'withdraw1':
		   	$template = "withdraw1";					
            break;
			
			case 'withdraws1':
		   	$source = "withdraw1";					
            break;
			 			
			case 'doipass':
		   	$source = "doipas";					
             break;
			 
			
			
		 case 'xembill':
		   	$template = "xembill";					
            break;
		case 'xembills':
		   	$source = "xembill";					
            break;
			
		 case 'up-bill':
		   	$template = "upbill";					
            break;
			
		case 'upbills':
		   	$source = "upbill";					
            break;
			
		 case 'uplevel':
		   	$template = "uplevel";					
            break;
			
		case 'uplevels':
		   	$source = "uplevel";					
            break;
			
		
			
		
			
		  case 'system':
			$template = "hethong";					
            break;
			
		  case 'note':
			$template = "note";					
            break;
			
		  case 'chi-tiet-lich-su':
		    $source = "chitietlichsu";
			$template = "chitietlichsu";					
            break;
		 
		  case 'lich-su-dat-hang':
			$source = "lichsudathang";
			$template = "lichsudathang";					
            break;
		   case 'cay-tri-an':
			$template = "caytrian";					
            break;
		  case 'caytrian':
			$source = "caytrian";
			$template = "caytrian";					
            break;
		   case 'ban-hang':
			$template = "banhang";					
            break;
				 
		  case 'banhang':
			$source = "banhang";					
            break;
		  case 'nhap-doanh-so':
			$template = "nhapdoanhso";					
            break;
			
		 case 'nhapdoanhso':
			$source = "nhapdoanhso";					
            break;
		 case 'danh-so-truc-tiep':
			$source = "danhsotructiep";
			$template = "danhsotructiep";					
            break;
		 case 'directly-turnover':
			$source = "danhsachphucap";
			$template = "danhsachphucap";					
            break;
		 case 'danh-sach-tri-an':
			$source = "danhsachtrian";
			$template = "danhsachtrian";					
            break;
		 case 'chi-tiet-tri-an':
			$source = "chitiettrian";
			$template = "chitiettrian";					
            break;
		case 'danh-sach-quan-ly-nhom':
			$source = "danhsachquanlynhom";
			$template = "danhsachquanlynhom";					
            break;
		case 'danh-sach-ban-hang':
			$source = "danhsachbanhang";
			$template = "danhsachbanhang";					
            break;
		 case 'group':
			$source = "thanhtich";
			$template = "thanhtich";					
            break;
			
		
		case 'sign-ups':
			$source = "taomoi";							
            break;
		
		case 'sign-ups1':
			$source = "taomoi1";							
            break;
		 
		 case 'list':			
			$template = "danhsachnhanvien";					
            break;
		 case 'doanh-so':
			$source = "doanhso";
			$template = "doanhso";					
            break;
		 case 'doanhso':
			$source = "doanhso";
			$template = "doanhso";					
            break;
			
		 case 'bonus':
			$source = "bangluong";
			$template = "bangluong";					
            break;
		 
        case 'dang-ky':
		    $title_bar="Đăng ký";			
			$template = "dangky";					
            break;
		
			
		case 'sign-ins':		   
			$source = "dangnhap";						
            break;
			
		case 'sign-out':		   			
			$source = "dangxuat";					
            break;
		
		case 'account':
		   	$template = "thongtintaikhoan";							
            break;
		case 'info':
		   	$template = "info";							
            break;
			
		case 'uptree':
		   	$template = "uptree";							
            break;
			
	    case 'uptrees':
		   	$source = "uptree";							
            break;
			
		case 'capnhat':
			$source = "capnhat";							
            break;
			
	    case 'changepas':
		   
			$template = "doimatkhau";							
            break;
		case 'changepass':
			$source = "doimatkhau";							
            break;	
		
		 case 'forgot-passwords':		   			
			$source = "quenmatkhau";					
            break;
			
		
		
   //=============== END ĐĂNG NHẬP ==================
		
		

        case 'he-thong':
		    $source = "hethong";
			$template = "hethong";					
            break;
		 case 'unactivated':
			$template = "chuakichhoat";					
            break;
		case 'about':
			$source = "about";
			$template = "about_detail";					
            break;
		
			
		 case 'thong-bao':
			$source = "thongbao";
			$template = isset($_GET['id']) ? "thongbao_detail" : "thongbao";					
            break;			
			
		
       case 'thanh-toan':
			$source = "thanhtoan";
			break;
		 case 'xac-nhan':
			$template = "thanhtoan";					
            break;
            
		case 'tim-kiem':
			$source = "search";
			$template ="search";
			break;		
								
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;
		case 'ykien':
			$source = "ykien";		
			break;
            	
		case 'san-pham':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			break;
		
            
        case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;
        case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
					case 'vi':
						$_SESSION['lang2'] = 'vi';						
						break;
					case 'en':
						$_SESSION['lang2'] = 'en';						
						break;
					case 'ci':
						$_SESSION['lang2'] = 'ci';
						break;
					default: 
						$_SESSION['lang2'] = 'vi';
						break;
					}
			}
			else{
			$_SESSION['lang2'] = 'vi';
			}
			     redirect($_SERVER['HTTP_REFERER']);
			break;
			
		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if(@$source!="") include _source.$source.".php";
	//echo "00000000000000000"._source.$source.".php";
	
	if(@$_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		
?>