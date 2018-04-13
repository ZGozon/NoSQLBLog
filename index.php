<?php
    require_once 'library.php';
    if(chkLogin()){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">



  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  

  <style>
    @keyframes infiniteScrollBg {

  0% {
    transform: translateY(0%);
  }
  100%{
    transform: translateY(-100%);
  }
  s
}


.animated-scene {
  width: 100vw;
  height: 100vh;
  position: fixed;
  min-height: 400px;
  animation: infiniteScrollBg 50s  infinite;
}

.animated-scene__frame {
  width: 100%;
  height: 100%;

  background-color: #4277a3;

  background-image: url('images/portraits.jpg');

}
.layer {
   content: '';
display: block;
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
background-color: rgba(255,94,58,.95);
opacity: 1;
z-index: auto;

}
html, body {
  height: 100%;
}

body {
  display: flex;
  flex-direction: column;
}

header, footer {
  
  padding: 20px;
  color: white;
  margin-top: 20px;
}

</style>


</head>
<body style="display: contents;">

<div class="animated-scene">
  <div class="animated-scene__frame animated-scene__frame-1"></div>
  <div class="animated-scene__frame animated-scene__frame-2"></div>

</div>


<div class="layer">
  <header><img src="images/samplelogo.png" style="width: 15%; margin-left: 100px;"></header>
  <div style="margin-top: 250px;"><h1><font color="white" size="600px;" style="margin-left: 160px;">Welcome to Gago Gaga Pota</font></h1><h2><font color="white"  style="margin-left: 165px; font-weight: 400;">The no.1 Gago Gago Gago Gaga Pota</font></h2></div><div class="container-login100-form-btn">
            
              <a class="button login100-form-btn" href="login.php" type="submit"  name="reg" style="width: 300px;
background: #ffffff4d;
height: 80px;
margin-left: -47%;
margin-top: 60px;">Login</a>
                
              
            </div>
          

   
  

  <div class="limiter">
     
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
       <form  action="register_action.php" method="post">
          <span class="login100-form-title p-b-49">
            Sign Up
          </span>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
            <span class="label-input100">First Name</span>
            <input class="input100" type="text" id="inputFname3" name="fname" placeholder="Type your first name" required="required">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
              <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
            <span class="label-input100">Last Name</span>
            <input class="input100" type="text" id="inputLname3" name="lname" placeholder="Type your lastname" required="required">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" " id="inputEmail3" name="email" placeholder="Type your emailaddress" required="required">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password"  id="pass" name="pass" placeholder="Type your password" required="required">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Confirm Password</span>
            <input class="input100" type="password"  id="cpass" name="cpass" onblur="chk() placeholder="Type your password" required="required">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
             <div id="error"></div>
          </div>
          
       
          <br>
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" type="submit"  name="reg">
                Sign Up
              </button>
            </div>
          </div>

     
 
        
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>




  

  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  
  <script src="js/main.js"></script>

</body>
</html>
  
    </div>


    