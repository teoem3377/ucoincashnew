
<?php

 unset($_SESSION['login']['id']);			
 unset($_SESSION['login']['user']);
 $user = addslashes($_GET['user']);
 

?>


<div class="page-header" id="div-register-container">
    <div class="text-center">
        <h4 class="h4-title">
            <span>Create an</span> <span class="span-title-color">account?</span>
        </h4>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                   
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/email-ico.png">
                    </span>
                    <input type="text" name="Email" placeholder="Email" data-bind="event: { 'change': $root.ValidateEmail }" value="" class="form-control">

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                   
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/user-ico.png">
                    </span>
                    <input type="text" placeholder="User name" data-bind="event: { 'change': $root.ValidateUser }" name="Username" value="" class="form-control">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                  
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/pass-ico.png">
                    </span>
                    <input type="password" name="Password" data-bind="event: { 'change': $root.ValidatePassword }" placeholder="Password" class="form-control">

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                   
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/pass-ico.png">
                    </span>
                    <input type="password" name="ConfirmPassword" data-bind="event: { 'change': $root.ValidateConfirmPass }" placeholder="Confirm password" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/sponsor-ico.png">
                    </span>
                    <input type="text" name="ReferCode" value="<?=$user?>" placeholder="If you don't have sponsor, then leave it blank" class="form-control">

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="content div-sign-content">
                <div class="div-msg-warn-item">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" onclick="openFlags()">
                        <img class="sign-ico" id="img-flag-identity" data-value="US" src="images/flag-of-Vietnam.png">
                    </span>
                    <input type="text" name="PhoneNumber" value="" placeholder="Phone number" class="form-control">

                </div>
            </div>
        </div>
    </div>
    <div class="div-msg-warn-item">
    </div>
    <div class="footer text-center">
        <div class="div-msg-warn-item">
            <div class="control-label text-center" data-bind="text:msgErrCaptcha()"></div>
        </div>
        <div class="captcha-verify recaptcha-signup">
              <div class="g-recaptcha" data-sitekey="6LcdXTsUAAAAAAre8dPxaP8KjcwFRItiEfSN4i82"></div>
        </div>
        <div>
            <div class="div-msg-warn-item">

            </div>
            <button class="btn btn-success" data-bind="click: $root.Continue" id="btn-signin">CONTINUE<img src="images/arrow-right.png"></button>
        </div>
        <div class="div-forgot-password">
            <span>Already have an account?</span>
            <a href="account/sign-in.html" class="sign-up-color">Sign In</a>
        </div>
    </div>
</div> 
