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
						transfer("Please input Email", "account/forgot-password.html");
						
				
			$email = $_POST['Email'];	
			$email = trim(strip_tags($email));
			
			if (get_magic_quotes_gpc()==false) {
				$email =  mysql_real_escape_string($email);
			}
		
				
				$sqluser= "select email,user from table_product where email='".$email."'";
				$d->query($sqluser);		
				$kquser = $d->fetch_array();
								
				if($kquser['email']=="")
					transfer("Email is not correct. Please enter again!", "account/forgot-password.html");
					
				$sqluserx= "select * from table_forgetpass where email='".$email."' order by id desc";
				$d->query($sqluserx);		
				$kquserx = $d->result_array();
				
				$thoigianx=time()-$kquserx[0]['ngaytao'];				
				if($kquserx[0]['reset']==0 && $thoigianx < 600)
					transfer("You have requested to change your password previously. Please check email. ", "account/sign-in.html");	
				
			
			$token=ChuoiNgauNhien1(60);
			
			$datas['token'] = $token;
			$datas['user'] = $kquser['user'];
			$datas['email'] = $email;
			$datas['ngaytao'] = strtotime(date("Y-m-d H:i:s",time()));
			
			$d->setTable('forgetpass');
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
										 <img alt="" class="m_1601082334285091196CToWUd CToWUd" src="https://image.ibb.co/m8TR7w/logo.png" style="padding:15px 0px;width:150px">
										</div>
										
										<div style="text-align:left;padding:0px 20px 20px">
											<h1 class="m_1601082334285091196header" style="font-size:1.2em">
												<span style="color:#202020">Hi </span>
												<b style="color:#3498db">'.$kquser['user'].',</b>
											</h1>
											
											<p>
												A request to reset the password on your BitBankCoin account <b><a href="'.$email.'" target="_blank">'.$email.'</a></b> was just made.
											</p>
											
											<p>
												 To set a new password on this account, please click the following link:
											</p><br>
											
											<p style="text-align:center">
												<a href="http://localhost/ucoincash/account/resetpass/'.$token.'.html" style="background-color:#ffba00;color:#ffffff;padding:8px 15px;border-radius:3px;text-decoration:none" target="_blank" >
												  Reset Your Password
												</a>
											</p><br>
											
											<p>
												For security reasons, this link will expire in <b>10 minutes</b>.
											</p>
											
											<p>
												If you did not ask for your password to be reset and believe your email account may have been compromised, please contact BitBankCoin support immediately at  <a href="mailto:support@bitbankcoin.co" style="color:#0d53d5;font-weight:500;text-decoration:none" target="_blank">support@bitbankcoin.co</a>
											</p><br>
											
											<p>
												Regards,
											</p>
											
											<div>
												 The BitBankCoin Team
											</div>
											
											<div style="margin-top:5px">
												<a href="https://bitbankcoin.co" style="color:#0d53d5;font-weight:500;text-decoration:none" target="_blank" >BitBankCoin.co</a>
											</div>
											
										</div>
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
			$mail->Subject    = "Password Reset ";
			
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";
			
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
			
			//Thiết lập nội dung chính của email
			$mail->MsgHTML($body);
			
			if(!$mail->Send()) 
				transfer( "An error occurred, please try again!","account/forgot-password.html");
			else 
				transfer("Successful request. Please check email!", "account/note-forget.html");	
			
			
		
	}else{
		transfer("Enter captcha", "account/forgot-password.html");		
	}
?>
