<?php    
    require_once 'library.php';
    require_once 'connection.php';
      require_once 'searchLib.php';

    $name = $_SESSION["uname"];
    $sname = $_SESSION["sname"];
    $email = $_SESSION["email"];

    if(isset($_POST['logout'])){
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    }
    
$result = $db->post_details->find()->sort(array('_id' => -1));

$userResult = $db->users->find([
  'Email Address' => ['$ne' => $email]
])->sort(array('followers_count' => -1));

$result = $db->postImages->find()->sort(array('_id' => -1)); // query for getting images
 $result_details = $db->post_details->find()->sort(array($userId)); //query for post

?>

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="home.php">
                 <img src="images/logo.gif" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                  </a>

                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                       <span class="avatar avatar-placeholder "></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">           <?php echo"$name"; ?>
                      <?php echo"$sname"; ?></span>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Message
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                    </a>
                    <a class="dropdown-item" href="logout_action.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="home.php" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url(demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
                  <div class="card-body text-center">
                    <img class="card-profile-img" src="demo/faces/male/16.jpg">
                    <h3 class="mb-3"><?php echo"$name"; ?>
                      <?php echo"$sname"; ?></h3>
                
                    <p class="mb-4">
                         <?php echo"$email"; ?>
                    </p>
                    <p class="mb-4">
                          <ul class="social-links list-inline mb-0 mt-2">
                          <li class="list-inline-item">
                              <h4>
                    <?php echo($posts->count());;?>
                    <br>
                    <small>Posts</small>
                          </h4>
                          </li>
                          <li class="list-inline-item">
                            <h4>
                    <?php echo($user_followers->count()-1);;?>
                    <br>
                    <small>Followers</small>
                  </h4>
                          </li>
                          <li class="list-inline-item">
                           <h4>
                    <?php echo($user_following->count()-1);;?>
                    <br>
                    <small>Following</small>
                  </h4>
                          </li>

                        </ul>
                    </p>
                    <button class="btn btn-outline-primary btn-sm">
                      <span class="fe fe-plus mr-2"></span> Follow
                    </button>
                  </div>
                </div>

<!--can add content here within the column -->

          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Followers</h3>
                  </div>
                  <div class="card-body">

                  </div>
                </div>



              </div>



              <div class="col-lg-8">




               <?php 
              foreach ($result_details as $r ) {
                echo" 
                <div class='card'>
                  <ul class='list-group card-list-group'>
  
                    <li class='list-group-item py-5'>
                      <div class='media'>
                        <span class='avatar avatar-placeholder mr-4'></span>
                        <div class='media-body'>
                         <h4>".$name." " .$sname. "</h4>
                       
                          <div class='media-heading'>
                            <small class='float-right text-muted'>".$r['date_posted']." </small>
                          
                          </div>
                           <div>

                           <h4>";

                           echo "<div> <h4>
                            ".$r['title']."
                           </h4>


                            ".$r['content']."
                           </div>";

                            foreach ($r['input-tags'] as $tags) {

                          echo"&nbsp;<span class='tag mb-0 mt-3'>".$tags."  </span>";
                          } 
                          echo "

                          </div>
                           <small class='nav nav-pills pull-left'>tags:&nbsp</small>
                        ";
                        foreach ($r['input-tags'] as $tags) {
                        echo"
                          <ul class='nav nav-pills pull-left'>
                          <li>
                            <a href='' title=''>
                              <i class='glyphicon glyphicon-thumbs-up'></i>#".$tags." 
                            </a> &nbsp
                          </li>
                        </ul>
                        ";
                        } 
                        echo"
                        <br>
                       
                        </small>
                      </div>
                    </div>
                  </div>
                 ";

                }?>


              </div>
            </div>
          </div>
        </div>
      </div>
   <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">First link</a>
                  </li>
                  <li>
                    <a href="#">Second link</a>
                  </li>
                </ul>
              </div>
              <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Third link</a>
                  </li>
                  <li>
                    <a href="#">Fourth link</a>
                  </li>
                </ul>
              </div>
              <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Fifth link</a>
                  </li>
                  <li>
                    <a href="#">Sixth link</a>
                  </li>
                </ul>
              </div>
              <div class="col-6 col-md-3">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Other link</a>
                  </li>
                  <li>
                    <a href="#">Last link</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-auto ml-lg-auto">
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 All rights reserved.
            </div>
          </div>
        </div>
    </footer>
    </div>
  </body>
</html>