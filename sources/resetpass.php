<?php if(!defined('_source')) die("Error");  
   
   @define ( '_lib' , './aworld/lib/');
   
   include_once _lib."constant.php";
   include_once _lib."functions.php";
   include_once _lib."class.database.php";
  
   
   
    $tokens= $_SESSION['login']['reset'];
	
	$captcha = $_POST['g-recaptcha-response'];
	//$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcdXTsUAAAAAHn2gHP6TVUFTKn0goAlY34zrT_8&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$kiemtra=json_decode($response,TRUE);
	
	if($kiemtra['success']==''){
							
															
			if($_POST['Password']=="")
						transfer("Please input New Password", "account/resetpass/".$tokens.".html");		
					
			if($_POST['ConfirmPassword']=="")
						transfer("Please input New ConfirmPassword ", "account/resetpass/".$tokens.".html");
			
			if($_POST['Password'] != $_POST['ConfirmPassword'])
						transfer("Confirm password mismatch ", "account/resetpass/".$tokens.".html");
					
			
			
			$matkhau = $_POST['Password'];					
			$matkhau =  trim(strip_tags($matkhau));			
			if (get_magic_quotes_gpc()==false) {
				$matkhau =  mysql_real_escape_string($matkhau);
			}
		 	
			
			$sqluser= "select token,user,email from table_forgetpass where token='".$tokens."'";
			$d->query($sqluser);		
			$kquser = $d->fetch_array();
			
			if($kquser['token']=='')
			transfer("Incorrect token ", "account/sign-in.html");	
			
			
			$data['reset'] =1;
			$d->reset();
			$d->setTable('forgetpass');					
			$d->setWhere('token',$tokens);
			$d->update($data);
			
			
			$data1['matkhau'] =taomatkhau($matkhau);			
			$d->reset();
			$d->setTable('product');					
			$d->setWhere('user',$kquser['user']);
			$d->update($data1);
		
    	
			
			include_once _lib."C_email.php";
			
			$subject = "Password update successful ";
			
			
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
													<span style="color:#202020">Hi </span><b style="color:#3498db">'.$kquser['user'].',</b>
												</h1><br>
												<p style="color:#f00">
												 Your password has been updated at '.date('m/d/Y H:i:s',time()).'
											    </p><br>
												
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
			$mail->AddAddress($kquser['email'],'BitBankCoin');
			
			//Thiết lập email nhận email hồi đáp
			//nếu người nhận nhấn nút Reply
			$mail->AddReplyTo($kquser['email'],'BitBankCoin');
	
			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
			 *=====================================*/
			
			//Thiết lập tiêu đề
			$mail->Subject    = "Password update successful ";
			
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";
			
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
			
			//Thiết lập nội dung chính của email
			$mail->MsgHTML($body);
			
			if(!$mail->Send()) 
				transfer( "An error occurred, please try again!","account/resetpass/".$tokens.".html");
			else {
				
				unset( $_SESSION['login']['reset']); 
				transfer("Password update successful!", "account/sign-in.html");	
				
			}
			
			
			
		
			
		
	}else{
		transfer("Enter captcha", "account/resetpass/".$token.".html");		
	}
?>
