<?php
session_start();

function register($document){
  global $userdata;
  $userdata->insert($document);
  return true;
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

function addPost($data) {
  global $postdata;
  $postdata->insert($data);
  return true;
}

?>