
<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script type="text/javascript">
		$(document).ready(function(e) {  
			
			$('#dangnhap9').click(function(e) {   
				if(document.frmDN.tendangnhap.value==''){
							
						alert('Please input your user');					
						document.frmDN.tendangnhap.focus();					
						return false;	
					}
					if(document.frmDN.matkhau.value==''){
						alert('Please input your password');
						document.frmDN.matkhau.focus();
						return false;	
					}
					document.frmDN.submit();
			
			});
					
		});		
        
</script>








<div class="main">
 
     <div class="contact">
     
        <div class="shadow-forms">
           
            <div class="message warning">
               
                <div class="login-head">
                     
                     <h2>Client Login</h2>	
                </div>
                
                <div class="sub-head">
                    <h3>Your almost done ! One more step</h3>
                    <img src="./images/1/bbl.png" alt=""/>
                </div>
               
                 <form name="frmDN" id="frmDN" method="post" action="dangnhap.html" enctype="multipart/form-data">
                    <input type="text" class="text" name="tendangnhap" id="tendangnhap" placeholder="USER"  >
                    <input type="password"  name="matkhau" id="matkhau" placeholder="PASSWORD">
                    
                    <div class="submit">
                        <input type="submit" id="dangnhap9" value="LOG IN" >
                    </div>
                        <span> </span>
                    <div class="buttons">
                        
                        <ul>
                            <li class="fb">
                                <a  class="hvr-bounce-to-bottom">FACEBOOK</a>
                            </li>
                            <li class="twr">
                                <a  class="hvr-bounce-to-top">TWITTER</a>
                            </li>
                            <div class="clear"> </div>
                        </ul>
                    </div>
                </form>
                
             </div>
             
		</div>
	
    
    
    </div>
    
</div>


<style>

 .main_bg{
  background:url("./images/1/bg3.jpg")no-repeat 0px 0px;
  font-family: 'Open Sans', sans-serif;
  background-size: cover;
 }

/*-----login-form1-----*/
.message.warning {
	background: rgba(11, 27, 20, 0.11);
  margin:4% auto 0;
	width:30%;
	-webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
}
.login-head {
  background: #323030;
  padding: 1.6em 1em;
  position: relative;
  border-bottom: 1px solid #201F1F;
}
.login-head h2 {
  color: #fff;
  font-size: 1.5em;
  text-align: center;
  font-weight: 400;
}
.sub-head {
  text-align: center;
  padding: 1.2em 1em;
}
.sub-head h3 {
  color: #fff;
  font-size: 0.8em;
  margin-bottom: 1em;
}
.message.warning span {
  width: 35.7%;
  height: 2px;
  background: #eee;
  display: block;
  margin: 1em 7em;
}
form {
  padding: 0 2.5em 2em 2.5em;
}
.buttons li.twr{
  display: inline-block;
  width: 38%;
  float: left;
  margin: 1em 1em 0em 3.8em;
  border: none;
}
.buttons h4{
  color: #fff;
  font-size: 0.75em;
  text-align: center;
}
.buttons li:hover{
  border: none;
}
.buttons li.fb {
  display: inline-block;
  width: 38%;
  float: left;
  margin: 1em 1em 0em 0em;
  border: none;
}
input[type="text"], input[type="password"] {
  width: 82%;
  padding: 0.9em 1em 0.9em 3em;
  color: #000;
 
  outline: none;
  font-weight: 400;
  border: none;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  border: 1px solid #eee;
  margin: 0.8em 0;
  font-family: 'Open Sans', sans-serif;
  background: url("./images/1/user.png")no-repeat 10px 16px #eee;
  }
  input[type="password"] {
    background: url("./images/1/key.png")no-repeat 10px 15px #eee;
  }
.submit input[type="submit"]{
 
  color: #fff;
  cursor: pointer;
  outline: none;
  padding: 0.7em 0.8em;
  width: 100%;
  border: none;
  font-weight: 600;
  background: #8821E0;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  border-bottom: 4px solid #E51D5F;
  font-family: 'Open Sans', sans-serif;
}
input[type="submit"]:hover{
  background: #E51D5F;
   border-bottom:4px solid #8821E0;
  -webkit-transition: color 0.2s ease-in-out;
  -moz-transition: color 0.2s ease-in-out;
  -o-transition: color 0.2s ease-in-out;
  transition: color 0.2s ease-in-out;
}
.submit {
  margin-top: 1em;
}

/*----------*/
.p-container{
  margin-top: 1em;
}
.p-container  .checkbox input {
  position: absolute;
  left: -9999px;
}
.p-container.checkbox i {
  border-color: #fff;
  transition: border-color 0.3s;
  -o-transition: border-color 0.3s;
  -ms-transition: border-color 0.3s;
  -moz-transition: border-color 0.3s;
  -webkit-transition: border-color 0.3s;
  
}
.p-container.checkbox i:hover {
  border-color:red;
  
}
.p-container  i:before {
  background-color: #2da5da;  
}
.p-container  .rating label {
  color: #ccc;
  transition: color 0.3s;
  -o-transition: color 0.3s;
  -ms-transition: color 0.3s;
  -moz-transition: color 0.3s;
  -webkit-transition: color 0.3s;
}
.p-container  .checkbox input + i:after {
  position: absolute;
  opacity: 0;
  transition: opacity 0.1s;
  -o-transition: opacity 0.1s;
  -ms-transition: opacity 0.1s;
  -moz-transition: opacity 0.1s;
  -webkit-transition: opacity 0.1s;
}
.p-container .checkbox input + i:after {
  content: url(./images/1/tick.png) no-repeat 7px 1px;
  top: -1px;
  left: 0px;
  width: 9px;
  height: 9px;
}
.p-container.checkbox {
  float: left;
  margin-right: 30px;
}
.p-container .checkbox {
  padding-left: 40px;
 font-size: 0.75em;
line-height: 14px;
color: #fff;
cursor: pointer;
}
.p-container  .checkbox {
  position: relative;
  display: block;
}
.p-container  h6 a {
  float: right;
  color: #fff;
  font-size: 0.95em;
}
.p-container  h6 a:hover{
  text-decoration: underline;
}
label.checkbox {
float: left;
margin-top: 3px;
}
.p-container  .checkbox i {
  position: absolute;
  top: -2px;
  left: 5px;
  display: block;
  width: 18px;
  height: 18px;
  outline: none;
  border: none;
  background: #eee;
  border: 1px solid #eee;
  border-radius: 0.3em;
  -o-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -webkit-border-radius: 0.3em;
}
.p-container  .checkbox input + i:after {
  position: absolute;
  opacity: 0;
  transition: opacity 0.1s;
  -o-transition: opacity 0.1s;
  -ms-transition: opacity 0.1s;
  -moz-transition: opacity 0.1s;
  -webkit-transition: opacity 0.1s;
}
.p-container .checkbox input + i:after {
  color: #2da5da;
}
.p-container .checkbox input:checked + i,
.p-container . input:checked + i {
  border-color: #2da5da;  
}
.p-container .rating input:checked ~ label {
  color: #2da5da; 
}

.p-container .checkbox input:checked + i:after {
  opacity: 1;
}

/* Bounce To Bottom */
.fb a.hvr-bounce-to-bottom {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  color: #fff;
  background:url("./images/1/fb.png")no-repeat 8px 9px #3b5fa4;
  padding: 0.7em 1.9em 0.7em 2.8em;
  font-size:0.78em;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  border-bottom: 3px solid #263F71;
}
.fb a.hvr-bounce-to-bottom:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background:#263F71;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
  -webkit-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.fb a.hvr-bounce-to-bottom:hover,.fb a.hvr-bounce-to-bottom:focus,.fb a.hvr-bounce-to-bottom:active {
  color: white;
}
.fb a.hvr-bounce-to-bottom:hover:before,.fb a.hvr-bounce-to-bottom:focus:before,.fb a.hvr-bounce-to-bottom:active:before {
  -webkit-transform: scaleY(1);
  transform: scaleY(1);
  -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
  transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
}
/* Bounce To Top */
.twr a.hvr-bounce-to-top {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  color: #fff;
  background:url("./images/1/twt.png")no-repeat 8px 7px#11aade;
   padding: 0.7em 1.9em 0.7em 3.4em;
  font-size:0.78em;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  border-bottom: 3px solid #0581AB;
}
.twr a.hvr-bounce-to-top:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  -webkit-border-radius: 0.3em;
  -moz-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  border-radius: 0.3em;
  background:#0581AB;
  -webkit-transform: scaleY(0);
  transform: scaleY(0);
  -webkit-transform-origin: 50% 100%;
  transform-origin: 50% 100%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.twr a.hvr-bounce-to-top:hover,.twr a.hvr-bounce-to-top:focus,.twr a.hvr-bounce-to-top:active {
  color: white;
}
.twr a.hvr-bounce-to-top:hover:before,.twr a.hvr-bounce-to-top:focus:before,.twr a.hvr-bounce-to-top:active:before {
  -webkit-transform: scaleY(1);
  transform: scaleY(1);
  -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
  transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
}

.alert-close {
	background: url('./images/1/into.png') no-repeat 0px 0px;
	cursor: pointer;
  height: 22px;
  width: 22px;
  position: absolute;
  right: 28px;
  top: 30px;
	-webkit-transition: color 0.2s ease-in-out;
	-moz-transition: color 0.2s ease-in-out;
	-o-transition: color 0.2s ease-in-out;
	transition: color 0.2s ease-in-out;
}


/*-----start-responsive-design------*/
@media (max-width:1440px){
  .message.warning  {
     margin:4% auto 0;
       width: 32%;
  }
  .buttons li.twr{
    width: 38%;
    float: left;
    margin: 1em 1em 0em 2.9em;
  }
   input[type="text"], input[type="password"] {
    width: 81%;
  }
}
@media (max-width:1366px){
	.message.warning  {
     margin:5% auto 0;
	     width: 33%;
	}
  .buttons li.twr{
    width: 38%;
    float: left;
    margin: 1em 1em 0em 2.8em;
  }

}
@media (max-width:1280px){
  .message.warning {
    margin: 3% auto 0;
    width: 37%;
  }
  .submit input[type="submit"] {
   
    padding: 0.7em 0.8em;
    width: 99%;
  }
}
@media (max-width:1024px){
    .message.warning {
    margin: 3% auto 0;
    width: 45%;
  }
  .submit input[type="submit"] {
 
  padding: 0.7em 0.8em;
  width: 99.7%;
  }

}
@media (max-width:768px){
  .message.warning {
  margin: 3% auto 0;
  width: 60%;
  }
  .shadow-forms h1 {
    padding: 0.7em 0 0em 0;
   
  }
  .login-head {
  background: #323030;
  padding: 1.2em 1em;
  }
}
@media (max-width:640px){
    .message.warning {
    margin: 3% auto 0;
    width: 71%;
  }
  form {
  padding: 0 2em 2em 2em;
  }
  .submit input[type="submit"] {
 
  padding: 0.5em 0.6em;
  width: 99.5%;
  }
  .login-head h2 {
  font-size: 1.5em;
  }
  .alert-close {
  background: url('./images/1/into.png') no-repeat 0px 0px;
  right: 28px;
  top: 24px;
  }
}
@media (max-width:480px){
  .message.warning {
  margin: 3% auto 0;
  width: 93%;
  }
 

}
@media (max-width:320px){
  .shadow-forms h1 {
  font-size:1.4em;
  }
  .login-head {
  padding: 0.7em 0.7em;
  }
  .alert-close {
  right: 19px;
  top: 16px;
  }
  .sub-head h3,.buttons h4 {
  font-size: 0.9em;
  }
  .sub-head img {
    width: 45%;
  }
  .buttons h4 {
    line-height: 1.5em;
  }
  form {
    padding: 0 1em 2em 1em;
  }
  input[type="text"], input[type="password"] {
  width: 75%;
  padding: 0.7em 1em 0.7em 3em;
  color: #000;
  font-size: 15px;
  margin: 0.4em 0;
  background: url("./images/1/user.png")no-repeat 10px 9px #a7b3b7;
  }
  input[type="password"] {
    background: url("./images/1/key.png")no-repeat 10px 9px #a7b3b7;
  }
  .p-container .checkbox {
  padding-left: 33px;
  font-size: 0.75em;
  }
  .p-container h6 a {
    font-size: 0.75em;
  }
  .buttons li.twr {
  width: 38%;
  float: left;
  margin: 1em 1em 0em 1em;
  }
  .fb a.hvr-bounce-to-bottom {
    padding: 0.6em 2.2em;
    font-size: 0.8em;
    background: url("./images/1/fb.png")no-repeat -3px 5px #3b5fa4;
  }
  .twr a.hvr-bounce-to-top {
   padding: 0.6em 2.7em;
  font-size: 0.8em;
  background: url("./images/1/twt.png")no-repeat 1px 3px#11AADA;
  }
  .submit input[type="submit"] {
  font-size: 1em;
  padding: 0.5em 0.6em;
  width: 99.5%;
  }
  
  a.sign-left {
  font-size:0.9em;
  padding-top: 8px;
  }
  a.signup {
  padding: 0.4em 1.2em;
  font-size: 0.9em;
  }
  .message.warning span {
  margin: 1em 5.5em;
  }
 
}




</style>






