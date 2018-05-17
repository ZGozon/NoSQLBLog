<?php
  require_once 'connection.php';
  require_once 'library.php';
  if(chkLogin()){
    // echo "Logged in!";
    $name = $_SESSION["uname"];
    $email = $_SESSION["email"];
    // echo "Welcome $name!!!";
  }
  else{
    header("Location: login.php");
  }
  if(isset($_REQUEST['type']) &&  !empty($_REQUEST['type'])) {
    $type = $_GET['type'];
    $content = $_GET['content'];
    $tags = $_GET['input-tags'];
    $tags = explode(",", $tags);
    $comments = array();
    date_default_timezone_set("Asia/Hong_Kong");
    $date = date("Y/m/d h:i:sa");
    $comments_count = count($comments);
    switch ($type) {
      case "text":
        $title = $_GET['title'];
        $arrays = array(
          "type" => $type,
          "title" => $title,
          "content" => $content,
          "input-tags" => $tags,
          "date_posted" => $date,
          "comments_count" => $comments_count
        );
          addPost($arrays, $email);
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Succesfully posted!');
          window.location.href='home.php';
          </script>");
          break;
      case "postlink":
        $link = $_GET['link'];
        $arrays = array(
          "type" => $type,
          "link" => $link,
          "caption" => $content,
          "input-tags" => $tags,
          "date_posted" => $date,
          "comments_count" => $comments_count
        );
          addPost($arrays, $email);
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Succesfully posted!');
          window.location.href='home.php';
          </script>");
          break;
      case "img":
        $arrays = array(
          "type" => $type,
          "content" => $content,
          "input-tags" => $tags,
          "date_posted" => $date,
          "comments_count" => $comments_count
        );
          addPost($arrays, $email);
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Succesfully posted!');
          window.location.href='home.php';
          </script>");
          break;
      default:
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Post failed! Try again.');
        window.location.href='home.php';
        </script>");
    }
  }
?>