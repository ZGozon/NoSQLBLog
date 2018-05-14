<?php
  require_once 'connection.php';
  require_once 'library.php';

  if(chkLogin()){
    $name = $_SESSION["uname"];
    $email = $_SESSION["email"];
  }
  else{
    header("Location: login.php");
  }

  if (isset($_REQUEST['follow']) && !empty($_REQUEST['follow'])) {
    $toFollow = $_REQUEST['follow'];
    followUser($email, $toFollow);
  }
?>