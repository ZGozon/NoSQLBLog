<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
function register($document){
  global $users;
  $users->insert($document);
  return true;
}
function chkemail($email){
  global $users;
  $temp = $users->findOne(array('Email Address'=> $email));
  if(empty($temp)){
    return true;
  }
  else{
    return false;
  }
}
function setsession($email){
  $_SESSION["userLoggedIn"] = 1;
  global $users;
  $temp = $users->findOne(array('Email Address'=> $email));
  $_SESSION["uname"] = $temp["First Name"];
  $_SESSION["sname"] = $temp["Last Name"];
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
function addPost($document, $email) {
  global $post_details;
  global $users;
  global $posts;
  $post_details->insert($document);
  $post_details_id = $document['_id'];
  $userQuery = array('Email Address' => $email);
  $cursor = $users->find($userQuery);
  foreach ($cursor as $doc) {
    $userId = $doc['_id'];
  }
  $summary = (object)[
    "title" => $document['title'],
    "date_posted" => $document['date_posted'],
    "tags" => $document['input-tags']
  ];
  $posts_array = array(
    "post_details_id" => $post_details_id,
    "author" => $userId,
    "comments" => array(),
    "summary" => $summary
  );
  $posts->insert($posts_array);
}
function addImage($image){

  global $post_details;

  // $document = array(
  //     "type" => "MCQ",
      
  //     "cover" => new MongoDB\BSON\Binary(file_get_contents($image["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
  // );
  // if ($post_details->insertOne($document)) {
  //     return true;
  //     echo "img uploaded!";
  // }
  $post_details->insert($image);
  return true;
}
?>