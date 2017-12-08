<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi,noidung_en,noidung_ci",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"450px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<h3>Hỗ trợ khách hàng</h3>
<form name="frm" method="post" action="index.php?com=dichvu&act=save" enctype="multipart/form-data" class="nhaplieu">
 
  <?php if ($_REQUEST['act']==edit){?>
	<b>Hình hiện tại:</b><img src="<?=_upload_news.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.png|.gif|.JPG|.jpeg|.JPEG|.PNG|.Jpg _Width: 200px _Height 150px </strong><br /><br />
 
	<b>Tên</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" style="width:400px;"/><br /><br />
	
   <!-- <b>Tên (English)</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" style="width:400px;"/><br /><br />
   <b>Tên (China)</b> <input type="text" name="ten_ci" value="<?=$item['ten_ci']?>" /><br /><br />-->
   
    <b>Mô tả</b>
    <div><textarea name="mota_vi" id="mota_vi" cols="50" rows="5"><?=$item['mota_vi']?></textarea></div>
   <!-- <b>Mô tả (English)</b>
    <div><textarea name="mota_en" id="mota_en" cols="50" rows="5"><?=$item['mota_en']?></textarea></div>
    
    <b>Mô tả (China)</b>
    <div><textarea name="mota_ci" id="mota_ci" cols="50" rows="5"><?=$item['mota_ci']?></textarea></div>
  -->
    <b>Nội dung</b>
	<div><textarea name="noidung_vi" id="noidung_vi"  style="text-align: !important"><?=$item['noidung_vi']?></textarea></div>
    <!--  <b>Nội dung (English)</b>
	<div><textarea name="noidung_en" id="noidung_en"><?=$item['noidung_en']?></textarea></div>
  <b>Nội dung (China)</b>
	<div><textarea name="noidung_ci" id="noidung_ci"><?=$item['noidung_ci']?></textarea></div>
    -->
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px" /><br />
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br /><br />
	<input type="hidden" name="id" id="id" value="<?=$item['id']?>" />
    <input type="hidden" name="curPage" id="curPage" value="<?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man<?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>'" class="btn" />
</form>