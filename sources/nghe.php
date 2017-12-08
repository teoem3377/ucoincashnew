<?php  if(!defined('_source')) die("Error");
            $title_bar=_thachcao;		
			$title_tcat=__thachcao;	
		@$idl =  addslashes($_GET['idl']);
		@$idc =  addslashes($_GET['idc']);
		@$idi =  addslashes($_GET['idi']);
        @$idi1 =  addslashes($_GET['idi1']);
        @$idi2 =  addslashes($_GET['idi2']);
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
		
		
		
		
        
		$sql_sanphamkhac = "select * from #_nghe where hienthi=1 and id <>'".$id."' and id_list=".$row_detail['id_list']."  order by stt asc ";
		$d->query($sql_sanphamkhac);
		$other_nghe = $d->result_array();
		
		
		
		 $d->reset();
		 $sql = "select * from #_hasp1 where hienthi=1 and id_photo=".$id;
		 $d->query($sql);
		 $hinhsp9 = $d->result_array();
		
		
		}elseif($idl!='')
		{
			
		$sql="select * from #_nghe_list where id='$idl' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang];
		$title_tcat=$loaitin[0]['ten_'.$lang];
		$name=$loaitin[0]['ten_'.$lang];
		$ma=$loaitin[0]['id'];
		
		$sql = "select * from #_nghe where hienthi=1 and id_list='".$loaitin[0]['id']."' order by stt asc";
		$d->query($sql);
		$nghe9 = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=72;
			$maxP=10;
			$paging=paging_home($nghe9, $url, $curPage, $maxR, $maxP);
			$nghe9=$paging['source'];
		}elseif($idc!='')
		{
		$sql="select * from #_nghe_cat where id='$idc' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang];
		$title_tcat=$loaitin[0]['ten_'.$lang];
		$name=$loaitin[0]['ten_'.$lang];
		$idc=$loaitin[0]['id'];
		$sql = "select * from #_nghe where hienthi=1 and id_cat='".$loaitin[0]['id']."' order by id desc";
		$d->query($sql);
		$nghe9 = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=72;
			$maxP=5;
			$paging=paging_home($nghe9, $url, $curPage, $maxR, $maxP);
			$nghe9=$paging['source'];
		}elseif($idi!='')
		{
		$sql="select * from #_nghe_item where id='$idi' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang];
		$title_tcat=$loaitin[0]['ten_'.$lang];
		
		$idc=$loaitin[0]['id'];
		$sql = "select *  from #_nghe where hienthi=1 and id_item='".$loaitin[0]['id']."' order by id desc";
		$d->query($sql);
		$nghe = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=72;
			$maxP=10;
			$paging=paging_home($nghe, $url, $curPage, $maxR, $maxP);
			$nghe=$paging['source'];
		}elseif($idi1!='')
		{
		$sql="select * from #_nghe_item1 where id='$idi1' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang];
		$title_tcat=$loaitin[0]['ten_'.$lang];
		
		$idc=$loaitin[0]['id'];
		$sql = "select * from #_nghe where hienthi=1 and id_item1='".$loaitin[0]['id']."' order by id desc";
		$d->query($sql);
		$nghe = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=15;
			$maxP=10;
			$paging=paging_home($nghe, $url, $curPage, $maxR, $maxP);
			$nghe=$paging['source'];
		}elseif($idi2!='')
		{
		$sql="select * from #_nghe_item2 where id='$idi2' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang];
		$title_tcat=$loaitin[0]['ten_'.$lang];
		
		$idc=$loaitin[0]['id'];
		$sql = "select * from #_nghe where hienthi=1 and id_item2='".$loaitin[0]['id']."' order by id desc";
		$d->query($sql);
		$nghe = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=15;
			$maxP=10;
			$paging=paging_home($nghe, $url, $curPage, $maxR, $maxP);
			$nghe=$paging['source'];
		}
		
		else{
			$name=_thachcao;		
			$idc=0;
			$sql = "select * from #_nghe where hienthi=1 order by stt asc";	
			$d->query($sql);
			$nghe9 = $d->result_array();
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=72;
			$maxP=10;
			$paging=paging_home($nghe9, $url, $curPage, $maxR, $maxP);
			$nghe9=$paging['source'];
			
		}
			
?>