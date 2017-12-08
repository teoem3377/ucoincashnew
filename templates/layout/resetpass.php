<?php

 unset($_SESSION['login']['id']);			
 unset($_SESSION['login']['user']);
 $token = trim(strip_tags(addslashes($_GET['token'])));
 
 $_SESSION['login']['reset'] = $token;
 
    $sqluserx= "select * from table_forgetpass where token='".$_SESSION['login']['reset']."'";
	$d->query($sqluserx);		
	$kquserx = $d->fetch_array();
	
	$thoigian=time()-$kquserx['ngaytao'];
	
	if($kquserx['reset']==1 || $thoigian > 600)
	transfer("Token expired ", "account/forgot-password.html");	
	
			

?>

<div class="text-center" id="div-binding-container">
        <h4 class="h4-title">
            <span>Reset</span> <span class="span-title-color">Password</span>
        </h4>
        <div class="div-signin-container" data-bind="with: Access">
            <div class="content">
                <div class="div-msg-warn-item">
                    <!-- ko if: err()==1 --><!-- /ko -->
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                       <img class="sign-ico" src="images/pass-ico.png">
                    </span>
                    <input type="password" name="Password" data-bind="event: { 'change': $root.ValidatePassword }" placeholder="New Password" class="form-control">

                </div>
                <div class="div-msg-warn-item">

                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/pass-ico.png">
                    </span>
                   <input type="password" name="ConfirmPassword" data-bind="event: { 'change': $root.ValidateConfirmPass }" placeholder="Confirm New Password" class="form-control">
                
                </div>
                <!-- ko if: setAuthy()==1 --><!-- /ko -->
                <div class="div-msg-warn-item">
                    <span class="control-label" data-bind="text:msgErrCaptcha()"></span>
                </div>
                <div class="captcha-verify">
                <div class="g-recaptcha" data-sitekey="6LcdXTsUAAAAAAre8dPxaP8KjcwFRItiEfSN4i82"></div>
                <!-- <div style="width: 304px; height: 78px;"><div><iframe src="images/anchor.html" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
                </div> -->
            </div>
            <div class="div-msg-warn-item">

            </div>
            <div class="footer text-center">
                <button class="btn btn-success" data-bind="click: $root.Reset" id="btn-signin">Reset Password
                 <img src="images/arrow-right.png"> 
                </button>
                
                
            </div>
        </div>
    </div>
  </div>