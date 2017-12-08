
<div id="div-fgp-controller">
            
            <div id="rsg-dialog" class="text-center">
                <h4 class="h4-title" style="margin-bottom:15px; margin-top:50px;">
                    <span>Forgot your</span> <span class="span-title-color">password?</span>
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
                            <input type="text" id="input-sign-username" placeholder="Email" name="Email" value="" class="form-control">

                        </div>
                        <div class="div-msg-warn-item">
                            <span class="control-label" data-bind="text:msgErrCaptcha()"></span>
                        </div>
                        <div class="captcha-verify">
                              <div class="g-recaptcha" data-sitekey="6LcdXTsUAAAAAAre8dPxaP8KjcwFRItiEfSN4i82"></div>
                        </div>
                    </div>
                    <div class="div-msg-warn-item">

                    </div>
                    <div class="footer text-center">
                        <button class="btn btn-success" data-bind="click: $root.Reset" id="btn-signin">Reset password<img src="images/arrow-right.png"></button>
                    </div>
                </div>
            </div>            
            
            
        </div>