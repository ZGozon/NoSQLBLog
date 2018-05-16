<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
function register($document){
  global $users;
  global $user_following;
  global $user_followers;
  $users->insert($document);

  $followDoc = array(
    'user' => $document['_id'],
    'followers' => array()
  );
  $user_followers->insert($followDoc);

  $followingDoc = array(
    'user' => $document['_id'],
    'following' => array()
  );
  $user_following->insert($followingDoc);
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
    "type" => $document['type'],
    "title" => $document['title'],
    "date_posted" => $document['date_posted'],
    "tags" => $document['input-tags']
  ];
  $posts_array = array(
    "post_details_id" => $document['_id'],
    "author" => $userId,
    "comments" => array(),
    "summary" => $summary
  );
  $posts->insert($posts_array);
}
function followUser($currentUserEmail, $toFollowEmail) {
  global $users;
  global $user_followers;
  global $user_following;
  $currentUserId = getUserId($currentUserEmail);
  $toFollowId = getUserId($toFollowEmail);

  //update 'following' array in user_following collection
  $followingQuerry = $user_following->find(['user' => $currentUserId]);
  foreach ($followingQuerry as $doc) {
    $followingArr = $doc['following'];
  }
  if(in_array($toFollowId, $followingArr)) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('You are already following this user.');
    window.location.href='home.php';
    </script>");
  } else {
    $followingArr[] = $toFollowId;
    $user_following->update(
      ['user' => $currentUserId],
      ['$set' => ['following' => $followingArr]]
    );

    //update 'followers' array in user_followers collection
    $follwerQuerry = $user_followers->find(['user' => $toFollowId]);
    foreach ($follwerQuerry as $doc2) {
      $followerArr = $doc2['followers'];
    }
    $followerArr[] = $currentUserId;
    $user_followers->update(
      ['user' => $toFollowId],
      ['$set' => ['followers' => $followerArr]]
    );

    //update followings_count in users
    $getFollowingsCount = $users->find(['_id' => $currentUserId]);
    foreach ($getFollowingsCount as $doc) {
      $followingsCount = $doc['followings_count'];
    }
    $followingsCount = $followingsCount + 1;
    $users->update(
      ['_id' => $currentUserId],
      ['$set' => ['followings_count' => $followingsCount]]
    );

    //update followers_count in users
    $getFollowersCount = $users->find(['_id' => $toFollowId]);
    foreach ($getFollowersCount as $doc2) {
      $followersCount = $doc2['followers_count'];
    }
    $followersCount = $followersCount + 1;
    $users->update(
      ['_id' => $toFollowId],
      ['$set' => ['followers_count' => $followersCount]]
    );
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Followed!');
    window.location.href='home.php';
    </script>");
  }
}

?>