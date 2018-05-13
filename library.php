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
function getUserId($email) {
  global $users;
  $userQuery = array('Email Address' => $email);
  $cursor = $users->find($userQuery);
  foreach ($cursor as $doc) {
    $userId = $doc['_id'];
  }
  return $userId;
}
function addPost($document, $email) {
  global $post_details;
  global $posts;
  $post_details->insert($document);
  $userId = getUserId($email);
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

function followUser($currentUserEmail, $toFollowEmail) {
  global $users;
  global $user_following;
  global $user_followers;

  $currentUserId = getUserId($currentUserEmail);
  $toFollowId = getUserId($toFollowEmail);

  $user_following->update(
    ['user' => $currentUserId],
    ['$set' =>['following' => array($toFollowId)]],
    ['upsert' => true]
  );

  $user_followers->update(
    ['user' => $toFollowId],
    ['$set' => ['followers' => array($currentUserId)]],
    ['upsert' => true]
  );

  $getFollowingsCount = $users->find(['_id' => $currentUserId]);
  foreach ($getFollowingsCount as $doc) {
    $followingsCount = $doc['followings_count'] + 1;
  }
  $users->update(
    ['_id' => $currentUserId],
    ['$set' => ['followings_count' => $followingsCount]]
  );

  $getFollowersCount = $users->find(['_id' => $toFollowId]);
  foreach ($getFollowersCount as $doc2) {
    $followersCount = $doc['followers_count'] + 1;
  }
  $users->update(
    ['_id' => $toFollowId],
    ['$set' => ['followers_count' => $followersCount]]
  );
}

?>