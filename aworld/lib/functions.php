	<?php if(!defined('_lib')) die("Error");
#
#	$id_connect : ket noi database
#
    
	
	function get_giabtc(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select giabtc from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['giabtc'];
		return $kq; 
					
	  }
	  
	  function get_giaeth(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select giaeth from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['giaeth'];
		return $kq; 
					
	  }
	  
	  
	 function get_giabbc(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select giabbc from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['giabbc'];
		return $kq; 
					
	  }
	  
	   function get_giabbcsapban(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select giabbcsapban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['giabbcsapban'];
		return $kq; 
					
	  }
	  
	   function get_bbcdaban(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select bbcdaban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['bbcdaban'];
		return $kq; 
					
	  }
	  
	   function get_bbcduban(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select bbcduban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['bbcduban'];
		return $kq; 
					
	  }
	  
	   function get_bbcdangban(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select bbcdangban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['bbcdangban'];
		return $kq; 
					
	  }
	  
	   function get_ngayketthuc(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ngayketthuc from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=strtotime($ketqua['ngayketthuc']);
		return $kq; 
					
	  }
	  
	  function get_ngaysapban(){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ngaysapban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=strtotime($ketqua['ngaysapban']);
		return $kq; 
					
	  }
	  
	  function get_dangban($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select dangban from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['dangban'];
		return $kq; 
					
	  }
	  
	  function get_bbcduocmua($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select bbcduocmua from table_setting  where id=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['bbcduocmua'];
		return $kq; 
					
	  }
	  
	
	
	function get_user_ip() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
	
		
	
	  function tongdanhso($a){
		global $d;	
		$kq=0;
		$songuoi=0;
		
		$ketqua=capduois($a);
		
		for($i=0;$i<count($ketqua);$i++){
			if(kiemtralock($ketqua[$i])==0) $songuoi++;
		}	
		
		$kq=($songuoi-1)*2400000;
		
		return $kq; 
					
	  } 
	  
	  function tongdanhsos($a){
		global $d;	
		$kq=0;
		$songuoi=0;
		
		$ketqua=capduois($a);
		
		for($i=0;$i<count($ketqua);$i++){
			if(kiemtralock($ketqua[$i])==0) $songuoi++;
		}	
		
		$kq=($songuoi-1);
		
		return $kq; 
					
	  } 
	
	
	function ngaythu2(){
		    global $chuoingays;	
			$songay=0;
			$chuoingays='';
			$songay = date('w')-1;
			if($songay<0) $songay=6;
			$chuoingays = strtotime(date("Y-m-d 00:00:00", strtotime('- '.$songay.' day')));	
			return $chuoingays;
	  }
	  
	   function ngaythu2s(){
		    global $chuoingay;	
			$songay=0;
			$chuoingay='';
			$songay = date('w')-1;
			if($songay<0) $songay=6;
			$chuoingay = date("d/m/Y", strtotime('- '.$songay.' day'));	
			return $chuoingay;
	  }
	
	
	 function kiemtradachoroi($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		if(count($ketqua)>0) $kq=1;
				
		return $kq; 
					
	  } 
	  
	  
	  function sof1dacho($a){
		global $d;	
		$kq=0;
		$solan=0;
		
		$sql = "select maso from table_product where gioithieu='".$a."'";	  
		$d->query($sql);		
		$ketqua = $d->result_array();
	
		for($i=0;$i<count($ketqua);$i++){
			
			if(kiemtradachoroi($ketqua[$i]['maso'])==1) $solan++;
			
		}	
		
		$kq=$solan;
		
		return $kq; 
					
	  } 
	   function sof1dachotuan($a){
		global $d;	
		$kq=0;
		$solan=0;
		
		$sql = "select maso from table_product where gioithieu='".$a."' and ngaytao >=".ngaythu2();	  
		$d->query($sql);		
		$ketqua = $d->result_array();
	
		for($i=0;$i<count($ketqua);$i++){
			
			if(kiemtradachoroi($ketqua[$i]['maso'])==1) $solan++;
			
		}	
		
		$kq=$solan;
		
		return $kq; 
					
	  } 
	  
  
	function sendsms($a,$b,$c){
		global $d;
		
		//Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
		//� 2013 esms.vn
		//Website: http://esms.vn/
		//Hotline: 0902.435.340      
	   
		//Huong dan chi tiet cach su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
		//De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API 
		
		$dienthoai=$a;
		$noidung=$b;
		$loai=$c;
		
		$APIKey="36C698322911CFDE1195FE3DB18511";
		$SecretKey="BDF88C916C90A7BCACB0D6734F0ACB";
		
        $ch = curl_init();

		
		$SampleXml = "<RQST>"
                               . "<APIKEY>". $APIKey ."</APIKEY>"
                               . "<SECRETKEY>". $SecretKey ."</SECRETKEY>"                                    
                               . "<ISFLASH>0</ISFLASH>"
		                       . "<SMSTYPE>4</SMSTYPE>"
                               . "<CONTENT>". $noidung ."</CONTENT>"
                               . "<CONTACTS>"
                               . "<CUSTOMER>"
                               . "<PHONE>". $dienthoai ."</PHONE>"
                               . "</CUSTOMER>"                               
                               . "</CONTACTS>"
							   . "</RQST>";
							   		
							   
		curl_setopt($ch, CURLOPT_URL,            "http://api.esms.vn/MainService.svc/xml/SendMultipleMessage_V2/" );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_POST,           1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS,     $SampleXml ); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

		$result=curl_exec ($ch);		
		$xml = simplexml_load_string($result);

		if ($xml === false) {
			die('Error parsing XML');   
		}

		//now we can loop through the xml structure
		//Tham khao them ve SMSTYPE de gui tin nhan hien thi ten cong ty hay gui bang dau so 8755... tai day :http://esms.vn/SMSApi/ApiSendSMSNormal
		
		$trangthai = $xml->CodeResult;
		
		$data['dienthoai'] = $dienthoai;
		$data['loaitinnhan'] = $loai;			
		$data['noidung'] = $noidung;		
		$data['trangthai'] = $trangthai;
		$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
		$d->setTable('sms');
		$d->insert($data);
		
		
		
	}
	 
	 function kiemtrasms($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_chonhan where pincho='".$a."' order by id asc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		if($ketqua['id']!='') $kq=1;
			
		return $kq; 
					
	  } 
	  
	  function kiemtraxacnhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select xacnhan from table_cho where pincho='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		if($ketqua['xacnhan']>0) $kq=1;
			
		return $kq; 
					
	  } 

      function danhandu($a,$b){
		global $d;	
		$kq=0;
		$tam=0; 
		$tam1=0;
		
		$sqlx = "select xacnhan from table_nhan where maso='".$a."' and rut=0 order by id desc limit 0,1 ";
		$d->query($sqlx);		
		$ketquax = $d->fetch_array();
		
		if($ketquax['xacnhan']==1 || $ketquax['xacnhan']==''){	
			
			$sql = "select pincho from table_cho where maso='".$a."' order by id asc ";
			$d->query($sql);		
			$ketqua = $d->result_array();
			
			for($i=0;$i<count($ketqua);$i++){			
				if($ketqua[$i]['pincho']==$b){			
					$tam=$i;
					break;
				}			
			}
			for($j=0;$j<$tam;$j++){			
				if(kiemtraxacnhan($ketqua[$j]['pincho'])==0){
					 $kq=1;
					 break;
				}			
			}	
		} else{		 
			$kq=1;		
		}
		
		
		return $kq; 
					
	  } 
             

      function kiemtralock($a){
		global $d;
	    $kq=0;
		$sql = "select hienthi from table_product  where  maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		if($ketqua['hienthi']==0) $kq=1;
		
		 return $kq;
	}
	
	function soconquanly($a){
		global $d;
	    $socon=0;
		$sql = "select maso from table_product  where  quanly='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		$socon= count($ketqua);
		 return $socon;
	}
	
	function sof1($a){
		global $d;
	    $kq=0;
		$sql = "select count(id) as soluong from table_product  where hienthi=1 and gioithieu='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['soluong'];
	
		 return $kq;
	}
	
	
	function sof1s($a){
		global $d;
	    $kq=0;
		$sql = "select count(id) as soluong from table_product  where gioithieu='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['soluong'];
	
		 return $kq;
	}
	function sof1s1($a){
		global $d;
	    $kq=0;
		$sql = "select count(id) as soluong from table_product1  where gioithieu='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['soluong'];
	
		 return $kq;
	}
	
	function kiemtraf1($a,$b){
		global $d;
	    $kq=0;
		$sql = "select gioithieu from table_product  where  maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		if($ketqua['gioithieu']==$b) $kq=1;
	
		 return $kq;
	}
	
	
	function kiemtratrung($a,$b){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_chonhan where pinnhan='".$a."' and pincho='".$b."' limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		if($ketqua['id']!='') $kq=1;
			
		return $kq; 
					
	  } 
	 
	  function kiemtrapinnhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_nhan where pinnhan='".$a."' limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		if($ketqua['id']!='') $kq=1;
			
		return $kq; 
					
	  } 
	  
	  function kiemtrapincho($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where pincho='".$a."' limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		if($ketqua['id']!='') $kq=1;
			
		return $kq; 
					
	  } 
	 
	 function masonhan($a){
		global $d;	
		$kq=''; 
		 
		$sql = "select maso from table_nhan where pinnhan='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$kq=$ketqua['maso'];
			
		return $kq; 
					
	  } 
	  
	    
	  function masocho($a){
		global $d;	
		$kq=''; 
		 
		$sql = "select maso from table_cho where pincho='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$kq=$ketqua['maso'];
			
		return $kq; 
					
	  } 
	 
	
	
	
	  function solancho($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_chonhan where pincho='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$dacho = count($ketqua);
				
		$kq=$dacho;
			
		return $kq; 
					
	  } 
	  
	   function solannhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_chonhan where pinnhan='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$danhan = count($ketqua);
				
		$kq=$danhan;
			
		return $kq; 
					
	  } 
	  
	 
	
	
	function hamtinhgio($a){
		global $d;	
		$kq=''; 
		$thoigian=time()-$a;
		
		$ngay = (int)($thoigian / 86400);
		$tieptheo = $thoigian % 86400;
		
		$gio = (int)($tieptheo / 3600);
		$tieptheo = $tieptheo % 3600;
		
		$phut = (int)($tieptheo / 60);
		$tieptheo = $tieptheo % 60;
		 
		
		$kq=$ngay." ngày ".$gio." giờ ".$phut." phút";
		return $kq; 
					
	  } 	
	
	function thoigiancho(){
		global $d;	
		$kq=0; 
		 
		$sql = "select thoigiancho from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['thoigiancho']*24;
		return $kq; 
					
	  } 
	  
	  
	function thoigiannhan(){
		global $d;	
		$kq=0; 
		 
		$sql = "select thoigiannhan from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['thoigiannhan']*24;
		return $kq; 
					
	  } 	
	  
	  function thoigiandatlenh(){
		global $d;	
		$kq=0; 
		 
		$sql = "select thoigiandatlenh from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['thoigiandatlenh']*24;
		return $kq; 
					
	  } 			
	
	
	function tutao($a){
		global $d;	
		$kq=''; 
		 
		$sql = "select danhdau from table_nhan where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		if($ketqua['danhdau']==1)$kq=1;
		
		return $kq; 
					
	  } 
	function get_email($a){
		global $d;	
		$kq=''; 
		 
		$sql = "select email from table_product where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['email'];
		
		return $kq; 
					
	  } 
	
	 
	  function cholandau($a,$b){
		global $d;	
		$kq=0; 
		 
		$sql = "select pincho from table_cho where maso='".$a."' order by id asc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
	    if($ketqua['pincho']==$b) $kq= 1;
			
		return $kq; 
					
	  } 
	 
	 function datlandau($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where maso='".$a."' order by id asc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();		
		
	    if($ketqua['id']!='') $kq= 1;
			
		return $kq; 
					
	  } 
	
	
	
	 function dacholan22($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id,ngaytao from table_cho where maso='".$a."' order by id asc limit 0,2";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$thoigian = (int)((time() - $ketqua[0]['ngaytao'])/3600);
		
	    if($ketqua[1]['id']!='' || $thoigian < 24) $kq= 1;
			
		return $kq; 
					
	  } 
	
	
	 function dacholan2($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where maso='".$a."' order by id asc limit 0,2";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
	    if($ketqua[1]['id']!='') $kq= 1;
			
		return $kq; 
					
	  } 
	  
	  
	 function kiemtrathoigiankich($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaytao from table_cho where maso='".$a."' order by id desc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$thoigian = (int)((time() - $ketqua['ngaytao'])/3600);
		$capbac = get_idcapbac($a);		
		
		if(dacholan2($a)>0){
			
			if($capbac==1 && $thoigian < 168) $kq=1;
			if($capbac==2 && $thoigian < 144) $kq=1;
			if($capbac==3 && $thoigian < 120) $kq=1;
			if($capbac==4 && $thoigian < 96) $kq=1;
			if($capbac==5 && $thoigian < 72) $kq=1;
			if($capbac==6 && $thoigian < 48) $kq=1;
			if($capbac==7 && $thoigian < 24) $kq=1;
			if($capbac==8 && $thoigian < 12) $kq=1;
		
		}
		
			
		return $kq; 
					
	  } 
	  
	  
	  
	        
	function allcannhan(){
		global $d;	
		$kq=0; 
		 
		$sql = "select sum(sotien) as sotien from table_nhan";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
			$kq= $ketqua['sotien'];
		
		
		return $kq; 
					
	  } 
	  
	  function allcancho(){
		global $d;	
		$kq=0; 
		 
		$sql = "select count(id) as soluong from table_cho";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
			$kq= $ketqua['soluong']*2500000;
		
		
		return $kq; 
					
	  } 
	  
	 function get_vi(){
		global $d;	
		$kq=0; 
		 
		$sql = "select vi from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['vi'];
		return $kq; 
					
	  } 		
			
	function cho(){
		global $d;	
		$kq=0; 
		 
		$sql = "select cho from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['cho'];
		return $kq; 
					
	  } 
	  
	   function nhan(){
		global $d;	
		$kq=0; 
		 
		$sql = "select nhan from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['nhan'];
		return $kq; 
					
	  } 	
	   
	  
	   
	   function xacdinhnhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select danhan from table_pin where mapin='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['danhan'];
				
		return $kq; 
					
	  } 
	   
	   
	   function pinhientai($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sopin from table_product where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['sopin'];
		
		if( $kq<0 ) $kq = 0;
		
		return $kq; 
					
	  } 
	  
	   function ngaytao($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaytao from table_product where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ngaytao'];
		
		return $kq; 
					
	  } 
	  
	   function ngaydongbang($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaydongbang from table_product where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ngaydongbang'];
		
		return $kq; 
					
	  } 
	   
	 
	  
	   function tongcannhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sotien from table_nhan where pinnhan='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['sotien'];
		return $kq; 
					
	  }
	  
	   
	  
	  function danhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sum(sotien) as sotien from table_chonhan where pinnhan='".$a."' and danhan=1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
			$kq= $ketqua['sotien'];
		
		
		return $kq; 
					
	  } 
	  
	    function danhans($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sum(sotien) as sotien from table_chonhan where pinnhan='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
			$kq= $ketqua['sotien'];
		
		
		return $kq; 
					
	  } 
	  
	  function cannhan($a){
		global $d;	
		$kq=0; 
		 
		$kq =tongcannhan($a) - danhan($a);
		
		return $kq; 
					
	  } 
	  
	   function cannhans($a){
		global $d;	
		$kq=0; 
		 
		$kq =tongcannhan($a) - danhans($a);
		
		return $kq; 
					
	  } 
	  
	  
	   function dacho($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sum(sotien) as sotien from table_chonhan where pincho='".$a."' and danhan=1 ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		$kq= $ketqua['sotien'];
		
		
		return $kq; 
					
	  } 
	  
	    function dachos($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select sum(sotien) as sotien from table_chonhan where pincho='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		if($ketqua['sotien']!='')
		$kq= $ketqua['sotien'];
		
		
		return $kq; 
					
	  } 
	   
	   function cancho($a){
		global $d;	
		$kq=0; 
		 
		$kq =cho() - dacho($a);
		
		return $kq; 
					
	  } 
	  
	   function canchos($a){
		global $d;	
		$kq=0; 
		 
		$kq =cho() - dachos($a);
		
		return $kq; 
					
	  } 
	  
	  
	  
	  
	   function kiemtralandau($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_chonhan where masocho='".$a."' order by id asc";
		$d->query($sql);		
		$ketqua = $d->result_array();
				
		if($ketqua[1]['id']!='') $kq=1;
			
		return $kq; 
					
	  } 
	   
	   function kiemtradacho($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select masocho,ngaytao from table_chonhan where masocho='".$a."'  order by id desc";
		$d->query($sql);		
		$ketqua = $d->result_array();
				
		if($ketqua[0]['masocho']!='') $kq= ( time() - $ketqua[0]['ngaytao'] )/3600;
			
		return $kq; 
					
	  } 
	  
	  function kiemtradachos($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select masocho from table_chonhan where masocho='".$a."' and danhan>0 order by id desc";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
	    if($ketqua[0]['masocho']!='') $kq= 1;
			
		return $kq; 
					
	  } 
	   
	   
	   function luccho($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaytao from table_cho where pincho='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$thoigian= (int)(( time() - $ketqua['ngaytao'] )/3600);
		
		if($thoigian >= thoigiancho()) $kq=1;
			
		return $kq; 
					
	  } 
	  
	    function thoigiandatlenh1($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaytao from table_cho where maso='".$a."' order by id desc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		if($ketqua['ngaytao']=='')
			$thoigian=thoigiandatlenh()+1;
		else				
			$thoigian= (int)(( time() - $ketqua['ngaytao'] )/3600);
		
		$kq=$thoigian;
			
		return $kq; 
					
	  } 
	  
	  function lucnhan($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select ngaytao from table_nhan where pinnhan='".$a."'  order by id desc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$thoigian= (int)(( time() - $ketqua['ngaytao'] )/3600);
		
		if($thoigian >= thoigiannhan()) $kq=1;
			
		return $kq; 
					
	  } 
	  
	   function dacholan2s($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where maso='".$a."' and xacnhan>0 order by id asc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
	    if($ketqua['id']!='') $kq= 1;
			
		return $kq; 
					
	  } 
	  
	  
	   function pindau($a,$b){
		global $d;	
		$kq=0; 
		 
		$sql = "select pincho from table_cho where maso='".$a."'  order by id asc limit 0,1";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		
	    if($b==$ketqua['pincho'] && canchos($b)>0) $kq= 0;
		else $kq=1;
			
		return $kq; 
					
	  } 
	  
	 
	    
	  function dieukiencancho($a){
		global $d;	
		$kq=0; 
								
			if(dachos($a)>= cho()) $kq=1;
			if(luccho($a)==0) $kq=1;		
		
		return $kq; 
					
	  } 
	   
	   
	   function dieukiencannhan($a){
		global $d;	
		$kq=0; 	
	
		 if(cannhans($a)<= 0) $kq=1;
		 if(lucnhan($a)==0) $kq=1;
		
		 
		return $kq; 
					
	  } 
	  function dieukiencannhan1($a){
		global $d;	
		$kq=0; 	
	
		 if(cannhans($a)<= 0) $kq=1;
		
		return $kq; 
					
	  } 
	  
	  
	
	 
     function get_capbac($a){
		global $d,$ketqua;	
		$kq=""; 
		 
		$sql = "select a.ten_vi as ten_vi from table_product_list as a, table_product b where a.id=b.id_list and b.maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ten_vi'];
		return $kq; 
					
	  } 
	  
	  function get_toidatuan($a){
		global $d,$ketqua;	
		$kq=""; 
		 
		$sql = "select a.toidatuan as toidatuan from table_product_list as a, table_product b where a.id=b.id_list and b.maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['toidatuan'];
		return $kq; 
					
	  } 
	  
	  
	  
	  function get_idcapbac($a){
		global $d,$ketqua;	
		$kq=0; 
				 
		$sql = "select a.id as id from table_product_list as a, table_product b where a.id=b.id_list and b.maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['id'];
		return $kq; 
					
	  } 
	  
	   function phantram($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select a.phantram as phantram from table_product_list as a, table_product b where a.id=b.id_list and b.maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=($ketqua['phantram']/100);
		return $kq; 
					
	  } 
	  
	 
	function loinhuan($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select a.loinhuan as loinhuan from table_product_list as a, table_product b where a.id=b.id_list and b.maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['loinhuan']/4;
		return $kq; 
					
	  }   
	
	
	function get_id($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select id from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['id'];
		return $kq; 
					
	  }
	  
	  function get_maso($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select maso from table_product  where id=".$a;
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['maso'];
		return $kq; 
					
	  }
	  
	  function get_user($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select user from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['user'];
		return $kq; 
					
	  }
	   function get_goi($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select goi from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['goi'];
		return $kq; 
					
	  }
	  
	   function get_gioithieu($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select gioithieu from table_product  where user='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['gioithieu'];
		return $kq; 
					
	  }
	  
	 function get_quanly($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select quanly from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['quanly'];
		return $kq; 
					
	  }
	  
	   function get_quanly1($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select quanly from table_product1  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['quanly'];
		return $kq; 
					
	  }
	  
	  function get_ten($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select hoten from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['hoten'];
		return $kq; 
					
	  }
	  
	  function get_ten1($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select hoten from table_product1  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['hoten'];
		return $kq; 
					
	  }
	  
	   function get_sdt($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select dienthoai from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['dienthoai'];
		return $kq; 
					
	  }
	  
	  
	  function tencapbac($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ten_vi from table_product_list  where id=".$a;
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ten_vi'];
		return $kq; 
				
	  }
	  
	   function get_hienthi($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select hienthi from table_product  where maso='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['hienthi'];
		return $kq; 
					
	  }
	  
	  
	    function mucdat($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ten_vi from table_product_cat  where id='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ten_vi'];
		return $kq; 
					
	  }
	  
	   function mucdat1($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ten_vi from table_product_cat2  where id='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ten_vi'];
		return $kq; 
					
	  }
	  
	    function mucdat2($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select ten_vi from table_product_cat4  where id='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['ten_vi'];
		return $kq; 
					
	  }
	  
	
	
	 function dinhmucnhanh($a){
		global $d,$ketqua;	
		$kq=0; 
		$bien=0;
		$bien=get_idcapbac($a)-1;
		 
		$sql = "select dinhmucnhanh from table_product_list where id=".$bien;
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$kq=$ketqua['dinhmucnhanh'];
		return $kq; 
					
	  } 
	  
	 
	  
	  function dinhmuctong($a){
		global $d,$ketqua;	
		$kq=0; 
		$bien=0;
		$bien= (get_idcapbac($a)-1);
		 
		$sql = "select dinhmuctong from table_product_list where id=".$bien;
		$d->query($sql);		
		$ketqua = $d->fetch_array();
				
		$kq=$ketqua['dinhmuctong'];
		return $kq; 
					
	  } 
	  
	 
	function socontructiep($a){
	    global $d,$ketqua;	
		$kq=0;
		
		$sql = "select id from table_product  where hienthi=1 and quanly='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$kq=count($ketqua);
		return $kq; 					
}
	
	
	function condautien($a){
		global $d,$ketqua;	
		$kq=0; 
		 
		$sql = "select maso from table_product where hienthi=1 and quanly='".$a."' order id asc";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$kq=$ketqua[0]['ten_vi'];
		return $kq; 
					
	  } 
	
	
	
function isRoot($n)
{
	global $d,$ketqua;
	$sql="select quanly from table_product where maso='".$n."'";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	if ($ketqua['quanly']=='')return true;	
	else return false;
}
function Root()
{
	global $d,$ketqua;
	$sql="select maso from table_product where quanly=''";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	return ($ketqua['maso']);
}


function Father($n)
{
	global $d,$ketqua;
	$sql="select quanly from table_product where maso='".$n."'";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	$kq=$ketqua['quanly'];
	return $kq; 
}



function isChildFirst($n)
{
	global $d,$ketqua;
	$father=Father($n);
	$sql="select * from table_product where quanly='".$father."' order by id asc limit 0,1";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	if($ketqua["maso"]==$n)
	return true;
	else return false;
}





function isChildLast($n)
{
	global $d,$ketqua;
	$father=Father($n);
	$sql="select maso from table_product where quanly='".$father."' order by id desc limit 0,1";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	if($ketqua['maso']==$n)
	return true;
	else return false;
}



	

	
	function socon($a){
		global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$i=0;
		while(count($arr)>0)
		{
				$n=count($arr)-1;
				$brr=explode("_",$arr[$n]);		
				$p=$brr[1]+1;
				$k=$brr[0]."_".$p;
				array_pop($arr);
				array_push($arr,$k);
				$sql="select maso from table_product where  hienthi=1 and quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
				
				if (count($ketqua)>0)
				{ 
					array_push($arr,$ketqua[0]["maso"]."_0");
				}
				else { 
				
					$i++;
						array_pop($arr);
				}
			}
			return $i-1;
	}
	
	
	function soconx($a){
		global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$i=0;
		while(count($arr)>0)
		{
				$n=count($arr)-1;
				$brr=explode("_",$arr[$n]);		
				$p=$brr[1]+1;
				$k=$brr[0]."_".$p;
				array_pop($arr);
				array_push($arr,$k);
				$sql="select maso from table_product where  quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
				
				if (count($ketqua)>0)
				{ 
					array_push($arr,$ketqua[0]["maso"]."_0");
				}
				else { 
				
					$i++;
						array_pop($arr);
				}
			}
			return $i-1;
	}
	
	
	
	
	
	
	function socons($a){
		global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$i=0;
		while(count($arr)>0)
		{
				$n=count($arr)-1;
				$brr=explode("_",$arr[$n]);		
				$p=$brr[1]+1;
				$k=$brr[0]."_".$p;
				array_pop($arr);
				array_push($arr,$k);
				$sql="select maso from table_product where hienthi=1 and quanly='".$brr[0]."'  order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
				
				if (count($ketqua)>0)
				{ 
					array_push($arr,$ketqua[0]["maso"]."_0");
				}
				else { 
				
					$i++;
						array_pop($arr);
				}
			}
			return $i-1;
	}
	
	
	function nhanhyeu_theocon($a){
		global $d,$kq;		  	   
	    $kq='';
		$sql = "select maso from table_product  where hienthi=1 and quanly='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		if(count($ketqua) > 1){
						
			if(socons($ketqua[0]['maso']) >= socons($ketqua[1]['maso']))
			  $kq = $ketqua[1]['maso'];
			else
			  $kq = $ketqua[0]['maso'];	
			
		}		
		return $kq;		
	}
	
	
	
	function socontrongthang($a){
		global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$i=0;
		while(count($arr)>0)
		{
				$n=count($arr)-1;
				$brr=explode("_",$arr[$n]);		
				$p=$brr[1]+1;
				$k=$brr[0]."_".$p;
				array_pop($arr);
				array_push($arr,$k);
				$sql="select maso from table_product where hienthi=1 and ngaykichhoat >=".strtotime(date("Y-m-01",time()))." and quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
				
				if (count($ketqua)>0)
				{ 
					array_push($arr,$ketqua[0]["maso"]."_0");
				}
				else { 
				
					$i++;
						array_pop($arr);
				}
			}
			return $i-1;
	}
	
	
	function thanhtichthang($a){
		global $d,$kq;
		$kq=0;
		
		$sql="select soluong from table_quanlyvung where ngaytao >=".strtotime(date("Y-m-01",time()))." and maso='".$a."' order by id asc";
		$d->query($sql);		
		$ketqua = $d->result_array();
		for($i=0;$i<count($ketqua);$i++){
			$kq=$kq + $ketqua[$i]['soluong'];
		}		
		
		return $kq;
	}
	
	function thanhtichthangdaily($a){
		global $d,$ketqua;
		
		$sql="select maso from table_dailybanhang where xacthuc=1 and ngayxacthuc >=".strtotime(date("Y-m-01",time()))." and daily='".$a."' order by id asc";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		
		return count($ketqua);
	}
	
	
function get_tang($a,$b){	
	    global $kq;
		$dieukien=1;
		$sotang=0;
		$temquanly=get_quanly($b);
		
		while($dieukien==1){
			
			if($a!=$b){
				$sotang++;
				if($temquanly==$a)
				$dieukien=0;						
				$temquanly=get_quanly($temquanly);
			}
			else $dieukien=0;
		}
		
		
		$kq = $sotang;
		return $kq;
		
		
}



function capduoi($a){
	
	global $d,$ketqua,$mang,$tr;
		$arr=array();
		$mang=array();
		$arr[0]=$a."_0";
		$i=0;
		$h=0;
		$str="";
		while(count($arr)>0)
		{
		$n=count($arr)-1;
		$brr=explode("_",$arr[$n]);
		if ($brr[1]==0){ 		    
			$mang[$h]=$brr[0];
			$h++;			 
		}
		$p=$brr[1]+1;
		$k=$brr[0]."_".$p;
		array_pop($arr);
		array_push($arr,$k);
		$sql="select maso from table_product where quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
		$d->query($sql);		
		$ketqua = $d->result_array();
		if (count($ketqua)>0)
		{ 
		array_push($arr,$ketqua[0]["maso"]."_0");
		}
		else { 		
		array_pop($arr);
		}
		}		
		
		return $mang;
		
		
}


function capduois($a){
	
	global $d,$ketqua,$mang,$tr;
		$arr=array();
		$mang=array();
		$arr[0]=$a."_0";
		$i=0;
		$h=0;
		$str="";
		while(count($arr)>0)
		{
		$n=count($arr)-1;
		$brr=explode("_",$arr[$n]);
		if ($brr[1]==0){ 		    
			$mang[$h]=$brr[0];
			$h++;			 
		}
		$p=$brr[1]+1;
		$k=$brr[0]."_".$p;
		array_pop($arr);
		array_push($arr,$k);
		$sql="select maso from table_product where  quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
		$d->query($sql);		
		$ketqua = $d->result_array();
		if (count($ketqua)>0)
		{ 
		array_push($arr,$ketqua[0]["maso"]."_0");
		}
		else { 		
		array_pop($arr);
		}
		}		
		
		return $mang;
		
		
}
// ve cay show tat ca cac cap
function vecayk($a){
	global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$mau="";
		$i=0;
		while(count($arr)>0)
		{
		$mau="";
		$hinh="class='hinh'";
		$n=count($arr)-1;
		$brr=explode("_",$arr[$n]);
		if ($brr[1]==0){ 
		   
		   $user=get_user($brr[0]); 
		   $ten=" - ".get_ten($brr[0])."(".get_goi($brr[0])."$)";
		   if(get_hienthi($brr[0])==0) { $mau="style='color:#f00'"; $hinh="class='hinh1'";}
		   if(get_goi($brr[0])==20 && get_hienthi($brr[0])==1) { $mau="style='color:#609'";	 $hinh="class='hinh2'";}	  
			if(isRoot($brr[0])||isChildFirst($brr[0])||($brr[0]==$a && $brr[1]==0))
			{			
			echo "<ul><li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
			else 
			{
			echo "<li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
		}
		$p=$brr[1]+1;
		$k=$brr[0]."_".$p;
		array_pop($arr);
		array_push($arr,$k);
		$sql="select maso from table_product where  quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
		$d->query($sql);		
		$ketqua = $d->result_array();
		if (count($ketqua)>0)
		{ 
		array_push($arr,$ketqua[0]["maso"]."_0");
		}
		else { 
		if(isRoot($brr[0])||isChildLast($brr[0])||($brr[0]==$a && $brr[1]==0))
		echo "</li></ul>";
		else echo "</li>";
		array_pop($arr);
		}
		}
}
			
//vẽ cây theo bậc 3

function vecay13($a){
	global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$mau="";
		$i=0;
		$so_bac=1;
		$w=1;
		$root=1;
		while(count($arr)>0)
		{
		$mau="";
		$hinh="class='hinh'";
		$n=count($arr)-1;
		$brr=explode("_",$arr[$n]);
		$flag=1;
		if ($brr[1]==0){ 
		   
		   $user=get_user($brr[0]); 
		   $ten=" - ".get_ten($brr[0])."(".get_goi($brr[0])."$)";
		   if(get_hienthi($brr[0])==0) { $mau="style='color:#f00'"; $hinh="class='hinh1'";}
		   if(get_goi($brr[0])==20 && get_hienthi($brr[0])==1) { $mau="style='color:#609'";	 $hinh="class='hinh2'";}	  
			if(isRoot($brr[0])||isChildFirst($brr[0]))
			{	
			echo "<ul><li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
			else 
			{
			echo "<li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
		  
		}
		$p=$brr[1]+1;
		$k=$brr[0]."_".$p;
		array_pop($arr);
		array_push($arr,$k);
		//neu s=3=> k làm gì và gán s=1;
		
				$sql="select maso from table_product where  quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
				if (count($ketqua)>0 && $so_bac<3 )
				{ 
					  array_push($arr,$ketqua[0]["maso"]."_0");
					 $so_bac++;
				}
				else { 
					if($so_bac==3){
							$sql_q="select maso from table_product where  quanly='".$brr[0]."'";
							$d->query($sql_q);		
							$cnt = $d->result_array();
							if (count($cnt)>0)
							  // echo "<ul><li>view More</li></ul>";
						    echo "<ul><li class='v-m'><span><a class='view-more' href='#'>View More</a></span></ul></li>";
						  
					}
					if(isRoot($brr[0])||isChildLast($brr[0]))
					echo "</li></ul>";
					else{
						echo "</li>";
						
					}
					array_pop($arr);
					$so_bac--;
					$flag=2;
					
                    				   
					
				}
		
				
		}
}
//ve cay fix được gốc đứt nét
function vecay($a){
	global $d,$ketqua;
		$arr=array();
		$arr[0]=$a."_0";
		$mau="";
		$i=0;
		$so_bac=1;
		$w=1;
		
		while(count($arr)>0)
		{
		$mau="";
		$hinh="class='hinh'";
		$n=count($arr)-1;
		$brr=explode("_",$arr[$n]);
		if ($brr[1]==0){ 
		   
		   $user=get_user($brr[0]); 
		   $ten=" - ".get_ten($brr[0])."(".get_goi($brr[0])."$)";
		   if(get_hienthi($brr[0])==0) { $mau="style='color:#f00'"; $hinh="class='hinh1'";}
		   if(get_goi($brr[0])==20 && get_hienthi($brr[0])==1) { $mau="style='color:#609'";	 $hinh="class='hinh2'";}	  
			if(isRoot($brr[0])||isChildFirst($brr[0])||($brr[0]==$a && $brr[1]==0))
			{	
			echo "<ul><li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
			else 
			{
			echo "<li><a><span $hinh></span></br><b $mau>$user $ten</b></a>";
			}
		  
		}
		$p=$brr[1]+1;
		$k=$brr[0]."_".$p;
		array_pop($arr);
		array_push($arr,$k);
		//neu s=3=> k làm gì và gán s=1;
		
				$sql="select maso from table_product where  quanly='".$brr[0]."' order by id asc limit ".($p-1).",1";
				$d->query($sql);		
				$ketqua = $d->result_array();
					echo "khoiiiiiiiiiiiiiii". var_dump($d->result_array());
				if (count($ketqua)>0 && $so_bac<3 )
				{ 
					  array_push($arr,$ketqua[0]["maso"]."_0");
					 $so_bac++;
				}
				else { 
					if($so_bac==3){
							$sql_q="select maso from table_product where  quanly='".$brr[0]."'";
							$d->query($sql_q);		
							$cnt = $d->result_array();
							if (count($cnt)>0)
							  // echo "<ul><li>view More</li></ul>";
						    echo "<ul><li class='v-m'><span><a class='view-more' href='#'>View More</a></span></ul></li>";
						  
					}
					if(isRoot($brr[0])||isChildLast($brr[0])||($brr[0]==$a && $brr[1]==0))
					echo "</li></ul>";
					else{
						echo "</li>";
						
					}
					array_pop($arr);
					$so_bac--;
					
					
                    				   
					
				}
		
				
		}
}
			


 function xetlencap($a){
	  	global $d,$ketquap,$sonhanh,$tag,$kiemtra;		  	   
	   
		$sqlp = "select maso from table_product  where hienthi=1 and gioithieu='".$a."'";
		$d->query($sqlp);		
		$ketquap = $d->result_array();
		
		$sqlp = "select * from table_product_list where id!=4 order by id desc";
		$d->query($sqlp);		
		$mucthuong = $d->result_array();
	
	
		for($i=0;$i<count($mucthuong);$i++){
				
			$mucdat=0;
			$dinhmucnhanh=0;	
			$sonhanh=0;
			$tag=0;		
		   
			if( socon($a)>= $mucthuong[$i]['dinhmuctong'] && count($ketquap)>1 ){
				$mucdat=$mucthuong[$i]['id'];
				$dinhmucnhanh=$mucthuong[$i]['dinhmucnhanh'];
				
				for($j=0;$j<count($ketquap);$j++){
					if( (socon($ketquap[$j]['maso'])+1) >=$dinhmucnhanh ) $sonhanh++;
				}			 
							
				$sqlkt = "select capbacmoi from table_lencap where maso='".$a."'";
				$d->query($sqlkt);		
				$kiemtra = $d->result_array();
				
				for($h=0;$h<count($kiemtra);$h++){
					 if($kiemtra[$h]['capbacmoi']==$mucdat) $tag=1;
				}			
											
				if($tag==0 && $sonhanh>1){						
					
					$data117['maso'] = $a;				
					$data117['capbaccu'] = get_idcapbac($a);
					$data117['capbacmoi'] = get_idcapbac($a)-1;
					$data117['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));					
					$d->setTable('lencap');
					$d->insert($data117);		
					
					
					$sqlo = "UPDATE table_product SET id_list=".(get_idcapbac($a)-1)." WHERE  maso='".$a."'";
				    $resulto = mysql_query($sqlo) or die("Not query sqlo");		
				
					break;					
					
				}	
				
			}
		}
		 
 }
 
 function xetthuong($a){
	  	global $d,$ketquap,$mucthuong,$mucdat,$phanthuong;		  	   
	  
		$sqlp = "select maso from table_product  where hienthi=1 and quanly='".$a."'";
		$d->query($sqlp);		
		$ketquap = $d->result_array();
		
		$sqlp = "select * from table_product_cat order by id asc";
		$d->query($sqlp);		
		$mucthuong = $d->result_array();		
			
		
		for($i=0;$i<count($mucthuong);$i++){
			
			$mucdat=0;
			$phanthuong="";
			$dinhmucnhanh=0;	
			$sonhanh=0;
			$tag=0;		
			
			if( socon($a)>= $mucthuong[$i]['dinhmuctong'] && count($ketquap)>1){					
					$mucdat=$mucthuong[$i]['id'];
					$phanthuong=$mucthuong[$i]['phanthuong'];
					$dinhmucnhanh=$mucthuong[$i]['dinhmucnhanh'];
					
					for($j=0;$j<count($ketquap);$j++){
						if( (socon($ketquap[$j]['maso'])+1) >=$dinhmucnhanh ) $sonhanh++;
					}			 
								
					$sqlkt = "select mucdat from table_thuong where maso='".$a."'";
					$d->query($sqlkt);		
					$kiemtra = $d->result_array();
					
					for($h=0;$h<count($kiemtra);$h++){
						 if($kiemtra[$h]['mucdat']==$mucdat) $tag=1;
					}				 
					
					if($tag==0 && $sonhanh>1){										
						$data11['maso'] = $a;
						$data11['mucdat'] =$mucdat;
						$data11['phanthuong'] = $phanthuong;
						$data11['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));					
						$d->setTable('thuong');
						$d->insert($data11);
						break;
					}
				
			 }	
		}		
	
 }
 
function sopin($a,$b,$c){
		global $d,$sopin;		  	   
	    $sopin=0;
		
		$sqlp = "select id from table_pin where maso='".$a."' and ngaykichhoat>=".$b." and ngaykichhoat<=".$c." and dacho=1 and trangthai=0 order by id asc";
		$d->query($sqlp);		
		$ketqua = $d->result_array();		
			
		$sopin = count($ketqua);
		
		return $sopin;		
	
	
	}
	
function themvaocho($a,$b){	
	global $d; 
	
	
		$datag['pincho'] = $a;
		$datag['maso'] = $b;	
		$datag['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));					
		$d->setTable('cho');
		$d->insert($datag);
	
	//mysql_free_result($d);		
	
}
 
 function thuongpin($a,$b,$c){
	 
	  	global $d,$mucdat,$phanthuong;		  	   
	    $phanthuong=0;
		$sqlp = "select * from table_product_cat2 order by id asc";
		$d->query($sqlp);		
		$mucthuong = $d->result_array();		
			
		
		for($i=0;$i<count($mucthuong);$i++){						
			if( sopin($a,$b,$c) >= $mucthuong[$i]['thanhtich'] )
			$phanthuong = $mucthuong[$i]['thuong'];
		}
		return $phanthuong;		
	
 }
   
function kichhoatbanhang($a){
	  	global $d,$mucthuong,$mucdat,$phanthuong; 
		
		$sqlp = "select maso,xacthuc from table_dailybanhang where maso='".$a."'";
		$d->query($sqlp);		
		$banhang = $d->fetch_array();
		
		if($banhang['maso']!="" && $banhang['xacthuc']==0){
			$sqlUPDATE_KICHHOAT = "UPDATE table_dailybanhang SET xacthuc =1,ngayxacthuc=".strtotime(date("Y-m-d H:i:s",time()))." WHERE  maso='".$a."'";
			$resultUPDATE_KICHHOAT = mysql_query($sqlUPDATE_KICHHOAT) or die("Not query sqlUPDATE_KICHHOAT");		
			//thuongdaily($banhang['daily']);
		}
		
 }


function socon1nut($a){
	  	global $d,$kq; 
		$kq=0;
		$sql = "select count(quanly) as socon from table_product where quanly='".$a."'";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['socon'];
			
		return $kq;
 }
 
 
function xacdinhnutgan($a){
	  	global $d,$masog; 
		$masog="";
			
		$tam = capduois($a);
		
		for($i=0;$i<count($tam);$i++){
			$danhsach[$i]=get_id($tam[$i]);		
		}
		
		sort($danhsach);
		$maso='';
		
		for($k=0;$k<count($danhsach);$k++){
			$maso=get_maso($danhsach[$k]);
			if(socon1nut($maso)<2) {
				$masog=$maso;
				break;			
			}			
		}
		
		return $masog;
 }


function dinhmucgoi($a){
	global $d,$kq; 
		
	$sql = "select dinhmuc from table_product_cat1 where id=".$a;
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	$kq=$ketqua['dinhmuc'];
	 return $kq;
}


function taocaytrian($a){	
	global $d; 
	$datag['hoten'] = get_ten($a);
	$datag['maso'] = taoma();
	$datag['gioithieu'] =get_gioithieu($a);
	$datag['quanly'] = xacdinhnutgan();
	$datag['danhdau'] =0;
	$datag['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));					
	$d->setTable('product1');
	$d->insert($datag);
	//mysql_free_result($d);		
	
}





function tinhhoahongtrian($a){
	
	    global $d,$maso;	
		
		$maso=$a;		
		$gioithieu=get_gioithieu($maso);
				
		
		if($gioithieu==""){}
		else{		
			$dieukien=1;
			$sotang=1;
			$temgioithieu=$gioithieu;
			$sotien=0;
			do{
				$datax['maso'] = $temgioithieu;
				$datax['sotien'] = 50000;
				$datax['lydo']=$maso;
				$datax['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
				$d->setTable('hoahongtrian');
				$d->insert($datax);
				
				$temgioithieu=get_gioithieu($temgioithieu);
				$sotang++;
				if($temgioithieu=="" || $sotang > 7) $dieukien=0;
					
			}while($dieukien>0);
				
	    }// neu là nút gốc	
			
	
}

 
   function tonglenh($a){
		global $d;	
		$kq=0; 
		 
		$sql = "select id from table_cho where maso='".$a."'  and xacnhan=1 ";
		$d->query($sql);		
		$ketqua = $d->result_array();
		
		$kq=count($ketqua);
				
		return $kq; 
					
	  } 
	  
	  
	  function tonglenhf1($a){
		global $d;	
		$kq=0;
		$solan=0;
		
		$sql = "select maso from table_product where gioithieu='".$a."'";
		$d->query($sql);		
		$ketqua = $d->result_array();
	
		for($i=0;$i<count($ketqua);$i++){
			$solan += tonglenh($ketqua[$i]['maso']);
		}	
		
		$kq=$solan;
		
		return $kq; 
					
	  } 
	  
	  
	  function tonglenhs($a){
		global $d;	
		$kq=0;
		$solan=0;
		
		if($a!=''){
				
			$ketqua = capduoi($a);	
			for($i=0;$i<count($ketqua);$i++){
				if($ketqua[$i]!=$a)
				$solan += tonglenh($ketqua[$i]);
			}			
			$kq=$solan;
			
		}
		
		return $kq; 
					
	  } 
	  
	   
	   function hoahongtructiep($a){
		global $d;	
		$kq=0;		
		$sqlhoahong = "select sum(sotien) as sotien from #_hoahongtructiep where maso='".$a."'";	
		$d->query($sqlhoahong);
		$tienhoahong = $d->fetch_array();	
		$kq= $tienhoahong['sotien'];
		return $kq; 
					
	  }
	  
	   function hoahongtructiep1($a){
		global $d;	
		$kq=0;		
		
		$kq= $tienhoahong['sotien'];
		return $kq; 
					
	  }
	  
	    function sotien_tungnhanh($a){
		global $d;	
		$kq=0;
		$tam=0;
			
		$mang=capduoi($a);
				
		for($i=0;$i<count($mang);$i++){
			if(get_hienthi($mang[$i]) ==1){					
				$tam=$tam+get_goi($mang[$i]);
			}
		}
		
		$kq=$tam;					
		return $kq; 					
	  }
	
		function hoahonghethong($a){
			global $d,$kq;		  	   
			$kq=0;
			$tam=0;
			$sql = "select maso from table_product  where hienthi=1 and quanly='".$a."'";
			$d->query($sql);		
			$ketqua = $d->result_array();
			
			if(count($ketqua) > 1){
							
				if(sotien_tungnhanh($ketqua[0]['maso']) >= sotien_tungnhanh($ketqua[1]['maso']))
				  $tam = sotien_tungnhanh($ketqua[1]['maso']);
				else
				  $tam = sotien_tungnhanh($ketqua[0]['maso']);	
				
			}
			
			if(get_goi($a)<501)		
				$kq=$tam*0.1;
			else
				$kq=$tam*0.15;
				
					
			return $kq;		
		}
	  
	   	  
	  function hoahonghethong1($a){
		global $d;	
		$kq=0;		
		
		return $kq; 
					
	  }
	  
	   function hoahongdatmuc($a){
		global $d;	
		$kq=0;		
		$sqldatmuc = "select sum(sotien) as sotien from #_hoahongtrian where maso='".$a."'";	
		$d->query($sqldatmuc);
		$tiendatmuc = $d->fetch_array();	
		$kq= $tiendatmuc['sotien'];
		return $kq; 
					
	  }
	  
	   function hoahongdatmuc1($a){
		global $d;	
		$kq=0;		
		
		return $kq; 
					
	  }
	  
	  function laitinh($a){
		global $d;	
		$kq=0;	
		$songay=0;	
		$goi=0;
		$sqlltime = "select ngaykichhoat,ngaynangcap,goi  from #_product where maso='".$a."'";	
		$d->query($sqlltime);
		$kqtime = $d->fetch_array();
		
		if($kqtime['ngaynangcap']!=0)
			{$songay=round((time()-$kqtime['ngaynangcap'])/86400);}
		else
			{$songay=round((time()-$kqtime['ngaykichhoat'])/86400);}
			
		$goi=$kqtime['goi'];		
		
		if($goi==100 || $goi==300 || $goi==500)		
		{
			if($songay>225) $songay=225;							
		    $kq= $songay*$goi*0.0066;
		}
		
		if($goi==1000 || $goi==3000 || $goi==5000)
		{
			if($songay>180) $songay=180;			
		    $kq= $songay*$goi*0.0083;
		}
		
		if($goi==10000 || $goi==30000 || $goi==50000)
		{						
			if($songay>150) $songay=150;
			$kq= $songay*$goi*0.01;
		}
		
		return $kq; 
					
	  }
	  
	   function laitinh1($a){
		global $d;	
		$kq=0;	
		$songay=0;	
		
		return $kq; 
					
	  }
	  
	  

 	  function tongbonus($a){
		global $d;	
		$kq=0;
		$kq = hoahongtructiep($a);		
		return $kq; 
					
	  }
	  
	  function tongbonus1($a){
		global $d;	
		$kq=0;
		$kq = hoahonghethong($a) +  laitinh($a);	
		return $kq; 
					
	  }
	  
	  function bonusdarut($a){
		global $d;	
		$kq=0;		
		$sqlrut = "select sum(sotien) as sotien from #_rutbonus where loai=1  and maso='".$a."'";	
		$d->query($sqlrut);
		$tongrut = $d->fetch_array();	
		$kq= $tongrut['sotien'];
		return $kq; 
					
	  }
	  
	    function bonusdarut1($a){
		global $d;	
		$kq=0;		
		$sqlrut = "select sum(sotien) as sotien from #_rutbonus where loai=2 and  maso='".$a."'";	
		$d->query($sqlrut);
		$tongrut = $d->fetch_array();	
		$kq= $tongrut['sotien'];
		return $kq; 
					
	  }
	  
	   function bonusconlai($a){
		global $d;	
		$kq=0;		
			
		$kq= tongbonus($a)- bonusdarut($a);
		if($kq<0) $kq=0;
		
		return $kq; 
					
	  }
	  
	  
	   function bonusconlai1($a){
		global $d;	
		$kq=0;		
			
		$kq= tongbonus1($a)- bonusdarut1($a);
		if($kq<0) $kq=0;
		
		return $kq; 
					
	  }
	  
	   function thuchienkhoa($a){
		global $d,$ketqua;	
		$kq=0;
				
		
		$tienphat = tongbonus($a) - bonusdarut($a);
		if($tienphat <=0 ) $tienphat = 0;
		
		$data['maso'] = $a;
		$data['sotien'] = $tienphat;
		$data['lydo'] = 'Phạt Clock tài khoản ';
		$data['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
		$d->setTable('rutbonus');
		$d->insert($data);
		
		$sqlxoa1 = "delete from table_hoahongtrian where maso='".$a."'";
		$d->query($sqlxoa1);
		
		
	  }
	  
	  
	  
	     function cancap(){
		global $d,$ketqua;	
		$kq=""; 
		 
		$sql = "select cancap from table_setting  ";
		$d->query($sql);		
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['cancap'];
		return $kq; 
					
	  } 


   

function tonghop($a){
	
	   global $d,$maso;	
		
		$maso=$a;		
		$gioithieu=get_gioithieu($maso);
		$quanly=get_quanly($maso);
		
		$datam['maso'] = $gioithieu;
		$datam['sotien'] = 12;
		$datam['lydo']=$maso;
		$datam['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
		$d->setTable('hoahongtructiep');
		$d->insert($datam);
		
		
		if($quanly=="" ){}
		else{		
			$dieukien=1;			
			$temquanly=$quanly;
			$sotang=1;
			
			do{									
				$datax['maso'] = $temquanly;
				$datax['sotien'] = 9;
				$datax['lydo']=$maso;
				$datax['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
				$d->setTable('hoahonggiantiep');
				$d->insert($datax);
				
				$temquanly=get_quanly($temquanly);
				$sotang++;
								
				if($temquanly=="" || $sotang>3) $dieukien=0;
					
			}while($dieukien>0);
			
				
	    }// neu là nút gốc
			
			
	
}


 function iddautien($a){
		global $d;	
		$kq=""; 
		 
		$sql = "select maso  from #_product where id_list=".$a." order by id asc limit 0,1 ";
		$d->query($sql);
		$ketqua = $d->fetch_array();
		
		$kq=$ketqua['maso'];
		return $kq; 
					
	  } 

function tonghop1(){
	
	   global $d;	
	
		$sqlkx = "select count(id) as songuoi from #_product ";
		$d->query($sqlkx);
		$itemskx = $d->fetch_array();			
		$tongsonguoi = $itemskx['songuoi'];
		
		   if( $tongsonguoi % 3 == 0){
		
			
			//25$
					
			$mathe1=iddautien(1);
			$sqlc = "update table_product set id_list =2 where  maso='".$mathe1."'";
			$d->query($sqlc);
			
			if(sof1s($mathe1)>0){
				$datam['maso'] = $mathe1;
				$datam['sotien'] = 25;
				$datam['lydo']='Level up 25$';
				$datam['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
				$d->setTable('hoahongtrian');
				$d->insert($datam);
			}
			
			//75$
			
			$sqld1 = "select count(id) as soluong  from #_product where id_list=2 order by id asc  ";
			$d->query($sqld1);
			$itemsd1 = $d->fetch_array();
			
			if( $itemsd1['soluong']>3 && ($itemsd1['soluong']-1) % 3 ==0) {
				
				$mathe2=iddautien(2);				
				$sqlc1 = "update table_product set id_list =3 where  maso='".$mathe2."'";
				$d->query($sqlc1);
				
				if(sof1s($mathe2)>0){
					$datam1['maso'] = $mathe2;
					$datam1['sotien'] = 75;
					$datam1['lydo']='Level up 75$';
					$datam1['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam1);
				}
				
			}
			
			//150$
			
			$sqld2 = "select count(id) as soluong  from #_product where id_list=3 order by id asc  ";
			$d->query($sqld2);
			$itemsd2 = $d->fetch_array();
			
			if( $itemsd2['soluong']>3 && ($itemsd2['soluong']-1) % 3 ==0) {
				$mathe3=iddautien(3);
				$sqlc2 = "update table_product set id_list =4 where  maso='".$mathe3."'";
				$d->query($sqlc2);
				
				if(sof1s($mathe3)>0){
					$datam2['maso'] = $mathe3;
					$datam2['sotien'] = 150;
					$datam2['lydo']='Level up 150$';
					$datam2['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam2);
				}
				
			}
			
			//300$
			
			$sqld3 = "select count(id) as soluong  from #_product where id_list=4 order by id asc  ";
			$d->query($sqld3);
			$itemsd3 = $d->fetch_array();
			
			if( $itemsd3['soluong']>3 && ($itemsd3['soluong']-1) % 3 ==0) {
				$mathe4=iddautien(4);
				$sqlc3 = "update table_product set id_list =5 where  maso='".$mathe4."'";
				$d->query($sqlc3);
				
				if(sof1s($mathe4)>0){
					$datam3['maso'] = $mathe4;
					$datam3['sotien'] = 300;
					$datam3['lydo']='Level up 300$';
					$datam3['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam3);
				}
				
			}
			
			//600$
			
			$sqld4 = "select count(id) as soluong  from #_product where id_list=5 order by id asc  ";
			$d->query($sqld4);
			$itemsd4 = $d->fetch_array();
			
			if( $itemsd4['soluong']>3 && ($itemsd4['soluong']-1) % 3 ==0) {
				$mathe5=iddautien(5);
				$sqlc4 = "update table_product set id_list =6 where  maso='".$mathe5."'";
				$d->query($sqlc4);
				
				if(sof1s($mathe5)>0){
					$datam4['maso'] = $mathe5;
					$datam4['sotien'] = 600;
					$datam4['lydo']='Level up 600$';
					$datam4['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam4);
				}
				
			}
			
			//1200$
			
			$sqld5 = "select count(id) as soluong  from #_product where id_list=6 order by id asc  ";
			$d->query($sqld5);
			$itemsd5 = $d->fetch_array();
			
			if( $itemsd5['soluong']>3 && ($itemsd5['soluong']-1) % 3 ==0) {
				$mathe6=iddautien(6);
				$sqlc5 = "update table_product set id_list =7 where  maso='".$mathe6."'";
				$d->query($sqlc5);
				
				if(sof1s($mathe6)>0){
					$datam5['maso'] = $mathe6;
					$datam5['sotien'] = 1200;
					$datam5['lydo']='Level up 1200$';
					$datam5['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam5);
				}
				
			}
			
			//2400$
			
			$sqld6 = "select count(id) as soluong  from #_product where id_list=7 order by id asc  ";
			$d->query($sqld6);
			$itemsd6 = $d->fetch_array();
			
			if( $itemsd6['soluong']>3 && ($itemsd6['soluong']-1) % 3 ==0) {
				$mathe7=iddautien(7);
				$sqlc6 = "update table_product set id_list =8 where  maso='".$mathe7."'";
				$d->query($sqlc6);
				
				if(sof1s($mathe7)>0){
					$datam6['maso'] = $mathe7;
					$datam6['sotien'] = 2400;
					$datam6['lydo']='Level up 2400$';
					$datam6['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam6);
				}
				
			}
			
			//4800$
			
			$sqld7 = "select count(id) as soluong  from #_product where id_list=8 order by id asc  ";
			$d->query($sqld7);
			$itemsd7 = $d->fetch_array();
			
			if( $itemsd7['soluong']>3 && ($itemsd7['soluong']-1) % 3 ==0) {
				$mathe8=iddautien(8);
				$sqlc7 = "update table_product set id_list =9 where  maso='".$mathe8."'";
				$d->query($sqlc7);
				
				if(sof1s($mathe8)>0){
					$datam7['maso'] = $mathe8;
					$datam7['sotien'] = 4800;
					$datam7['lydo']='Level up 4800$';
					$datam7['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
					$d->setTable('hoahongtrian');
					$d->insert($datam7);
				}
				
			}
		
			
			
		}
		
		
		
		
		
	
}



function lencap($a){
	
		global $d;	
			
			$capbac = get_idcapbac($a);			
			$dem=0;			
			
			if($capbac == 1 ){
				
					$dem1=0;
					$sql = "select maso from table_product  where  gioithieu='".$a."'";
					$d->query($sql);		
					$ketqua = $d->result_array();
					
					for($h=0;$h<count($ketqua);$h++){					
						$sqldc = "select xacnhan from table_cho  where  maso='".$ketqua[$h]['maso']."' order by id asc";
						$d->query($sqldc);		
						$dacho = $d->fetch_array();					
						if($dacho['xacnhan']==1) $dem1++;					
					}
					
					 if($dem1>=5){
						$sql1 = "update table_product set id_list =2 where  maso='".$a."'";
						$d->query($sql1);
				    }
				
			}
			
			if($capbac == 2 ){
					
					$sql2 = "select maso from table_product  where  gioithieu='".$a."'";
					$d->query($sql2);		
					$ketqua2 = $d->result_array();
				
					for($i=0;$i<count($ketqua2);$i++){
						if(get_idcapbac($ketqua2[$i]['maso'])==2) $dem++;
					}
				
					if($dem>=3){
						$sql3 = "update table_product set id_list =3 where  maso='".$a."'";
						$d->query($sql3);						
					}
				
			}
			
			if($capbac == 3 ){
				
				$sql2 = "select maso from table_product  where  gioithieu='".$a."'";
					$d->query($sql2);		
					$ketqua2 = $d->result_array();
				
					for($i=0;$i<count($ketqua2);$i++){
						if(get_idcapbac($ketqua2[$i]['maso'])==3) $dem++;
					}
				
					if($dem>=3){
						$sql3 = "update table_product set id_list =4 where  maso='".$a."'";
						$d->query($sql3);						
					}
			}
			
			if($capbac == 4 ){
				
				$sql2 = "select maso from table_product  where  gioithieu='".$a."'";
					$d->query($sql2);		
					$ketqua2 = $d->result_array();
				
					for($i=0;$i<count($ketqua2);$i++){
						if(get_idcapbac($ketqua2[$i]['maso'])==4) $dem++;
					}
				
					if($dem>=3){
						$sql3 = "update table_product set id_list =5 where  maso='".$a."'";
						$d->query($sql3);						
					}
				
			}
			
			if($capbac == 5 ){
				$sql2 = "select maso from table_product  where  gioithieu='".$a."'";
					$d->query($sql2);		
					$ketqua2 = $d->result_array();
				
					for($i=0;$i<count($ketqua2);$i++){
						if(get_idcapbac($ketqua2[$i]['maso'])==5) $dem++;
					}
				
					if($dem>=3){
						$sql3 = "update table_product set id_list =6 where  maso='".$a."'";
						$d->query($sql3);						
					}
			}
		
}




function hoahongcancap($a,$b,$c){	
	 global $d,$kq;	  
	 $kq=0;
	 $kq =socaps($a,$b,$c);	 
	 return $kq*500000;
}


function thuongvip($a,$b,$c){}




function hoahonggiantiep($a,$b,$c){
	 global $d,$ketqua,$ketqua1;	  
	 $luong=0;
	 
	$sql="select sotien from table_hoahonggiantiep where maso='".$a."' and ngaytao>=".$b." and ngaytao <=".$c." order by id desc";
	$d->query($sql);		
	$ketqua = $d->result_array();
	
	for($i=0;$i<count($ketqua);$i++){
		$luong = $luong + $ketqua[$i]['sotien'];
	}
	
	return $luong;
}

function soluongtrian($a,$b,$c){
	 global $d,$ketquab,$ketqua1,$soluong;	  
	 $soluong=0;
	 $luong=0;
	 $batdau=$b;
	 $ketthuc=$c;
	 
	$sql="select maso from table_product1 where gioithieu='".$a."' order by id asc";
	$d->query($sql);		
	$ketquab= $d->result_array();  
	
	if(count($ketquab)>1){		
		for($w=0;$w<count($ketquab);$w++){
			if(socon1($ketquab[$w]['maso'])<8191)			    					
		    $soluong = $soluong + count(capduoi1($ketquab[$w]['maso'],$b,$c));
		}		
		
	}
	else{		
	    if(socon1($ketquab[0]['maso'])<8191)			    					
		$soluong =  count(capduoi1($ketquab[0]['maso'],$b,$c));		
	}
	
	return $soluong;
}

function phantramtrian($a,$b,$c){
	
	 global $d,$ketquay,$luongy;	  
	 $luongy=0;
	 
	$sql="select trian from table_setting ";
	$d->query($sql);		
	$trian= $d->fetch_array();
	 
	$sql="select maso from table_product where gioithieu='".$a."' order by id asc";
	$d->query($sql);		
	$ketquay= $d->result_array(); 
	
	
	
	for($m=0;$m<count($ketquay);$m++){
		
		$luongy = $luongy + ((soluongtrian($ketquay[$m]['maso'],$b,$c)*$trian['trian'])*phantram($ketquay[$m]['maso']));
		
	}
	
	return $luongy;	
	 
}


function hoahongtrian($a,$b,$c){
	 global $d,$tong;
	 $tong=0;
	 
		$sql="select trian from table_setting ";
		$d->query($sql);		
		$trian= $d->fetch_array();
	 
	 $tong = (soluongtrian($a,$b,$c)*$trian['trian']) + phantramtrian($a,$b,$c);
	 return $tong;
	 	
}


function thuongdatmuc($a,$b,$c){
	 global $d,$ketqua;	  
	 $luong=0;
	 
	$sql="select phanthuong from table_thuong where maso='".$a."' and ngaytao>=".$b." and ngaytao <=".$c." order by id desc";
	$d->query($sql);		
	$ketqua = $d->result_array();
	
	for($i=0;$i<count($ketqua);$i++){
		$luong = $luong + $ketqua[$i]['phanthuong'];
	}
	
	return $luong;
}

function tongsonguoi(){
	 global $d,$kq;
	 $kq=0;
	 $thoigian = strtotime(date("Y-m-d 00:00:00",time()));	  
		 
	$sql="select id from table_product where hienthi =1 and ngaykichhoat >=".$thoigian;
	$d->query($sql);
	$ketqua = $d->result_array();	
		
	$kq=count($ketqua);	
	
	return $kq;
}
function tongdautu($a){
	 global $d,$kq;
	 $kq=0;	  
		 
	$sql="select id from table_product where hienthi =1 and id_cat1=".$a;
	$d->query($sql);
	$ketqua = $d->result_array();	
		
	$kq=count($ketqua);	
	
	return $kq;
}


function lairong($a,$b){
	 global $d,$kq;	  
	 $bien=0;
	 $songay=0;
	 
	$sql="select id_list,ngaykichhoat from table_product where maso='".$a."'";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	
	if($b < $ketqua['ngaykichhoat']) $songay=365;
	else $songay=(int)(($b-$ketqua['ngaykichhoat'])/86400);	
	
	$sql1="select lairong from table_product_list where id=".$ketqua['id_list'];
	$d->query($sql1);		
	$ketqua1 = $d->fetch_array();
		
	if($songay<121)
		$kq=$ketqua1['lairong']/4;
	else
		$kq=0;	
	
	return $kq;
}


function dautus($a,$b){
	 global $d,$kq;	  
	 $kq=0;
	 $songay=0;
	 
	$sql="select id_cat1,ngaykichhoat from table_product where maso='".$a."'";
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	
	if($b < $ketqua['ngaykichhoat']) $songay=10000;
	else $songay=(int)(($b-$ketqua['ngaykichhoat'])/86400);	
	
		$sql1="select loitucthang,songay from table_product_cat1 where id=".$ketqua['id_cat1'];
		$d->query($sql1);		
		$ketqua1 = $d->fetch_array();		
				
		if( $songay < ($ketqua1['songay']+1) )
			$kq=($ketqua1['loitucthang']*(tongsonguoi() + songuoi()))/(tongdautu($ketqua['id_cat1'])+ sodautu());
		else
			$kq=0;	
	
	return $kq;
}


function luutudong($a){
	 global $d;
	 $ngay = date("dmy",$a);
	 if(date("dmy",time()) == $ngay){
		 
		 $sqlxoa=" delete from table_dautu where ngaytao1 ='".$ngay."'";
	     $d->query($sqlxoa);	
		 
	 } 

	$sql="select maso from table_product where hienthi = 1 order by id asc";
	$d->query($sql);		
	$ketqua = $d->result_array();
	
	for($i=0;$i<count($ketqua);$i++){
		
		$data19['maso'] = $ketqua[$i]['maso'];
		$data19['sotien'] = dautus($ketqua[$i]['maso'],$a);
		$data19['ngaytao1'] = date("dmy",time());	
		$data19['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));		
		$data19['nguoitao'] = $_SESSION['login']['username'];
		$d->setTable('dautu');
		$d->insert($data19);
		
	}
	transfer("SAVE thành công!", "index.php");

	
	
}



function dautu($a,$b,$c){
	 global $d,$kq;	  
	 $dautu=0;
	
	$sql="select sotien from table_dautu where maso='".$a."' and ngaytao >= ".$b." and ngaytao <= ".$c;
	$d->query($sql);		
	$ketqua = $d->result_array();
	
	for($i=0;$i<count($ketqua);$i++){
		
		$dautu = $dautu + $ketqua[$i]['sotien'];
		
	}
	$kq = $dautu;
	return $kq;
}



function luongcung($a,$b,$c){
	 global $d,$ketqua;	  
	 $luong=0;
	 
	$sql="select luongcung from table_thuong1 where maso='".$a."' and ngaytao>=".$b." and ngaytao <=".$c;
	$d->query($sql);		
	$ketqua = $d->fetch_array();
	
	$luong = $ketqua['luongcung'];
	
	
	return $luong;
}


function chietkhau($a,$b,$c){
	 global $d,$ketquack,$luongck;	  
	 $sotien=0;
	 $luong=0;
	 
	$sqlck="select chietkhau from table_dailybanhang where daily='".$a."' and xacthuc=1  and ngayxacthuc>=".$b." and ngayxacthuc <=".$c." order by id desc";
	$d->query($sqlck);		
	$ketquack = $d->result_array();
	
	for($i=0;$i<count($ketquack);$i++){
		$sotien = $sotien + $ketquack[$i]['chietkhau'];
	}
	
	$luongck = $sotien;
	
	return $luongck;
}


function taoma(){
	  global $d;	 
	 
	 $md5_hash = rand(0,999999);
     $security_code =$md5_hash;
	 $kq = strtoupper($security_code);
     return $kq; 
				
  }
  
 function taoma1(){
	 
	 global $d;	 
	 
	$sqlkx = "select count(id) as songuoi from #_product1 ";
	$d->query($sqlkx);
	$itemskx = $d->fetch_array();			
	$tongsonguoi = $itemskx['songuoi']+1000;
	 
     $security_code ='CASE'.$tongsonguoi;
	 $kq = strtoupper($security_code);
     return $kq; 
				
  }





function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}

#
#	$id_connect : ket noi database
#
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}

// dem so nguoi online //
/////////////////////////
function count_online(){
/*
CREATE TABLE `camranh_online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `session_id` varchar(255) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
*/
	global $d;
	$time = 600; // 10 phut
	$ssid = session_id();

	// xoa het han
	$sql = "delete from #_online where time<".(time()-$time);
	$d->query($sql);
	//
	$sql = "select id,session_id from #_online order by id desc";
	$d->query($sql);
	$result['dangxem'] = $d->num_rows();
	$rows = $d->result_array();
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	
	if($i<$result['dangxem']){
		$sql = "update #_online set time='".time()."' where session_id='".$ssid."'";
		$d->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into #_online (session_id, time) values ('".$ssid."', '".time()."')";
		$d->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}


function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}

function alert($s){
	echo '<script language="javascript"> alert("'.$s.'") </script>';
}

function delete_file($file){
		return @unlink($file);
}

function upload_image($file, $extension, $folder, $newname=''){
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		
		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$_FILES[$file]['name'] = $newname.'.'.$ext;
		}
		
		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}

function thumb_image($file, $width, $height, $folder){	

	if(!file_exists($folder.$file))	return false; // không tìm thấy file
	
	if ($cursize = getimagesize ($folder.$file)) {					
		$newsize = setWidthHeight($cursize[0], $cursize[1], $width, $height);
		$info = pathinfo($file);
		
		$dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
		
		$types = array('jpg' => array('imagecreatefromjpeg', 'imagejpeg'),
					'gif' => array('imagecreatefromgif', 'imagegif'),
					'png' => array('imagecreatefrompng', 'imagepng'));
		$func = $types[$info['extension']][0];
		$src = $func($folder.$file); 
		imagecopyresampled($dst, $src, 0, 0, 0, 0,$newsize[0], $newsize[1],$cursize[0], $cursize[1]);
		$func = $types[$info['extension']][1];
		$new_file = str_replace('.'.$info['extension'],'_thumb.'.$info['extension'],$file);
		
		return $func($dst, $folder.$new_file) ? $new_file : false;
	}
}


function setWidthHeight($width, $height, $maxWidth, $maxHeight){
	$ret = array($width, $height);
	$ratio = $width / $height;
	if ($width > $maxWidth || $height > $maxHeight) {

		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
		if ($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
	}
	return $ret;
}


function transfer($msg,$page="index.php")
{
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("./templates/transfer_tpl.php");
	 exit();
}

function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}

function back($n=1){
	echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
	exit();
}

function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}

function themdau($s){
	$s = addslashes($s);
	return $s;
}

function bodau($s){
	$s = stripslashes($s);
	return $s;
}

function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}

	function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&curPage=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&curPage=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&curPage=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&curPage=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."/p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."/p=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."/p=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."/p=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		$r3['total']=$totalRows;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function catchuoi($chuoi,$gioihan){
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so sánh vị trí cắt
với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
nếu vị trí khoảng trắng lớn hơn
thì cắt chuỗi tại vị trí khoảng trắng đó
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// trường hợp còn lại không ảnh hưởng tới kết quả
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}

function stripUnicode1($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function changeTitle1($str)
{
	$str = stripUnicode1($str);
	//$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str); 
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}




function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|A|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	 'b'=>'B',
	 'c'=>'C',
	 'd'=>'đ|Đ|D',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|E|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	 'f'=>'F',
	 'g'=>'G',
	 'h'=>'H',
   	 'i'=>'í|ì|ỉ|ĩ|ị|I|Í|Ì|Ỉ|Ĩ|Ị',	
	 'j'=>'J',
	 'k'=>'K', 
	 'l'=>'L',
	 'm'=>'M',
	 'n'=>'N',	  
   	 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|O|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	 'p'=>'P',
	 'q'=>'Q',
	 'r'=>'R',
	 's'=>'S',
	 't'=>'T',
   	 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|U|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	 'v'=>'V',
	 'w'=>'W',
	 'x'=>'X',
   	 'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Y|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	 'z'=>'Z',
     
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function changeTitle($str)
{
	$str = stripUnicode($str);
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str); 
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}



function getCurrentPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
	$pageURL = explode("/p=", $pageURL);
    return $pageURL[0];
}
function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

$new_width   = $width;
$new_height   = $height;

 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
	
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;

// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;

     default : die("UNKNOWN IMAGE TYPE: $image_url");
}

// scale down and add borders
	if ($zoom_crop == 3) {

		$final_height = $height * ($new_width / $width);

		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}

	}

	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);

	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);

	// scale down and add borders
	if ($zoom_crop == 2) {

		$final_height = $height * ($new_width / $width);
		
		if ($final_height > $new_height) {
			
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));

		} else {

			$origin_y = $new_height / 2;
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));

		}

	}

	// Restore transparency blending
	imagesavealpha ($canvas, true);

	if ($zoom_crop > 0) {

		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {

			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

		} else if ($cmp_y > $cmp_x) {

			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}

		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}

		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }
	


$new_file=$file_name.'_'.$new_width.'x'.$new_height.'.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);
else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

return $new_file;
}

function ChuoiNgauNhien($sokytu){
	$chuoi="ABCDEFGHJKLMNPQRSTUVWXYZWabcdefghjkmnpqrstuvwxyzw123456789";
	for ($i=0; $i < $sokytu; $i++){
		$vitri = mt_rand( 0 ,strlen($chuoi) );
		$giatri= $giatri . substr($chuoi,$vitri,1 );
	}
return $giatri;
} 

function ChuoiNgauNhien1($sokytu){
	$chuoi="abcdefghijklmnopqrstuvwxyzw0123456789";
	for ($i=0; $i < $sokytu; $i++){
		$vitri = mt_rand( 0 ,strlen($chuoi) );
		$giatri= $giatri . substr($chuoi,$vitri,1 );
	}
return $giatri;
} 

function check_yahoo($nick_yahoo='nthaih'){
	$file = @fopen("http://opi.yahoo.com/online?u=".$nick_yahoo."&m=t&t=1","r");
	$read = @fread($file,200);
	
	if($read==false || strstr($read,"00"))
		$img = '<img src="images/yahoo_offline.png" border="0" align="absmiddle" />';
	else
		$img = '<img src="images/yahoo_online.png" border="0" align="absmiddle"/>';
	return '<a href="ymsgr:sendIM?'.$nick_yahoo.'">'.$img.'</a>';
}
function limitWord($string, $maxOut){

$string2Array = explode(' ', $string, ($maxOut + 1));

if( count($string2Array) > $maxOut ){
array_pop($string2Array);
$output = implode(' ', $string2Array)."...";
}else{
$output = $string;
}
return $output;
}


function _substr($str,$n){
	if(strlen($str)<$n) return $str;
	$html = substr($str,0,$n);
	$html = substr($html,0,strrpos($html,' '));
	return $html.'...';
	}
	
function taomatkhau($str){
    $temp = sha1(md5(trim($str)));
	return $temp;
}


function VndText($amount)
{
         if($amount <=0)
        {
            return $textnumber="Tiền phải là số nguyên dương lớn hơn số 0";
        }
        $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);
        
        for ($i = 0; $i < $length; $i++)
        $unread[$i] = 0;
        
        for ($i = 0; $i < $length; $i++)
        {               
            $so = substr($amount, $length - $i -1 , 1);                
            
            if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
                for ($j = $i+1 ; $j < $length ; $j ++)
                {
                    $so1 = substr($amount,$length - $j -1, 1);
                    if ($so1 != 0)
                        break;
                }                       
                       
                if (intval(($j - $i )/3) > 0){
                    for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                        $unread[$k] =1;
                }
            }
        }
        
        for ($i = 0; $i < $length; $i++)
        {        
            $so = substr($amount,$length - $i -1, 1);       
            if ($unread[$i] ==1)
            continue;
            
            if ( ($i% 3 == 0) && ($i > 0))
            $textnumber = $TextLuythua[$i/3] ." ". $textnumber;     
            
            if ($i % 3 == 2 )
            $textnumber = 'trăm ' . $textnumber;
            
            if ($i % 3 == 1)
            $textnumber = 'mươi ' . $textnumber;
            
            
            $textnumber = $Text[$so] ." ". $textnumber;
        }
        
        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "lẻ", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);
        
        return ucfirst($textnumber." đồng chẵn");
}

/*
function load_view($file){
	ob_start();
	include _template.$file."_tpl.php";
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

function check_browser(){
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'IE';
	} elseif (preg_match( '|Opera ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Opera';
	} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Firefox';
	} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Safari';
	} else {
			// browser not recognized!
			$browser_version = 0;
			$browser= 'other';
	}
	return $browser;
}



function check_skype($nick_skype='ha.ngoc.thai'){
#		if(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype))>2000)
		$img = '<img src="media/images/skype_online.gif" width="93" height="46" border="0" />';
#		else
#			$img = '<img src="media/images/skype_offline.gif" width="93" height="46" border="0" />';
	//alert(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype)));
	return '<a href="skype:'.$nick_skype.'?call">'.$img.'</a>';
}

function tran($s){
	global $translate;
	#return $translate['Họ tên'];
	return strtr($s, $translate);
}

function redirect_error($n){
	switch ($n) {
		case '404' :
			echo "<center><h1>PAGE NOT FOUND</h1></center>";
			#echo "<script language='javascript'> window.location = 'error_404.html' </-------------script>";
			exit();
		default :
			alert('Kiem tra lai redirect_error');
			exit();
	}
}

function bodau2($s){
	$s = chuanhoa($s);
	$s = stripslashes($s);
	return $s;
}
function parent_alert($s){
	echo '<script language="javascript"> parent.alert("'.$s.'") </script>';
}

function parent_redirect($ur=''){
	echo '<script language="javascript">parent.location = "'.site($ur).'" </script>';
	exit();
}
function back($n=1){
	echo '<script language="javascript"> history.go('.-$n.'); </script>';
}
function goto($ur=''){
	echo '<script language="javascript">window.location = "'.$ur.'" </script>';
	exit();
}
//////////////  URL  //////////////////
///////////////////////////////////////////
function site($s=''){
	if(!DEBUG)
		$s = url_encode($s);
	return 'index.php?'.$s;

	$ur = 'index.php?'.$s;
	return url_encode($s);
	return $ur;
}

function url_encode($s){
	return  base64_encode($s);
}

function url_decode($s)	{
	return base64_decode($s);
}

function get_url(){
	$get = array();
	
	$query_str = !DEBUG ? url_decode($_SERVER['QUERY_STRING']) : $_SERVER["QUERY_STRING"];
	
	$parts = explode('&',$query_str);
	$get['com'] = $parts[0];
	for($i=1; $i<count($parts); $i++){
		$seg = explode( '=', $parts[$i]);
		$get[$seg[0]] = $seg[1];
	}
	$get['com'] = str_replace('-','/',$get['com']);
	return $get;
}


function check_login(){
	if(!isset($_SESSION['site_log']) || $_SESSION['site_log']==false)
		$_GET["com"] = "login";
}

function get_file($com, $act){
	#$com = isset($_GET['com']) ? $_GET['com'] : "index";
	$act = empty($act) ? '' : '_'.$act;
	$file['mod'] = "app/mod/".$com.$act."_mod.php";
	$file['ctr'] = "app/ctr/".$com.$act.".php";
	$file['view'] = "app/view/".$com.$act."_tpl.php";
	return $file;
}

function error_404(){
	if( DEBUG )
		header("Location: ../errors/error_404.php?com=".$_GET['com']);
	else
		header("Location: ../errors/error_404.php");
}

function top_content(){
	require_once "view/layout/top_tpl.php";
}

function bottom_content(){
	require_once "view/layout/bottom_tpl.php";
}

function main_content(){
	$file = get_file();	
	$error_nopage = 0;
	#dump($file);
	if( file_exists($file['mod'])) 
		require_once $file['mod'];
	if( file_exists($file['ctr'])){
		require_once $file['ctr'];
		$error_nopage ++;
	}
	if( file_exists($file['view'])){
		require_once $file['view'];
		$error_nopage++;
	}
	if($error_nopage == 0)
		error_404();
}




//////////////  FORM  //////////////////
///////////////////////////////////////////
function form_select($conf, $vals){
	$name = $conf['n'];
	$v = $conf['v'];
	$t = $conf['t'];
	$s = $conf['s'];
	$danh_muc = '<select id="$name" name="$name">';
	$danh_muc .= '<option value=""> ---- Select ---- </option>';
	for($i=0; $i<count($vals); $i++){
		$danh_muc .= "<option value=".$vals[$i][$v];
		if($vals[$i][$v]==$s) 
			$danh_muc .= " selected ";
		$danh_muc .= ">";
		$danh_muc .= $vals[$i][$t];
		$danh_muc .= '</option>';
	}
	$danh_muc .= '</select>';
	return $danh_muc;
}

function form_select_2($conf, $vals){
	$name = $conf['n'];
	$v = $conf['v'];
	$t = $conf['t'];
	$s = $conf['s'];
	$danh_muc = '<select id="$name" name="$name">';
	$danh_muc .= '<option value=""> ---- Chọn danh mục ---- </option>';
	for($i=0; $i<count($vals); $i++){
		$danh_muc .= "<option value=".$vals[$i][$v];
		if($vals[$i][$v]==$s) 
			$danh_muc .= " selected ";
		$danh_muc .= ">";
		$danh_muc .= $vals[$i][$t."_vi"]." - ".$vals[$i][$t."_en"];
		$danh_muc .= '</option>';
	}
	$danh_muc .= '</select>';
	return $danh_muc;
}
// echo form_select(array('n'=>'id_cat', 'v'=>'id', 't'=>'ten_vi', 's'=>$id_cat), $news_cats);

//////////////  PHAN TRANG  //////////////////
///////////////////////////////////////////

	function getUrl()
	{
		if(strpos($_SERVER['QUERY_STRING'],'&curPage')!==false)
			$url='?'.substr($_SERVER['QUERY_STRING'],0,strpos($_SERVER['QUERY_STRING'],'&curPage'));
		else
			$url='?'.$_SERVER['QUERY_STRING'];
		return $url;
	}

*/
#----------------------------------------------------------	



?>