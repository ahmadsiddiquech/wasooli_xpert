<!DOCTYPE html>

<html lang="en">

<head>

  <title>Login</title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="<?php echo STATIC_ADMIN_IMAGE ?>favicon.ico">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

  <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->

<!--===============================================================================================-->

</head>

<style type="text/css">

* {

  margin: 0px; 

  padding: 0px; 

  box-sizing: border-box;

}



body, html {

  height: 100%;

  font-family: monospace, sans-serif;

}



/*---------------------------------------------*/

a {

  font-family: monospace;

  font-size: 14px;

  line-height: 1.7;

  color: #666666;

  margin: 0px;

  transition: all 0.4s;

  -webkit-transition: all 0.4s;

  -o-transition: all 0.4s;

  -moz-transition: all 0.4s;

}



a:focus {

  outline: none !important;

}



a:hover {

  text-decoration: none;

  color: #fff;

}



/*---------------------------------------------*/

h1,h2,h3,h4,h5,h6 {

  margin: 0px;

}



p {

  font-family: Poppins-Regular;

  font-size: 14px;

  line-height: 1.7;

  color: #666666;

  margin: 0px;

}



ul, li {

  margin: 0px;

  list-style-type: none;

}





/*---------------------------------------------*/

input {

  outline: none;

  border: none;

}



textarea {

  outline: none;

  border: none;

}



textarea:focus, input:focus {

  border-color: transparent !important;

}



input:focus::-webkit-input-placeholder { color:transparent; }

input:focus:-moz-placeholder { color:transparent; }

input:focus::-moz-placeholder { color:transparent; }

input:focus:-ms-input-placeholder { color:transparent; }



textarea:focus::-webkit-input-placeholder { color:transparent; }

textarea:focus:-moz-placeholder { color:transparent; }

textarea:focus::-moz-placeholder { color:transparent; }

textarea:focus:-ms-input-placeholder { color:transparent; }



input::-webkit-input-placeholder { color: #fff;}

input:-moz-placeholder { color: #fff;}

input::-moz-placeholder { color: #fff;}

input:-ms-input-placeholder { color: #fff;}



textarea::-webkit-input-placeholder { color: #fff;}

textarea:-moz-placeholder { color: #fff;}

textarea::-moz-placeholder { color: #fff;}

textarea:-ms-input-placeholder { color: #fff;}



label {

  margin: 0;

  display: block;

}



/*---------------------------------------------*/

button {

  outline: none !important;

  border: none;

  background: transparent;

}



button:hover {

  cursor: pointer;

}



iframe {

  border: none !important;

}





/*//////////////////////////////////////////////////////////////////

[ Utility ]*/

.txt1 {

  font-family: monospace;

  font-size: 13px;

  color: #e5e5e5;

  line-height: 1.5;

}





/*//////////////////////////////////////////////////////////////////

[ login ]*/



.limiter {

  width: 100%;

  margin: 0 auto;

}



.container-login100 {

  width: 100%;  

  min-height: 100vh;

  display: -webkit-box;

  display: -webkit-flex;

  display: -moz-box;

  display: -ms-flexbox;

  display: flex;

  flex-wrap: wrap;

  justify-content: center;

  align-items: center;

  padding: 15px;



  background-repeat: no-repeat;

  background-position: center;

  background-size: cover;

  position: relative;

  z-index: 1;  

}



.container-login100::before {

  content: "";

  display: block;

  position: absolute;

  z-index: -1;

  width: 100%;

  height: 100%;

  top: 0;

  left: 0;

  background-color: rgba(0, 181, 236,0.5);

}



.wrap-login100 {

  width: 500px;

  border-radius: 10px;

  overflow: hidden;

  padding: 55px 55px 37px 55px;

  background: #00b5ec;

  background: -webkit-linear-gradient(top,#dcdcdc, #455a64);

  background: -o-linear-gradient(top,#dcdcdc, #455a64);

  background: -moz-linear-gradient(top,#dcdcdc, #455a64);

  background: linear-gradient(top,#dcdcdc, #455a64);

}





/*------------------------------------------------------------------

[ Form ]*/



.login100-form {

  width: 100%;

}



.login100-form-logo {

  font-size: 60px; 

  color: #333333;



  display: -webkit-box;

  display: -webkit-flex;

  display: -moz-box;

  display: -ms-flexbox;

  display: flex;

  justify-content: center;

  align-items: center;

  width: 120px;

  height: 120px;

  border-radius: 50%;

  margin: 0 auto;

}



.login100-form-title {

  font-family: monospace;

  font-size: 30px;

  color: #fff;

  line-height: 1.2;

  text-align: center;

  text-transform: uppercase;

  padding: 20px;

  display: block;

}





/*------------------------------------------------------------------

[ Input ]*/



.wrap-input100 {

  width: 100%;

  position: relative;

  border-bottom: 2px solid rgba(255,255,255,0.24);

  margin-bottom: 30px;

}



.input100 {

  font-family: monospace;

  font-size: 16px;

  color: #fff;

  line-height: 1.2;



  display: block;

  width: 100%;

  height: 45px;

  background: transparent;

  padding: 0 5px 0 38px;

}



/*---------------------------------------------*/ 

.focus-input100 {

  position: absolute;

  display: block;

  width: 100%;

  height: 100%;

  top: 0;

  left: 0;

  pointer-events: none;

}



.focus-input100::before {

  content: "";

  display: block;

  position: absolute;

  bottom: -2px;

  left: 0;

  width: 0;

  height: 2px;



  -webkit-transition: all 0.4s;

  -o-transition: all 0.4s;

  -moz-transition: all 0.4s;

  transition: all 0.4s;



  background: #fff;

}



.focus-input100::after {

  font-family: Material-Design-Iconic-Font;

  font-size: 22px;

  color: #fff;



  content: attr(data-placeholder);

  display: block;

  width: 100%;

  position: absolute;

  top: 6px;

  left: 0px;

  padding-left: 5px;



  -webkit-transition: all 0.4s;

  -o-transition: all 0.4s;

  -moz-transition: all 0.4s;

  transition: all 0.4s;

}



.input100:focus {

  padding-left: 5px;

}



.input100:focus + .focus-input100::after {

  top: -22px;

  font-size: 18px;

}



.input100:focus + .focus-input100::before {

  width: 100%;

}



.has-val.input100 + .focus-input100::after {

  top: -22px;

  font-size: 18px;

}



.has-val.input100 + .focus-input100::before {

  width: 100%;

}



.has-val.input100 {

  padding-left: 5px;

}





/*==================================================================

[ Restyle Checkbox ]*/



.contact100-form-checkbox {

  padding-left: 5px;

  padding-top: 5px;

  padding-bottom: 35px;

}



.input-checkbox100 {

  display: none;

}



.label-checkbox100 {

  font-family: monospace;

  font-size: 13px;

  color: #fff;

  line-height: 1.2;



  display: block;

  position: relative;

  padding-left: 26px;

  cursor: pointer;

}



.label-checkbox100::before {

  content: "\f26b";

  font-family: Material-Design-Iconic-Font;

  font-size: 13px;

  color: transparent;



  display: -webkit-box;

  display: -webkit-flex;

  display: -moz-box;

  display: -ms-flexbox;

  display: flex;

  justify-content: center;

  align-items: center;

  position: absolute;

  width: 16px;

  height: 16px;

  border-radius: 2px;

  background: #fff;

  left: 0;

  top: 50%;

  -webkit-transform: translateY(-50%);

  -moz-transform: translateY(-50%);

  -ms-transform: translateY(-50%);

  -o-transform: translateY(-50%);

  transform: translateY(-50%);

}



.input-checkbox100:checked + .label-checkbox100::before {

  color: #555555;

}





/*------------------------------------------------------------------

[ Button ]*/

.container-login100-form-btn {

  width: 100%;

  display: -webkit-box;

  display: -webkit-flex;

  display: -moz-box;

  display: -ms-flexbox;

  display: flex;

  flex-wrap: wrap;

  justify-content: center;

}



.login100-form-btn {

  font-family: monospace;

  font-size: 16px;

  color: #555555;

  line-height: 1.2;



  display: -webkit-box;

  display: -webkit-flex;

  display: -moz-box;

  display: -ms-flexbox;

  display: flex;

  justify-content: center;

  align-items: center;

  padding: 0 20px;

  min-width: 120px;

  height: 50px;

  border-radius: 25px;



  background: #00b5ec;

  background: -webkit-linear-gradient(top,#dcdcdc, #455a64);

  background: -o-linear-gradient(top,#dcdcdc, #455a64);

  background: -moz-linear-gradient(top,#dcdcdc, #455a64);

  background: linear-gradient(top,#dcdcdc, #455a64);

  position: relative;

  z-index: 1;



  -webkit-transition: all 0.4s;

  -o-transition: all 0.4s;

  -moz-transition: all 0.4s;

  transition: all 0.4s;

}



.login100-form-btn::before {

  content: "";

  display: block;

  position: absolute;

  z-index: -1;

  width: 100%;

  height: 100%;

  border-radius: 25px;

  background-color: #fff;

  top: 0;

  left: 0;

  opacity: 1;



  -webkit-transition: all 0.4s;

  -o-transition: all 0.4s;

  -moz-transition: all 0.4s;

  transition: all 0.4s;

}



.login100-form-btn:hover {

  color: #fff;

}



.login100-form-btn:hover:before {

  opacity: 0;

}





/*------------------------------------------------------------------

[ Responsive ]*/



@media (max-width: 576px) {

  .wrap-login100 {

    padding: 55px 15px 37px 15px;

  }

}







/*------------------------------------------------------------------

[ Alert validate ]*/



.validate-input {

  position: relative;

}



.alert-validate::before {

  content: attr(data-validate);

  position: absolute;

  max-width: 70%;

  background-color: #fff;

  border: 1px solid #c80000;

  border-radius: 2px;

  padding: 4px 25px 4px 10px;

  top: 50%;

  -webkit-transform: translateY(-50%);

  -moz-transform: translateY(-50%);

  -ms-transform: translateY(-50%);

  -o-transform: translateY(-50%);

  transform: translateY(-50%);

  right: 0px;

  pointer-events: none;



  font-family: monospace;

  color: #c80000;

  font-size: 13px;

  line-height: 1.4;

  text-align: left;



  visibility: hidden;

  opacity: 0;



  -webkit-transition: opacity 0.4s;

  -o-transition: opacity 0.4s;

  -moz-transition: opacity 0.4s;

  transition: opacity 0.4s;

}



.alert-validate::after {

  content: "\f12a";

  font-family: FontAwesome;

  font-size: 16px;

  color: #c80000;



  display: block;

  position: absolute;

  top: 50%;

  -webkit-transform: translateY(-50%);

  -moz-transform: translateY(-50%);

  -ms-transform: translateY(-50%);

  -o-transform: translateY(-50%);

  transform: translateY(-50%);

  right: 5px;

}



.alert-validate:hover:before {

  visibility: visible;

  opacity: 1;

}



@media (max-width: 992px) {

  .alert-validate::before {

    visibility: visible;

    opacity: 1;

  }

}

</style>

<body>

  

  <div class="limiter">

    <div class="container-login100" style="background-image: url('<?php echo STATIC_ADMIN_IMAGE ?>/bg-01.jpg');">

      <div class="wrap-login100">

        <form class="login100-form validate-form" action="<?=ADMIN_BASE_URL.'login/submit_login'?>" method="POST">

          <span class="login100-form-logo">

            <img src="<?php echo STATIC_ADMIN_IMAGE ?>logo.png" style="width: 95%">

          </span>



          <span class="login100-form-title p-b-34 p-t-27">

            Admin Login

          </span>



          <div class="wrap-input100 validate-input" data-validate = "Enter username">

            <input class="input100" type="text" name="txtUserName" placeholder="Username">

            <span class="focus-input100" data-placeholder="&#xf207;"></span>

          </div>



          <div class="wrap-input100 validate-input" data-validate="Enter password">

            <input class="input100" type="password" name="txtPassword" placeholder="Password">

            <span class="focus-input100" data-placeholder="&#xf191;"></span>

          </div>


          <div class="container-login100-form-btn">

            <button class="login100-form-btn">

              Login

            </button>

          </div>
        </form>

      </div>

    </div>

  </div>


</body>

</html>