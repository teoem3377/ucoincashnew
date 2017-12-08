<div class="text-center" id="div-binding-container">
        <h4 class="h4-title" style="margin-bottom:15px; margin-top:50px;">
            <span>Resend confirmation</span> <span class="span-title-color">email!</span>
        </h4>
        <p>
            Enter your register email and we will send you new verification email
        </p>
        <div class="div-signin-container" data-bind="with: Access">
            <div class="content">
                <div class="div-msg-warn-item">
                    <!-- ko if: err()==1 --><!-- /ko -->
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <img class="sign-ico" src="images/email-ico.png">
                    </span>
                    <input type="text" id="input-sign-username" placeholder="Email" name="Username" value="" class="form-control">

                </div>
                <div class="div-msg-warn-item">
                    <span class="control-label" data-bind="text:msgErrCaptcha()"></span>
                </div>
                <div class="captcha-verify">
                      <div class="g-recaptcha" data-sitekey="6LeWvDoUAAAAABjqgyJfgd7zlpJQRGuJqVXL3NtL"></div>
                </div>
            </div>
            <div class="div-msg-warn-item">

            </div>
            <div class="footer text-center">
                <button class="btn btn-success" data-bind="click: $root.Resend" id="btn-resend">
                    Submit
                    <img src="images/arrow-right.png">
                </button>
            </div>
        </div>
    </div>