<?php
session_start();
function create_image()
{
 $md5_hash =rand(0,99999);
 $security_code = $md5_hash;
 $_SESSION["ma_cap_chax"] = $security_code;
 $width = 100;
 $height = 30;
 $image = ImageCreate($width, $height);
 $white = ImageColorAllocate($image, 255, 255, 255);
 $black = ImageColorAllocate($image, 0, 0, 0);
 $blue = ImageColorAllocate($image, 17, 6, 244);
 ImageFill($image, 0, 0, $blue);
 ImageString($image, 6, 28, 6, $security_code, $white);
 header("Content-Type: image/jpeg");
 ImageJpeg($image);
 ImageDestroy($image);
}
create_image() ;
exit();
?>