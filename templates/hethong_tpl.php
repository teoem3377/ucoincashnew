

 <div class="khungbao" style="padding-top:22px">
    
     <?php  if(@$_SESSION['login']['id']!="" &&  $_SESSION['login']['luxubu']=='luxubu'){?>
      <div style="float:left;"><a  class="uplevel" href="create.html">CREATE ID</a></div>
      <div  style="float:left"><a  class="uplevel1" href="list.html">LIST CREATED</a></div>
 <?php }?>
    
   
    
       
    	<div style="width:100%">
        	<div class="tree">
            	<?=vecay(@$_SESSION['login']['maso'])?>
            </div>   
       </div>         
 </div>    
 
  
  


<style>

 /*Now the CSS*/



.hinh{
	float:left;
	width:100%;
	height:40px;
	background:url(./images/1.png) no-repeat center;
} 
.hinh1{
	float:left;
	width:100%;
	height:40px;
	background:url(./images/2.png) no-repeat center;
} 
.hinh2{
	float:left;
	width:100%;
	height:40px;
	background:url(./images/3.png) no-repeat center;
} 

.tree{width:10000px; padding:30px 0; float:left;}



.tree ul {

	padding-top: 20px; position: relative;

	transition: all 0.5s;

	-webkit-transition: all 0.5s;

	-moz-transition: all 0.5s;

}



.tree li {

	float: left; text-align: center;

	list-style-type: none;

	position: relative;

	padding: 20px 5px 0 0px;

	transition: all 0.5s;

	-webkit-transition: all 0.5s;

	-moz-transition: all 0.5s;

}



/*We will use ::before and ::after to draw the connectors*/



.tree li::before, .tree li::after{

	content: '';

	position: absolute; top: 0; right: 50%;

	border-top: 1px solid #f00;

	width: 50%; height: 20px;

}

.tree li::after{

	right: auto; left: 50%;

	border-left: 1px solid #f00;

}



/*We need to remove left-right connectors from elements without 

any siblings*/

.tree li:only-child::after, .tree li:only-child::before {

	display: none;

}



/*Remove space from the top of single children*/

.tree li:only-child{ padding-top: 0;}



/*Remove left connector from first child and 

right connector from last child*/

.tree li:first-child::before, .tree li:last-child::after{

	border: 0 none;

}

/*Adding back the vertical connector to the last nodes*/

.tree li:last-child::before{

	border-right: 1px solid #f00;

	border-radius: 0 5px 0 0;

	-webkit-border-radius: 0 5px 0 0;

	-moz-border-radius: 0 5px 0 0;

}

.tree li:first-child::after{

	border-radius: 5px 0 0 0;

	-webkit-border-radius: 5px 0 0 0;

	-moz-border-radius: 5px 0 0 0;

}



/*Time to add downward connectors from parents*/

.tree ul ul::before{

	content: '';

	position: absolute; top: 0; left: 50%;

	border-left: 1px solid #f00;

	width: 0; height: 20px;

}



.tree li a{
	width:150px;

	border: 1px solid #94a0b4;
	
	text-decoration: none;

	font-family: arial, verdana, tahoma;

	font-size: 11px;

	display: inline-block;

	background: #c8e4f8;
	
	border-radius: 5px;

	-webkit-border-radius: 5px;

	-moz-border-radius: 5px;

	transition: all 0.5s;

	-webkit-transition: all 0.5s;

	-moz-transition: all 0.5s;

	color:#058004;

}
.tree li a{
	border: 1px solid #94a0b4;
}
.tree li.v-m{
	background: none;
	border:none;
}

.tree li a.view-more:after{
	content: "";
	height: 23px;
	width:29px;
	position:absolute;
	top:-3px;
	left:62px;
	background: url('images/view-more.PNG');
}



/*Time for some hover effects*/

/*We will apply the hover effect the the lineage of the element also*/

.tree li a:hover, .tree li a:hover+ul li a {

border: 1px solid #00F;
cursor:pointer;

}
/*10/11/2017*/
.tree li a.view-more{
	border-radius: 5px;
	border: 1px solid transparent;
	position: relative;
	padding-top:22px;
	background:#fff;
	font-weight: bold;
	font-size: 14px;
}
.tree li a.view-more:hover,.tree li a:hover+ul li a.view-more {
	background:#fff;
	border:1px solid transparent;
}

/*Connector styles on hover*/

.tree li a:hover+ul li::after, 

.tree li a:hover+ul li::before, 

.tree li a:hover+ul::before, 

.tree li a:hover+ul ul::before{

border-color: #00F;

	

}
.tree li a.view-more:hover{
	border-color:#fff;
}


/*Thats all. I hope you enjoyed it.

Thanks :)*/

/***************************************************************/

/*************** Footer Bar Style ******************************/

/***************************************************************/

.footer-bar

{

    display: block;

    width: 100%;

    height: 45px;

    line-height: 45px;

    background: #111;

    border-top: 1px solid #E62600;

    position: fixed;

    bottom: 0;

    left: 0;

}

.footer-bar .article-wrapper{

    font-family: arial, sans-serif;

    font-size: 14px;

    color: #888;

    float: left;

    margin-left: 10%;

}

.footer-bar .article-link a, .footer-bar .article-link a:visited{

    text-decoration: none;

    color: #fff;

}

.site-link a, .site-link a:visited{

    color: #888;

    font-size: 14px;

    font-family: arial, sans-serif;

    float: right;

    margin-right: 10%;

    text-decoration: none;

}

.site-link a:hover{

    color: #E62600;

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

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 