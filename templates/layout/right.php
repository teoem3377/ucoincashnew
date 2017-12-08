<?php

    
	$d->reset();
	$sql = "select * from #_product_list where hienthi=1 order by stt asc";
	$d->query($sql);
	$danhmuc = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_danhmucnews where hienthi=1 order by stt,id asc";
	$d->query($sql);
	$phong = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_setting ";
	$d->query($sql);
	$company = $d->fetch_array();	
	
	$d->reset();
	$sql = "select * from #_doitac where hienthi=1 order by stt,id asc limit 0,8";
	$d->query($sql);
	$quangcao1 = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_lkweb where hienthi=1 order by stt,id asc";
	$d->query($sql);
	$doitac = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_hotrokhachhang where hienthi=1 order by stt,id asc";
	$d->query($sql);
	$doitac1 = $d->result_array();	
	
	
	
?>







<script language="javascript">
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email

function checkemail(){
	var frm 	= document.nhanemail;			
			
			if(frm.emailkhachhang.value=='') 
			{ 
				alert( "<?=_vuilongnhapemail?>" );
				frm.emailkhachhang.value="";				
				frm.emailkhachhang.focus();
				return false;
			}
			
			if(!validEmail(frm.emailkhachhang)){
				alert('<?=_emailkhonghople?>');
				frm.emailkhachhang.value="";
				frm.emailkhachhang.focus();
				return false;
			}	
	
	frm.submit();
	
}

function check_search(){
	var frm1	= document.srch;			
			
			if(frm1.txt_search.value == 'Nhập từ khóa...' || frm1.txt_search.value == 'Enter keyword...' || frm1.txt_search.value == '') 
			{ 
				alert( "<?=_vuilongnhaptukhoa?>" );								
				frm1.txt_search.focus();
				return false;
			}			
	
	frm1.submit();
	
}


</script>


<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				// Slide
				$('#menu1 > li > a.expanded + ul').slideToggle('medium');
				$('#menu1 > li > a').mouseover(function() {
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
				});
		
				// Accordion
				$('#menu5 > li > a.expanded + ul').slideToggle('medium');
				$('#menu5 > li > a').mouseover(function() {
					$('#menu5 > li > a.expanded').not(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
					$(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
				});
			}, 250);
		});
</script>





<!-- JQ Accordion -->
<script type='text/javascript' src='js/jquery.cookie.js'></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcjqaccordion.2.7.min.js'></script>
<script>
jQuery(document).ready(function($){
    jQuery('#accordion-1').dcAccordion({
    	eventType: 'hover',
    	autoClose: true,
    	saveState: true,
    	disableLink: false,
    	speed: 'slow',
    	showCount: false,
    	autoExpand: true,
    	cookie	: 'dcjq-accordion-1',
    	classExpand	 : 'dcjq-current-parent'
    });						
});
</script>


<div class="danhmucsp">
        <div class="title"><?=_timkiem?></div>
        <div class="content" >
        
         <form method="post" name="srch" id="srch" action="tim-kiem.html">
                  <div  style=" float:left; width:185px; margin:14px 0 8px 0">
                      <input type="text" name="txt_search" id="txt_search" onclick="this.value=''" value="<?=_nhaptukhoa?>..."  style="width:165px; color:#000; margin-left:5px; padding-left:10px; height:26px; border:1px solid #ccc; border-radius:3px;"/>
                  </div>
                  <div  style=" float:left; width:190px; text-align:center; margin:5px 0 10px 0">
                      <input type="button"  name="ktra" id="ktra" onclick="check_search()" value="" style=" width:60px; height:26px; background: url(./images2/enter.png) no-repeat; border:none" />
                  </div>
         </form>
        
 </div> 
</div>


<div class="danhmucsp" >
        <div class="title"><?=_hotrotructuyen?></div>
        <div class="content" style="padding-bottom:10px;">  
        
        
			<?php 
			   
			   for($h=0;$h<count($phong);$h++) {
                $d->reset();
                $sql = "select * from #_yahoo where hienthi=1 and phong=".$phong[$h]['id']." order by stt,id asc";
                $d->query($sql);
                $yahoo = $d->result_array(); 
		    ?>
			
            <div style="float:left; width:175px; margin:10px 0 0 5px; font-size:13px; font-weight:bold; color:#00f;" ><?=$phong[$h]['ten_'.$lang]?></div>	
			<?php     for($i=0;$i<count($yahoo);$i++) {?>
		    
        	<div style="float:left; width:180px; margin-top:10px; font-size:13px" >
                 <div style="float:left;padding-left:5px; margin:0 10px 0 5px; color:#a30000; font-weight:bold;"><?= $yahoo[$i]['ten_'.$lang]?></div>
                 <div style="float:right">
                     <div style="float:left;">				 
                         <a href="skype:<?=$yahoo[$i]['skype']?>?chat"><img  alt="image" src="./images1/skype.png"  style="border: none; margin-bottom:-5px;"  width="47" height="22"  /></a>  
                     </div>
                     <div style="float:left; margin-left:10px;"> <a  href="ymsgr:sendim?<?=$yahoo[$i]['yahoo']?>"><img src="./images1/yahoo.png" border=0 style="margin-bottom:-5px;" width="32" height="23" alt="image" /></a></div>
                 </div>
             </div>
             
             
             <div style="float:left; width:180px; color:#000; margin-top:10px;font-size:13px;" >
                 <div style="float:left; padding-left:5px; margin:0 10px 0 5px; font-weight:bold;"><?=_dienthoai?>: </div>
                 <div style="float:right">
                       <div style="float:left;color:#a30000;"><?=$yahoo[$i]['dienthoai']?></a></div>
                 </div>
             </div>
            
            <div  style="width:180px;height:1px; border-bottom:1px #CCCCCC dotted; float:left; padding-bottom:5px; margin-left:3px; margin-bottom:5px;"></div>
            
        <?php }} ?> 
           <div style="float:left; width:155px; margin-top:3px; margin-left:3px; height:25px; background:url(./images2/email.png) no-repeat center left; line-height:25px; padding-left:25px; font-size:12px;">E: <?=$company['email']?></div> 
        </div>
 </div>





<div class="danhmucsp" style="padding-bottom:5px">
        <div class="title"><?=_giaiphapkythuat?></div>
        <div class="content">   
           <?php for($i=4;$i<count($quangcao1);$i++) { ?>                 
                                 
                   <div style="float:left; width:190px; margin-top:5px; margin-bottom:5px; text-align:center">
                        <a href="<?=$quangcao1[$i]['url']?>" target="_blank">
                             <img alt="<?=$quangcao1[$i]['ten_'.$lang]?>" src="<?=_upload_doitac_l.$quangcao1[$i]['photo']?>"  width="173" height="150" title="<?=$quangcao1[$i]['ten_'.$lang]?>" />
                        </a>
                  </div>
             <?php } ?> 
       </div>
 </div>






<div class="danhmucsp">
        <div class="title"><?=_dangkynhantin?></div>
        <div class="content" >
        
         <form method="post" name="nhanemail" id="nhanemail" action="">
                  <div  style=" float:left; width:185px; margin:14px 0 8px 0">
                      <input type="text" name="emailkhachhang" id="emailkhachhang" onclick="this.value=''" value="<?=_nhapdiachiemail?>..."  style="width:165px; color:#000; margin-left:5px; padding-left:10px; height:26px; border:1px solid #ccc; border-radius:3px;"/>
                  </div>
                  <div  style=" float:left; width:190px; text-align:center; margin:5px 0 10px 0">
                      <input type="button"  name="guimail5" id="guimail5" onclick="checkemail()" value="" style=" width:60px; height:26px; background: url(./images2/enter.png) no-repeat; border:none" />
                  </div>
         </form>
        
 </div> 
</div>



<div class="danhmucsp">
        <div class="title"><?=_logodoitac?></div>
        <div class="content">   
           <div id="cts_partner2" style=" float: left;width: 190px;text-align:center; position:relative; height:250px;overflow:hidden;">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl_partner2" style="position:relative; float:left;">
                  <?php for($i=0;$i<count($doitac);$i++) { ?>
                   <tr>  
                    <td valign="top" >
                       <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                               <tr>
                                  <td valign="center" style="padding: 2px 0px; ">
                                 
                                           <div style="float:left; width:190px; margin-top:5px; margin-bottom:5px; text-align:center">
                                                <a href="<?=$doitac[$i]['url']?>" target="_blank">
                                                     <img alt="<?=$doitac[$i]['ten_'.$lang]?>" src="<?=_upload_doitac_l.$doitac[$i]['photo']?>"  width="173" height="100" title="<?=$doitac[$i]['ten_'.$lang]?>" />
                                                </a>
                                          </div>
                                   </td>
                               </tr>
                        </table>
                    </td>               
                 </tr>
                 <?php } ?>                           
                 </table>
                 <script type="text/javascript">createScroller("myScroller_partner2", "cts_partner2", "ctstbl_partner2",0,40,1,0,1);</script> 
          </div>   
            
       </div>
 </div>







<div class="danhmucsp">
        <div class="title"><?=_khachhangtieubieu?></div>
        <div class="content">   
           <div id="cts_partner5" style=" float: left;width: 190px;text-align:center; position:relative; height:250px;overflow:hidden;">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstbl_partner5" style="position:relative; float:left;">
                  <?php for($i=0;$i<count($doitac1);$i++) { ?>
                   <tr>  
                    <td valign="top" >
                       <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                               <tr>
                                  <td valign="center" style="padding: 2px 0px; ">
                                 
                                           <div style="float:left; width:190px; margin-top:5px; margin-bottom:5px; text-align:center">
                                                <a href="<?=$doitac1[$i]['link']?>" target="_blank">
                                                     <img alt="<?=$doitac1[$i]['ten_'.$lang]?>" src="<?=_upload_news_l.$doitac1[$i]['photo']?>"  width="173" height="100" title="<?=$doitac1[$i]['ten_'.$lang]?>" />
                                                </a>
                                          </div>
                                   </td>
                               </tr>
                        </table>
                    </td>               
                 </tr>
                 <?php } ?>                           
                 </table>
                 <script type="text/javascript">createScroller("myScroller_partner5", "cts_partner5", "ctstbl_partner5",0,40,1,0,1);</script> 
          </div>   
            
       </div>
 </div>








<!--




 <div class="danhmucsp">
        <div class="title"><?=_lienketwebsite?></div>
        <div class="content" style="padding-top:5px;">
        
        	
             <select name="link" id="link" onchange="window.open(this.value, this.value)" style="width:200px; margin:0 0 10px 0">
                    <option value="index.html" >-- <?=_lienketwebsite?> --</option>
                    <?php for($i=0;$i<count($web);$i++) { ?>
                    <option value="<?=$web[$i]['url']?>" style="cursor: pointer;"><?=$web[$i]['ten_'.$lang]?></option>
                    <?php } ?>
              </select>          
           
        
 </div> 
</div>


<div class="danhmucsp" style="margin-bottom:13px">
        <div class="title"><?=_tienichwebsite?></div>
        <div class="content" style="font-family: Tahoma, Geneva, sans-serif; font-size:12px; font-weight:bold; ">
        	
            
            <div style="float:left; text-align:left; height:30px; margin:5px 0 0 18px; line-height:30px; padding:0 0 0 20px; width:175px; background: url(./images4/thoitiet.png) left no-repeat"><a style="color:#0000ef " href="http://www.dhl.com/" target="_blank"><?=_dichvuhaucan?></a></div>
            <div style="float:left; text-align:left; height:30px;  margin:5px 0 0 18px; line-height:30px; padding:0 0 0 20px; width:175px; background: url(./images4/ngoaite.png) left no-repeat"><a style="color:#0000ef " href="http://www.xe.com/" target="_blank"><?=_tygiangoaite?></a></div>
            <div style="float:left; text-align:left; height:30px;  margin:5px 0 0 18px; line-height:30px; padding:0 0 0 20px; width:175px; background: url(./images4/vang.png) left no-repeat"><a style="color:#0000ef " href="http://hcm.24h.com.vn/ttcb/giavang/giavang.php" target="_blank"><?=_thongtingiavang?></a></div>
            <div style="float:left; text-align:left; height:30x;  margin:5px 0 10px 18px; line-height:30px; padding:0 0 0 20px; width:175px; background: url(./images4/chungkhoang.png) left no-repeat"><a style="color:#0000ef " href="http://chungkhoan.24h.com.vn/" target="_blank"><?=_thongtinchungkhoang?></a></div>
            
            
            
</div>
</div>



<?php if($lang=="vi"){?>

<div class="danhmucsp" >
        <div class="title"><?=_thongketruycap?></div>
        <div class="content">   
       
            <div class="thongke"><?=_dangonline?><span style="margin: 0 5px 0 10px">:</span><?=$count_user_online?></div>
            <div class="thongke"><?=_homnay?><span style="margin: 0 5px 0 32px">:</span><?=$today_visitors?></div>
            <div class="thongke"><?=_tuannay?><span style="margin: 0 5px 0 30px">:</span><?=$week_visitors?></div>
            <div class="thongke"><?=_thangnay?><span style="margin: 0 5px 0 22px">:</span><?=$month_visitors?></div>
            <div class="thongke"><?=_tongtruycap?><span style="margin: 0 5px 0 2px">:</span><?=$all_visitors?></div>
            
 </div>
</div>

<?php } else { ?>
	<div class="danhmucsp" >
        <div class="title"><?=_thongketruycap?></div>
        <div class="content">   
       
            <div class="thongke"><?=_dangonline?><span style="margin: 0 5px 0 40px">:</span><?=$count_user_online?></div>
            <div class="thongke"><?=_homnay?><span style="margin: 0 5px 0 44px">:</span><?=$today_visitors?></div>
            <div class="thongke"><?=_tuannay?><span style="margin: 0 5px 0 9px">:</span><?=$week_visitors?></div>
            <div class="thongke"><?=_thangnay?><span style="margin: 0 5px 0 15px">:</span><?=$month_visitors?></div>
            <div class="thongke"><?=_tongtruycap?><span style="margin: 0 5px 0 52px">:</span><?=$all_visitors?></div>
            
 </div>
</div>
<?php }?>
-->
<style type="text/css">
	.thongke{
		float:left;
		width:200px;
		padding-left:20px;
		height:30px;
		line-height:30px;
		font-size:13px;
		font-weight:bold;
	}
</style>










