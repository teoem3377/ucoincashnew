<?php 
 date_default_timezone_set('Asia/Ho_Chi_Minh');

 if(!defined('_source')) die("Error");
        $title_bar='Danh sách hưởng tri ân dài lâu';		
	    $title_tcat='Danh sách hưởng tri ân dài lâu';
		
		
		
		
		 @$idz =  addslashes($_GET['tam']);
		 if(addslashes($_GET['maso'])!="")		 
		 @$idz =  addslashes($_GET['maso']);
		 
		$ngaybd = trim(strip_tags($_GET['ngaybd']));
		$thangbd = trim(strip_tags($_GET['thangbd']));
		$nambd = trim(strip_tags($_GET['nambd']));
		$ngaykt = trim(strip_tags($_GET['ngaykt']));
		$thangkt = trim(strip_tags($_GET['thangkt']));
		$namkt = trim(strip_tags($_GET['namkt']));
		
		if (get_magic_quotes_gpc()==false) {
			
		$ngaybd = mysql_real_escape_string($_GET['ngaybd']);
		$thangbd = mysql_real_escape_string($_GET['thangbd']);
		$nambd = mysql_real_escape_string($_GET['nambd']);
		$ngaykt = mysql_real_escape_string($_GET['ngaykt']);
		$thangkt = mysql_real_escape_string($_GET['thangkt']);
		$namkt = mysql_real_escape_string($_GET['namkt']);
		
		}
		
		
				if($ngaybd!='')
				{						
					$ngay = $ngaybd; //17
					$thang = $thangbd; //11
					$nam = $nambd; //2010
					$ngayto=$nam."-".$thang."-".$ngay." 00:00:00";					
					$batdauv = strtotime($ngayto); 
					
				
					$ngaybatdau= "/".$ngay."/".$thang."/".$nam;
					$ngaybatdau1= $ngay."/".$thang."/".$nam;
						
				}else {			
					$batdauv = strtotime(date("Y-m-01 00:00:00",time()));			
				}
				
				
				if($ngaykt!='')
				{								
					$ngay = $ngaykt; //17
					$thang = $thangkt; //11
					$nam = $namkt; //2010
					$ngayfrom=$nam."-".$thang."-".$ngay." ".date("23:59:59",time());
						
					$ketthucv = strtotime($ngayfrom);
					$ngayketthuc="/".$ngay."/".$thang."/".$nam;
					$ngayketthuc1=$ngay."/".$thang."/".$nam;
					
				}else {			
					$ketthucv = strtotime(date("Y-m-d H:i:s",time()));				
				}
				
				
				$sql = " select gioithieu from table_product1 where maso='".$idz."'";
				$d->query($sql);		
				$hoten = $d->fetch_array();
				
					
				$danhsachb= capduoi1($idz,$batdauv,$ketthucv);		
				$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
				$url=getCurrentPageURL();
				$maxR=50;
				$maxP=10;
				$paging=paging_home($danhsachb, $url, $curPage, $maxR, $maxP);
				$danhsachb=$paging['source'];
		
		
?>