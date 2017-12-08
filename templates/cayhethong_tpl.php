


<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="./tree/style.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">



    <div class="khungbao" style="padding-top:22px">
    
     <?php  if($_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){?>
      <div style="float:left;"><a  class="uplevel" href="create.html">CREATE ID</a></div>
      <div  style="float:left"><a  class="uplevel1" href="list.html">LIST CREATED</a></div>
 <?php }?>
    
    
    
    <h2 style="margin-top:0px; padding-top:35px">SYSTEM</h2>
    	<div style="width:100%; overflow:scroll">
        	<div class="container" style="float:left; width:6500px">
            	<?=vecay($_SESSION['login']['maso'])?>
            </div>   
       </div>         
    </div>    
 
 
 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./tree/MultiNestedList.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 
 
 
 <style type="text/css">
 
 body {
	font-family: Arial, Helvetica, sans-serif;
	background:#F90;	
}

ul{
	margin:0px ;
}
 
 .h_menu4 li:before{
	 border:none !important;
 }
 .h_menu4 .nav{
	 margin-top:0px !important;
	
 }
  .h_menu4>.nav>li>a{
	 padding:8px 8px !important;
	 font-size:15px !important;
	 color:#fff;
 }
 
 .h_menu4>.nav>li>a:hover{
	 background:none !important;
	 color:#f00 !important;
	 font-weight: 100 !important;
 }
 .h_menu4>.nav>li>a:visited{	
	 color:#fff ;
 }
 
 
 .doitacx li:before{
	 border:none !important;
 }

.footer li:before{
	 border:none !important;
 }

.footer li:after{
	background:none !important;
	height:0px !important;
	
 } 
 .footer li a{
	 top:0em !important;
 }
 .dede{
	 background:#fff !important;
 }
 
 
 
 .uplevel{
	padding:10px 20px;
	background:#060;
	color:#fff;
	font-weight:bold;
}
.uplevel:hover{
	background:#C30;
	color:#fff;
	
}
.uplevel1{
	padding:10px 20px;
	background:#309;
	color:#fff;
	font-weight:bold;
}
.uplevel1:hover{
	background:#C30;
	color:#fff;
	
	
}
 
 </style>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 