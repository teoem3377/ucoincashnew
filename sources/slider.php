<?php 
    $d->reset();
	$sql_slider = "select id, photo, link,thumb from #_slider where hienthi=1";
	$d->query($sql_slider);
	$result_slider = $d->result_array();
?>