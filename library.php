<?php
session_start();

function register($document){
  global $userdata;
  $userdata->insert($document);
  return true;
}


function addTEST($document) {
  // echo $test;

  global $postdata;
  $postdata->insert($document);
  // return true;

      // $document->insert($document);
}

function chkemail($email){
  global $userdata;
  $temp = $userdata->findOne(array('Email Address'=> $email));
  if(empty($temp)){
    return true;
  }
  else{
    return false;
  }
}

function setsession($email){
  $_SESSION["userLoggedIn"] = 1;
  global $userdata;
  $temp = $userdata->findOne(array('Email Address'=> $email));
  $_SESSION["uname"] = $temp["First Name"];
  $_SESSION["email"] = $email;
  return true;
}

function chkLogin(){
  //var_dump($_SESSION);
  if (isset($_SESSION["userLoggedIn"])){
    return true;
  }
  else{
    return false;
  }
}

function removeall(){
  unset($_SESSION["userLoggedIn"]);
  unset($_SESSION["uname"]);
  unset($_SESSION["email"]);
  return true;
}

function addPost($document) {
  echo $document;

  global $postdata;
  $postdata->insert($document);
  return true;
}




?>