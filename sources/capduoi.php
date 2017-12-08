<?php  if(!defined('_source')) die("Error");
        $title_bar='Danh sách cấp dưới';		
	    $title_tcat='Danh sách cấp dưới';
		$ngaybd = addslashes($_GET['ngaybd']);
		$thangbd = addslashes($_GET['thangbd']);
		$nambd = addslashes($_GET['nambd']);
		$ngaykt = addslashes($_GET['ngaykt']);
		$thangkt = addslashes($_GET['thangkt']);
		$namkt = addslashes($_GET['namkt']);
		
		$ngay = $ngaybd; //17
		$thang = $thangbd; //11
		$nam = $nambd; //2010
		$ngayto=$nam."-".$thang."-".$ngay;		
		$koco1 = strtotime($ngayto);		
		$ngaybatdau1= $ngay."/".$thang."/".$nam;
		
		$ngay = $ngaykt; //17
		$thang = $thangkt; //11
		$nam = $namkt; //2010
		$ngayfrom=$nam."-".$thang."-".$ngay;			
		$koco2 = strtotime($ngayfrom);
		$ngayketthuc1=$ngay."/".$thang."/".$nam;	

			
			$sqlx = "select id,id_list,maso,hoten,dienthoai,ngaytao from #_product where captren1='".$_SESSION['login']['maso']."'";		
			$d->query($sqlx);
			$danhsachcon = $d->result_array();			
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url="cap-duoi.html";
			$maxR=20;
			$maxP=10;
			$paging=paging_home($danhsachcon, $url, $curPage, $maxR, $maxP);
			$danhsachcon=$paging['source'];
		
?>