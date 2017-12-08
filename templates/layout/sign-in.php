<?php

 unset($_SESSION['login']['id']);			
 unset($_SESSION['login']['user']);

?>
<script>
  
$.getJSON("http://freegeoip.net/json/", function (data) {
    var country = data.country_name;
	 $("#quocgia").val(country);
});

</script>




<div class="text-center" id="div-binding-container">
        <h4 class="h4-title">
            <span>Welcome</span> <span class="span-title-color">back!</span>
        </h4>
        <div class="div-signin-container" data-bind="with: Access">
            <div class="content">
                <div class="div-msg-warn-item">
                    <!-- ko if: err()==1 --><!-- /ko -->
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/email-ico.png">
                    </span>
                    <input type="text" id="input-sign-username" name="Email" placeholder="Email" data-bind="event: { &#39;change&#39;: $root.CheckUsername }"  value="" class="form-control">
                    <input type="hidden" id="quocgia" name="quocgia"/>
                </div>
                <div class="div-msg-warn-item">

                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/pass-ico.png">
                    </span>
                    <input type="password" id="input-sign-password" name="Password" data-bind="event: { &#39;change&#39;: $root.CheckPassword }" placeholder="Password" class="form-control">

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
                <button class="btn btn-success" data-bind="click: $root.Login" id="btn-signin">Sign In
                 <img src="images/arrow-right.png">
                </button>
                <div class="div-forgot-password">
                    <span>Don't have an account?</span>
                    <a href="account/sign-up.html" class="sign-up-color" >Sign Up</a> 
                </div>
                <div class="div-register-user-action">
                    <a href="account/forgot-password.html">Forgot your password?</a>
                    <!--<a href="account/resend-email.html">Resend confirmation email</a>-->
                </div>
                
            </div>
        </div>
    </div>
  </div>