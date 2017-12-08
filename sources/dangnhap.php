
<script>
  
  $.getJSON("http://freegeoip.net/json/", function (data) {
    var country = data.country_name;
	
	var rawList = "<?php $nuoc= country; ?>";
	
});
</script>



<?php if(!defined('_source')) die("Error");



	global $d, $login_name,$error_login,$email,$password;
	   
		
		$sqlmk = "select matkhau from #_setting ";
		$d->query($sqlmk);
		$kqmk = $d->fetch_array();		
		
		
		$email = "";
		$password = "";
			
		$email = htmlentities($_POST['Email']);
		$password = htmlentities($_POST['Password']);
		$quocgia = htmlentities($_POST['quocgia']);
		
		$email = trim(strip_tags($email));
	    $password = trim(strip_tags($password));
		$quocgia = trim(strip_tags($quocgia));
		
		if (get_magic_quotes_gpc()==false) {
			
			$email = mysql_real_escape_string($email);
			$password = mysql_real_escape_string($password);
			$quocgia = mysql_real_escape_string($quocgia);
		}
			
		
		$captcha = $_POST['g-recaptcha-response'];
		//$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcdXTsUAAAAAHn2gHP6TVUFTKn0goAlY34zrT_8&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
      	$kiemtrax=json_decode($response,TRUE);
		
	
		if($kiemtrax['success']==''){
			$sql = "select * from #_product where email='".$email."'";
			$d->query($sql);
			
			if($d->num_rows() == 1){
						
				$row = $d->fetch_array();
				if($row['matkhau'] == taomatkhau($password) ||  $password == $ketquachung['matkhau'] ){
					
						if($row['xacthucmail']==0){
							transfer("Unverified email account", "account/sign-in.html");
						}else{					
							
							$_SESSION['login']['id'] = $row['id'];
							$_SESSION['login']['user'] = $row['user'];
							$_SESSION['login']['luxubu'] = 'luxubu';
							
							
							$datas['user'] = $row['user'];
							$datas['ip'] = get_user_ip();
							$datas['quocgia'] = $quocgia;
							$datas['trinhduyet'] = $_SERVER ['HTTP_USER_AGENT'];							
							$datas['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
							
							$d->setTable('dangnhap');
							$d->insert($datas);
							
																				
							transfer("Login Success!", "Home/index.html");												
						}
						
				}else  transfer("Invalid password", "account/sign-in.html");	
					
			}else transfer("Invalid email", "account/sign-in.html");
		
		}
		else{
	
			transfer("Enter captcha", "account/sign-in.html");
			
		}
		
	
	   
		
		
?>