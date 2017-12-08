<?php  if(!defined('_source')) die("Error");

    @$id = addslashes($_GET['id']);
    if($id != '')
    {
        $sql_lanxem = "UPDATE #_thongtincongty SET luotxem=luotxem+1  WHERE id ='".$id."'";
        $d->query($sql_lanxem);
        
        $d->reset();
		$sql_detail = "select * from #_thongtincongty where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
        $title_bar= $row_detail['ten'];
        
        $d->reset();
		$sql = "select * from #_thongtincongty where hienthi=1 and id<>'".$row_detail['id']."' order by id desc";
		$d->query($sql);
		$tintuc_khac = $d->result_array();
		
    }else{
        $title_bar="Thông báo";		
	    $title_tcat="Thông báo";
        $d->reset();
		$sql_tintuc = "select * from #_thongtincongty where hienthi=1 order by id desc";
		$d->query($sql_tintuc);
		$result_tintuc = $d->result_array();
        
        $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    	$url=getCurrentPageURL();
    	$maxR=8;
    	$maxP=10;
    	$paging=paging_home($result_tintuc, $url, $curPage, $maxR, $maxP);
    	$result_tintuc=$paging['source'];
    }
?>