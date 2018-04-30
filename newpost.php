<?php
  require_once 'connection.php';
  require_once 'library.php';
  if(chkLogin()){
    // echo "Logged in!";
    $name = $_SESSION["uname"];
    // echo "Welcome $name!!!";
  }
  else{
    header("Location: login.php");
  }

  if(isset($_REQUEST['type']) &&  !empty($_REQUEST['type'])) {

    $type = $_GET['type'];
    $content = $_GET['content'];
    $tags = $_GET['tags'];

  switch ($type) {
    case "text":

      $title = $_GET['title'];
      $arrays = array(
        "type" => $type,
        "title" => $title,
        "content" => $content,
        "tags" => $tags
      );
           addTEST($arrays);
        break;
    case "link":
        
      echo "  <script>alert('You have Clicked Submit');</script>";

        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
    }
  }


  // if(isset($_REQUEST['type']) &&  !empty($_REQUEST['type'])) {

  //   $type = $_GET['type'];
  //   echo $type;

  //   $type = $_GET['type'];
  //   $content = $_GET['content'];
  //   $tags = $_GET['tags'];
  //   if($type === 'text') {
  //     $title = $_GET['title'];
  //     $arrays = array(
  //       "type" => $type,
  //       "title" => $title,
  //       "content" => $content,
  //       "tags" => $tags
  //     );

  //     print_r($arrays);
  //   } else if($type === 'img') {
  //     $imgdata = $_GET['imgdata'];
  //     $arrays = array(
  //       "type" => $type,
  //       "imgdata" => $imgdata,
  //       "caption" => $content,
  //       "tags" => $tags
  //     );
  //   }
  //   // } else {
  //   //   $link = $_GET['link'];
  //   //   echo 'this is link post';
  //   //   $arrays = array(
  //   //     "type" => $type,
  //   //     "link" => $link,
  //   //     "caption" => $content,
  //   //     "tags" => $tags
  //   //   );
  //   elseif ($type === 'link') {
  //     $link = $_GET['link'];
  //     echo 'this is link post';
  //     $arrays = array(
  //       "type" => $type,
  //       "link" => $link,
  //       "caption" => $content,
  //       "tags" => $tags );
  //   } else {
  //     echo error_log;
  //   }
  //     // $test = "testingWorkpls";
  //     addTEST($arrays);
  //           //   $test = "testingWorkpls";

  //           // addPost($test);
  // }
?>