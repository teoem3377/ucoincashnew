<?php if(!defined('_source')) die("Error");  
   
   @define ( '_lib' , './aworld/lib/');
   
   include_once _lib."constant.php";
   include_once _lib."functions.php";
   include_once _lib."class.database.php";
  

	$captcha = $_POST['g-recaptcha-response'];
	//$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcdXTsUAAAAAHn2gHP6TVUFTKn0goAlY34zrT_8&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$kiemtra=json_decode($response,TRUE);
	
	if($kiemtra['success']==''){

			if($_POST['Email']=="")
						transfer("Please input Email", "account/sign-up.html");
						
			if($_POST['Username']=="")
						transfer("Please input User name", "account/sign-up.html");	
															
			if($_POST['Password']=="")
						transfer("Please input Password", "account/sign-up.html");		
					
			if($_POST['ConfirmPassword']=="")
						transfer("Please input ConfirmPassword ", "account/sign-up.html");
			
			if($_POST['Password'] != $_POST['ConfirmPassword'])
						transfer("Confirm password mismatch ", "account/sign-up.html");
					
			
			$gioithieu = $_POST['ReferCode'];		
			$user = $_POST['Username'];
			$matkhau = $_POST['Password'];	
			$email = $_POST['Email'];	
			$dienthoai = $_POST['PhoneNumber']; 
				
			$gioithieu =  trim(strip_tags($gioithieu));
			$user = trim(strip_tags($user));
			$matkhau =  trim(strip_tags($matkhau));		
			$email = trim(strip_tags($email));		
			$dienthoai = trim(strip_tags($dienthoai)); 
				
			
			if (get_magic_quotes_gpc()==false) {			
				
				$gioithieu =  mysql_real_escape_string($gioithieu);
				$user =  mysql_real_escape_string($user);
				$matkhau =  mysql_real_escape_string($matkhau);	
				$email =  mysql_real_escape_string($email);		
				$dienthoai = mysql_real_escape_string($dienthoai); 
					  
			}
		
			
			$sqluser3= "select email from table_product where email='".$email."'";
			$d->query($sqluser3);		
			$kquser3 = $d->fetch_array();		
			if($kquser3['email']!="")
					transfer("This email already exists. Please enter again!", "account/sign-up.html");
			
			
			$sqluser2= "select user from table_product where user='".$user."'";
			$d->query($sqluser2);		
			$kquser2 = $d->fetch_array();		
			if($kquser2['user']!="")
					transfer("This user already exists. Please enter again!", "account/sign-up.html");
						
			
			if($gioithieu!=""){	
				$sqluser1= "select user from table_product where user='".$gioithieu."'";
				$d->query($sqluser1);		
				$kquser1 = $d->fetch_array();					
				if($kquser1['user']=="")
					transfer("Sponsor is not correct. Please enter again!", "account/sign-up.html");
			}
			
			$walletbbc=ChuoiNgauNhien(35);
			$token=ChuoiNgauNhien1(60);
			
			$datas['token'] = $token;
			$datas['gioithieu'] = $gioithieu;			
			$datas['user'] =$user;
			$datas['matkhau'] = taomatkhau($matkhau);
			$datas['email'] = $email;
			$datas['dienthoai'] = $dienthoai; 
			$datas['quocgia'] = $quocgia;
			$datas['walletbbc'] = $walletbbc;
			$datas['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
			
			$d->setTable('product');
			$d->insert($datas);
			
			
			include_once _lib."C_email.php";
			
			$subject = "Please verify your email address ";
			
			
			$body = '<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>        
						<td style="font-family:arial,sans-serif;margin:0px">
							 <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" style="border:35px solid #f7f7f7;border-top:none;border-bottom:none;max-width:600px;width:100%">
								<tbody>
								
									<tr style="height:30px;background:#f7f7f7">
										<td style="margin:0px;padding:15px 0px"></td>
									</tr>
									
									<tr>
										<td>
											<div style="text-align:center">
												 <img alt="" class="m_-6358922000748629568CToWUd CToWUd" src="https://image.ibb.co/m8TR7w/logo.png" style="padding:15px 0px;width:150px">
											</div>
											
											<div style="text-align:left;padding:0px 20px 20px">
												<h1 class="m_-6358922000748629568header" style="font-size:1.2em">
													<span style="color:#202020">Hi </span><b style="color:#3498db">'.$user.',</b>
												</h1>
												<h2>Please verify your email address</h2>
												<p>
													Click the link below to complete verification:
												</p><br>
												<p style="text-align:center"><a href="http://localhost/ucoincash/verifyemail/'.$token.'.html" style="background-color:#ffba00;color:#ffffff;padding:8px 15px;border-radius:3px;text-decoration:none" target="_blank">
													VERIFY MY EMAIL ADDRESS
												</a></p><br>
												<p>Regards,</p>
												
											<div>
											The BitBankCoin Team
											</div><div style="margin-top:5px"><a href="https://bitbankcoin.co" style="color:#0d53d5;font-weight:500;text-decoration:none" target="_blank">BitBankCoin.co</a></div></div>
										</td>
									</tr>
									
									<tr style="height:30px;background:#f7f7f7">
										<td style="margin:0px;padding:15px 0px"></td>
									</tr>
								
								</tbody>
							</table>
						</td>
					
					</tr>
				</tbody>
			</table>';
			
			
			
			include_once "phpmailer/class.phpmailer.php";
            
			$mail = new PHPMailer();
			
			$mail->IsSMTP(); // Gọi đến class xử lý SMTP
			$mail->SMTPAuth   = true;
			$mail->Port       = 25;                   // Sử dụng đăng nhập vào account
			$mail->Host       = "wbankcoin.com";     // Thiết lập thông tin của SMPT
			$mail->Username   = 'contact@wbankcoin.com'; // SMTP account username
			$mail->Password   = '123qwe';            // SMTP account password
			$mail->SetFrom('contact@wbankcoin.com','BitBankCoin');
		    $mail->SMTPDebug = 1;

	
			//Thiết lập thông tin người nhận
			$mail->AddAddress($email,'BitBankCoin');
			
			//Thiết lập email nhận email hồi đáp
			//nếu người nhận nhấn nút Reply
			$mail->AddReplyTo($email,'BitBankCoin');
	
			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
			 *=====================================*/
			
			//Thiết lập tiêu đề
			$mail->Subject    = "Please verify your email address ";
			
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";
			
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
			
			//Thiết lập nội dung chính của email
			$mail->MsgHTML($body);
			
			if(!$mail->Send()) 
				transfer( "An error occurred, please try again!","account/sign-up.html");
			else 
				transfer("Create user successfully. Please verify email!", "account/sign-in.html");	
				
			
			
			
			
		
			
		
	}else{
		transfer("Enter captcha", "account/sign-up.html");		
	}
?>
