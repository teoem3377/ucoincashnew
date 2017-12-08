<?php  if(!defined('_source')) die("Error");
        $title_bar=_dichvu;		
	    $title_tcat=_dichvu;
    @$id = addslashes($_GET['id']);
	$tam = addslashes($_GET['tam']);
	$muc = addslashes($_GET['muc']);
	
    if($id != '')
    {
		
		 $sql_lanxem = "UPDATE #_dichvu SET luotxem=luotxem+1  WHERE id ='".$id."'";
        $d->query($sql_lanxem);
        
        $d->reset();
		$sql_detail = "select * from #_dichvu where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
        $title_bar= $row_detail['ten_'.$lang];
        
        $d->reset();
		$sql = "select * from #_dichvu where hienthi=1 and id<>'".$row_detail['id']."' order by id desc limit 15";
		$d->query($sql);
		$tintuc_khac = $d->result_array();
    }	
	
	if($tam=="moi"){
       
        $d->reset();
		$sql_tintuc = "select * from #_dichvu where hot <> 0  order by id desc ";
		$d->query($sql_tintuc);
		$result_tintuc = $d->result_array();
       
		
        $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    	$url=getCurrentPageURL();
    	$maxR=70;
    	$maxP=10;
    	$paging=paging_home($result_tintuc, $url, $curPage, $maxR, $maxP);
    	$result_tintuc=$paging['source'];
		$tenmuc=_tintucmoi;
    }
	if($tam=="noibat"){
       
        $d->reset();
		$sql_tintuc = "select * from #_dichvu where hienthi=1 and noibat<>0 order by id desc ";
		$d->query($sql_tintuc);
		$result_tintuc = $d->result_array();
       
		
        $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    	$url=getCurrentPageURL();
    	$maxR=70;
    	$maxP=10;
    	$paging=paging_home($result_tintuc, $url, $curPage, $maxR, $maxP);
    	$result_tintuc=$paging['source'];
		$tenmuc=_tinnoibat;
    }
	else{
       
        $d->reset();
		$sql_tintuc = "select * from #_dichvu where hienthi=1  order by stt asc ";
		$d->query($sql_tintuc);
		$result_tintuc = $d->result_array();		
       
		
        $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    	$url="dich-vu.html";
    	$maxR=8;
    	$maxP=10;
    	$paging=paging_home($result_tintuc, $url, $curPage, $maxR, $maxP);
    	$result_tintuc=$paging['source'];
		$tenmuc=$abc['ten_'.$lang];
    }
	