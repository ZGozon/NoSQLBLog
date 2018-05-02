<?php
    require_once 'library.php';
    if(chkLogin()){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" /> 
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/login_main.css">
    <link rel="stylesheet" type="text/css" href="css/login_util.css">
    <!--===============================================================================================-->
    <title>Blog Page</title>
    <style>
        @keyframes infiniteScrollBg {
            0% {
                transform: translateY(0%);
            }
            100% {
                transform: translateY(-100%);
            }
        }

        .animated-scene {
            width: 100vw;
            height: 100vh;
            position: fixed;
            min-height: 400px;
            animation: infiniteScrollBg 50s infinite;
        }

        .animated-scene__frame {
            width: 100%;
            height: 100%;
            background-color: #4277a3;
            background-image: url('images/portraitsCopy.png');
        }
    </style>
</head>

<body style="display: contents;">
    <div class="animated-scene">
        <div class="animated-scene__frame animated-scene__frame-1"></div>
        <div class="animated-scene__frame animated-scene__frame-2"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                logo here
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <span class="login100-form-title p-b-49" style="color: white;">
                            <h4 class="display-4">Welcome to BASO</h4>
                            <br>
                            <h4> The No.1 Blogging Website</h4>
                        </span>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-login100" style="background-color: transparent;">
                    <div class="wrap-login100">
                        <form action="register_action.php" method="post">
                            <span class="login100-form-title p-b-49">
                                Sign Up
                            </span>
                            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                                <span class="label-input100">First Name</span>
                                <input class="input100" type="text" id="inputFname3" name="fname" placeholder="Type your first name" required="required">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                                <span class="label-input100">Last Name</span>
                                <input class="input100" type="text" id="inputLname3" name="lname" placeholder="Type your lastname" required="required">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="email" id="inputEmail3" name="email" placeholder="Type your emailaddress" required="required">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" id="pass" name="pass" placeholder="Type your password" required="required">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <span class="label-input100">Confirm Password</span>
                                <input class="input100" type="password" id="cpass" name="cpass" onblur="chk()" placeholder="Type your password" required="required">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                                <div id="error"></div>
                            </div>
                            <br>
                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" type="submit" name="reg">
                                        Sign Up
                                    </button>
                                </div>
                            </div>


                        <center>
                        <span class="txt1">
                            Already Member?
                        </span>

                        <a class="txt2" href="login.php">
                            Log in
                        </a>
                    </center>
        
                    </div>
                    </form>
                </div>
                <br>
            </div>
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