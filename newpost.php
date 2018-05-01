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
          addPost($arrays);
          break;
      case "postlink":
        $link = $_GET['link'];
        $arrays = array(
          "type" => $type,
          "link" => $link,
          "caption" => $content,
          "tags" => $tags 
        );
          addPost($arrays);
          break;
      case "image":
        $test1 = $_GET['cover'];

        $image = $_FILES['image'] = $test1 ;

        addImage($image);

          break;
      default:
          echo "post failed try again!";
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