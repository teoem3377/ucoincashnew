<?php  if(!defined('_source')) die("Error");
            $title_bar=_sanpham;		
			$title_tcat=_sanpham;
		@$idl =  addslashes($_GET['idl']);
		@$tam =  addslashes($_GET['tam']);
		@$id =  addslashes($_GET['id']);				
		
		
		if($id!=''){
			
		#các sản phẩm khác======================
		$sql_lanxem = "UPDATE #_nghe SET luotxem=luotxem+1  WHERE id ='".$id."'";
			$d->query($sql_lanxem);

		
		$sql_detail = "select * from #_nghe where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();	
									
		$title_bar=$row_detail['ten_'.$lang];
        $title_tcat=$row_detail['ten_'.$lang];
		$keyword=$row_detail['keyword'];
		$description=$row_detail['description'];
		$photo99=$row_detail['id_list'];
		
		
		}elseif($tam=='khuyenmai'){
			
			$sql = "select * from #_nghe where hienthi=1  and noibat >0 order by id asc";
			$d->query($sql);
			$product = $d->result_array();
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=15;
			$maxP=10;
			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
			$name='SẢN PHẨM KHUYẾN MÃI';
			
		}else{			
			
			$sql="select * from #_nghe_list where id='$idl'";
			$d->query($sql);
			$loaitin=$d->fetch_array();
			$title_bar=$loaitin['ten_'.$lang];
			$title_tcat=$loaitin['ten_'.$lang];
			$name=$loaitin['ten_'.$lang];
			
			
			$sql = "select * from #_nghe where hienthi=1 and id_list='".$loaitin['id']."' and noibat=0 order by id asc";
			$d->query($sql);
			$product = $d->result_array();
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=15;
			$maxP=10;
			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
		}
		
			
?>