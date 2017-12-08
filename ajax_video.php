<?php
    session_start();
    
	@define ( '_lib' , './admin/lib/');	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	@$id = $_GET['id'];
	settype($id,'int');
    $d->reset();
	$sql="select * from #_video where id=".$id." and hienthi=1 order by stt asc";
	$d->query($sql);
	$video = $d->result_array();

?>


 <?php $chuoix=explode('=',$video[0]['url']);?>
       		  <object width="188" height="190"><param name="movie" value="//www.youtube-nocookie.com/v/<?=$chuoix[1]?>&version=3&amp;hl=vi_VN"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube-nocookie.com/v/<?=$chuoix[1]?>&autoplay=1?version=3&amp;hl=vi_VN" type="application/x-shockwave-flash" width="188" height="190" allowscriptaccess="always" allowfullscreen="true"></embed></object>