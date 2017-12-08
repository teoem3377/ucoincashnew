
<?php

	@session_start();
	$session=session_id();
	$_SESSION['mazo']=$_SESSION['login']['maso'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.min.css" />
</head>
<body>
    <div style="font-size:18px; color:#F00; font-weight:bold; margin:10px; cursor:pointer"><a onClick="window.history.back();">TRỞ VỀ TRƯỚC</a></div></br>
    
	
	<h3>CÂY HỆ THỐNG</h3>
	<div id="json" class="demo"></div>	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="jstree.min.js"></script>	
	<script>
	// html demo
	 $.getJSON("json.php",function (result) {
	
    var availableTags = result;
	$('#json').jstree({
		'core' : {
			 'data' : result
		}
	});
	});  
	// inline data demo
	// ajax demo
	$('#ajax').jstree({
		'core' : {
			'data' : {
				"url" : "./root.json",
				"dataType" : "json" // needed only if you do not supply JSON headers
			}
		}
	});
		
	</script>
   
</body>
</html>