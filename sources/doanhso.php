<?php  if(!defined('_source')) die("Error");
        $title_bar='Doanh số';		
	    $title_tcat='Doanh số';
		$ngaybd = addslashes($_GET['ngaybd']);
		$thangbd = addslashes($_GET['thangbd']);
		$nambd = addslashes($_GET['nambd']);
		$ngaykt = addslashes($_GET['ngaykt']);
		$thangkt = addslashes($_GET['thangkt']);
		$namkt = addslashes($_GET['namkt']);
		
		
		  
				if($ngaybd!='')
				{	
				    $sql = "select tien,luong,lydo,ghichu,ngaytao from #_product1 where idnv='".$_SESSION['login']['maso']."'";		
							
					
					$ngay = $ngaybd; //17
					$thang = $thangbd; //11
					$nam = $nambd; //2010
					$ngayto=$nam."-".$thang."-".$ngay;
					
					$batdau = strtotime($ngayto);
					$sql.=" and ngaytao >= ".$batdau;;
					$ngaybatdau= "/".$ngay."/".$thang."/".$nam;
					$ngaybatdau1= $ngay."/".$thang."/".$nam;	
				}				
				else {
					  $sql = "select tien,luong,lydo,ghichu,ngaytao from #_product1 where idnv='".$_SESSION['login']['maso']."' and ngaytao >= ".strtotime(date("Y-m-01",time()));		
				
				}
				
				//============================================
				
				if($ngaykt!='')
				{			
					$ngay = $ngaykt; //17
					$thang = $thangkt; //11
					$nam = $namkt; //2010
					$ngayfrom=$nam."-".$thang."-".$ngay;
						
					$ketthuc = strtotime($ngayfrom);
					$sql.=" and ngaytao <= ".$ketthuc;;
					$ngayketthuc="/".$ngay."/".$thang."/".$nam;
					$ngayketthuc1=$ngay."/".$thang."/".$nam;
				}
				
				
				//============================================
				
				
				$sql.=" order by id desc";
	
	         
		
		    $d->query($sql);
			$bangluong = $d->result_array();
		
		
			
			
			for($i=0;$i<count($bangluong);$i++){				
					$ds_cn += $bangluong[$i]['tien'];
					$hoahong += $bangluong[$i]['luong'];
			}
			
			
			$sqlx = "select id_list,maso from #_product where maso='".$_SESSION['login']['maso']."'";		
			$d->query($sqlx);
			$laymaso = $d->fetch_array();
			
			
			$ds_ht = doanhso_1thang($_SESSION['login']['maso'],$cccc,$dddd);
			$hotro = hotro_cp($ds_cn) + hotro_lencap($_SESSION['login']['maso'],$cccc,$dddd);
			
			$thuclanh = $hoahong + $hotro;
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url="doanh-so".$ngaybatdau.$ngayketthuc.".html";
			$maxR=10;
			$maxP=10;
			$paging=paging_home($bangluong, $url, $curPage, $maxR, $maxP);
			$bangluong=$paging['source'];
		
?>