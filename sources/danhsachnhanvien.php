<?php  if(!defined('_source')) die("Error");
        $title_bar='Danh sách nhân viên';		
	    $title_tcat='Danh sách nhân viên';
		
		
			$sql = "select * from #_product where captren1='".$_SESSION['login']['maso']."' order by id_list asc, ngaytao desc";		
			$d->query($sql);
			$product = $d->result_array();
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url="danh-sach-nhan-vien.html";
			$maxR=20;
			$maxP=10;
			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
		
?>