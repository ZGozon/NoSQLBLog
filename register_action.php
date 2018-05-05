<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(chkLogin()){
        header("Location: home.php");
    }
?>
<?php

   if(isset($_POST['reg'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $temp  = $_POST['pass'];
        $cpass = $_POST['cpass'];
        date_default_timezone_set("Asia/Hong_Kong");
        $date = date("Y/m/d h:i:sa");
        $emptyArr = array();
        $followers_count = count($emptyArr);
        $followings_count = count($emptyArr);
        $posts_count = count($emptyArr);

        if ($temp === $cpass) {
            $options = array('cost' => 10);
            $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
            $arrays = array(
                "First Name"    => $fname,
                "Last Name"     => $lname,
                "Email Address" => $email,
                "Password"      => $pass,
                "date_created"   => $date,
                "followers_count" => $followers_count,
                "followings_count" => $followings_count,
                "posts_count" => $posts_count
            );
            
            $query = chkemail($email);
            if($query){
                register($arrays);
                header("Location: login.php");
                }
           else{
            echo "Email already registered!";
               echo"<br>";
            echo "Please <a href='index.php'>Register</a> with another email ID";
           }
        } else {
            echo "<script LANGUAGE='JavaScript'>window.alert('Invalid password! Please try again.');
            window.location.href='index.php';
            </script>";
        } 
}

?>