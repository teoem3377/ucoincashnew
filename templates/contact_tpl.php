<?php
    
    $d->reset();
    $sql = "select * from #_lienhe ";
    $d->query($sql);
    $lienhe = $d->fetch_array();
	
	$d->reset();
    $sql = "select * from #_setting ";
    $d->query($sql);
    $company = $d->fetch_array();
?>

<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "<?=_xinnhaphoten?>.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('ten'), "<?=_xinnhaphoten?>.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('diachi'), "Xin nhập địa chỉ")){
		document.getElementById('diachi').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "<?=_xinnhapsodienthoai?>.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "<?=_sodienthoaikhonghople?>.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("<?=_emailkhonghople?>");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('tieude'), "<?=_xinnhapchude?>.")){
		document.getElementById('tieude').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "<?=_xinnhapnoidung?>.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>


<div class="khungbao" style="margin-bottom:10px;" >
    <div class="tieude" ><?=_lienhe?> </div>
    
    <div class="noidungs">      
        <div style="float:left; width:47%;">
        	<?=$lienhe['noidung_'.$lang]?>
        </div>        
        <div style="float:left; width:47%; border-left:1px solid #00f; padding-left:2%">        
        	
        	 <form method="post" name="frm" action="" enctype="multipart/form-data">
               <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe" align="center">
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000; width:100px;"><?=_hovaten?><span>*</span></td>
        			    <td><input name="ten" type="text" class="input" id="ten" size="70" style="width:75%; background:#FFC" /></td>
                    </tr>                        
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000;width:100px;"><?=_diachi?><span>*</span></td>
        				<td><input name="diachi" type="text" id="diachi"  class="input" size="70" style="width:75%; background:#FFC" /></td>
                    </tr>
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000;width:100px;"><?=_sodienthoai?><span>*</span></td>
        				<td><input name="dienthoai" type="text" class="input" id="dienthoai" size="70" style="width:75%; background:#FFC" /></td>
                    </tr>
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000;width:100px;"><?=_email?><span>*</span></td>
        				<td><input name="email" id="email" type="text" class="input" size="70" style="width:75%; background:#FFC"   /></td>
                    </tr>                                                  
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000;width:100px;"><?=_chude?><span>*</span></td>
        				<td><input name="tieude" type="text" class="input" id="tieude" size="70" style="width:75%; background:#FFC"  /></td>
                    </tr>                         
                    <tr>
                        <td style="font-size:13px; font-weight:bold; color:#000;width:100px;"><?=_noidung?><span>*</span></td>
        				<td><textarea name="noidung" cols="68" rows="5" class="input" id="noidung" style="background-color:#FFC;width:75%; color:#666666;"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td> 
                            <input class="button" type="button" value="<?=_gui?>" onclick="js_submit();" />
                            <input class="button" type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />
                        </td>
        			</tr>
                </table>   
            </form>
       
        </div>        
       
    	<div style="width:97%; float:left; margin-top:20px; padding:0 0 20px 0; text-align:justify;">
        	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=vi"></script>
            <script type="text/javascript">
            var map;
            var infowindow;
            var marker= new Array();
            var old_id= 0;
            var infoWindowArray= new Array();
            var infowindow_array= new Array();function initialize(){
               var defaultLatLng = new google.maps.LatLng(<?=$company['toado']?>);
               var myOptions= {
            	   zoom: 13,
            	   center: defaultLatLng,
            	   scrollwheel : false,
            	   mapTypeId: google.maps.MapTypeId.ROADMAP
            	};
            	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);map.setCenter(defaultLatLng);			    
               var arrLatLng = new google.maps.LatLng(<?=$company['toado']?>);
               infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$company['ten_'.$lang]?></div><div><span style="color: #7AE334;"><?=$company['diachi_'.$lang]?></span></div></div>';
               loadMarker(arrLatLng, infoWindowArray[7895], 7895);
               
               moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
               var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}</script>
           <div id="map_canvas"><script>initialize();</script></div>
        </div>       
      
 </div>

</div>

