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
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />

  <!--  photo post feature dont touch khelly's property -->
  <!--  photo post feature dont touch khelly's property -->

  <!-- Include external JS libs. -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

  <!-- Include Editor JS files. -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/js/froala_editor.pkgd.min.js"></script>

  <!-- Include external CSS. -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

  <!-- Include Editor style. -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"
  />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css"
  />

  <!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. -->
  <link href="../css/froala_style.min.css" rel="stylesheet" type="text/css" />


  <script>
    $(function () {
      $('textarea#froala-editor').froalaEditor({
        quickInsertButtons: ['image'],
        pluginsEnabled: ['quickInsert', 'image']
      })
    });
  </script>

  <!-- photo post feature dont touch khelly's property -->
  <!-- photo post feature dont touch khelly's property -->





  <!-- Generated: 2018-04-16 09:29:05 +0200 -->
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/"
    crossorigin="anonymous">
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
  <script src="js/customjs.js"></script>
  <script src="vendor/tagsinput/tagsinput.js"></script>

  <style>
    #text-post,
    #img-post,
    #link-post,
    #commentBox {
      display: none;
    }

    .options span {
      margin-right: 2rem;
    }

    .options button {
      margin-right: 1rem;
    }

    .options button:last-child {
      margin-right: 0;
    }
  </style>
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
              <!--  <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                  </div>
                </div> -->
              <div class="dropdown">
                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                  <span class="avatar avatar-placeholder "></span>
                  <span class="ml-2 d-none d-lg-block">
                    <span class="text-default">
                      <?php echo"$name"; ?>
                      <?php echo"$sname"; ?>
                    </span>

                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="profile.php">
                    <i class="dropdown-icon fe fe-user"></i> Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="dropdown-icon fe fe-settings"></i> Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="float-right">
                      <span class="badge badge-primary">6</span>
                    </span>
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
                  <a href="home.php" class="nav-link active">
                    <i class="fe fe-home"></i> Home</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="my-3 my-md-5">
        <div class="container">
          <!-- <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div> -->
          <div class="row row-cards">
            <!--  first column -->
            <div class="col-lg-8 ">
              <div class="card">
                <div class="row">
                  <div class="col-md-8 offset-md-2 text-center">
                    <br>
                    <div class="options">
                      <span class="avatar avatar-placeholder avatar-lg"></span>
                      <button class="btn btn-square btn-outline-secondary btn-lg" onclick="togglePostForm('text-post')">
                        <i class="fas fa-bold icon-size"></i>
                        <br/> Text
                      </button>
                      <button class="btn btn-square btn-outline-info btn-lg" onclick="togglePostForm('img-post')">
                        <i class="fas fa-camera icon-size"></i>
                        <br/> Photo
                      </button>
                      <button class="btn btn-square btn-outline-warning btn-lg" onclick="togglePostForm('link-post')">
                        <i class="fas fa-link icon-size"></i>
                        <br/> Link
                      </button>
                    </div>
                    <br>
                  </div>
                </div>
                <div id="text-post">
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <h3>Create A New Post</h3>
                      <form action="newpost.php" class="post-form">
                        <input type="hidden" value="text" name="type" id="type">
                        <div class="form-group">
                          <input class="form-control form-control-lg" type="text" placeholder="Title" name="title" id="title">
                        </div>
                        <div class="form-group">
                          <textarea id="froala-editor" rows="4" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="input-tags" name="input-tags" placeholder="#tags">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-square btn-outline-info" type="submit">Post</button>&nbsp;&nbsp;
                          <button class="btn btn-square btn-outline-secondary" type="button" onclick="closePost()">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div id="img-post">
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <h3>Create A New Post</h3>
                      <form action="newpost.php">
                        <input type="hidden" value="img" name="type" id="type">
                        <div class="form-group">
                          <textarea id="froala-editor" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control input-tag" id="input-tags" name="input-tags" placeholder="#tags">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-square btn-outline-info" type="submit">Post</button>&nbsp;&nbsp;
                          <button class="btn btn-square btn-outline-secondary" type="button" onclick="closePost()">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div id="link-post">
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <h3>Create A New Post</h3>
                      <form action="newpost.php" class="post-form">
                        <input type="hidden" value="postlink" name="type" id="type">
                        <div class="form-group">
                          <input class="form-control form-control-lg" type="text" placeholder="Title" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="content" id="content" placeholder="Caption (optional)"></textarea>
                        </div>
                        <div class="form-group">
                          <!-- <label class="form-label">Tags</label> -->
                          <input type="text" class="form-control input-tag" id="input-tags" name="input-tags" placeholder="#tags">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-square btn-outline-info" type="submit">Post</button>&nbsp;&nbsp;
                          <button class="btn btn-square btn-outline-secondary" type="button" onclick="closePost()">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

                <?php    
               foreach ($result as $res) {
                echo"
                <div class='card card-aside'>
                  <div class='card-body d-flex flex-column'>
                      
                    <div class='text-muted'>".$res['content']."</div>
                    <div class='d-flex align-items-center pt-5 mt-auto'>
                      <div class='avatar avatar-placeholder avatar-purple mr-3'></div>
                      <div>
                        <a href='./profile.html' class='text-default'>".$name.' '.$sname."</a>";
                        echo"<br>";
                       
                          echo "
                      </div>
                      <div class='ml-auto text-red'>
                        <a id='comment_button' class='icon d-none d-md-inline-block ml-3'><i class='fe fe-message-circle mr-1'></i></a>
                      </div>
                    </div>
                    </br>
                    <div id='commentBox'>
                      <ul class='media-list'>
                        <li class='media mt-4'>
                          <div class='media-object avatar mr-4' style='background-image: url(demo/faces/female/17.jpg)'></div>
                          <div class='media-body'>
                            <strong>Debra Beck: </strong>
                              <div class='form-group'>
                                <input class='form-control form-control-lg' type='text' placeholder='Enter your comment' name='comment' id='comment'>
                              </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>";
              }
              ?>
              



                <?php     
              foreach ($result_details as $res) {
                echo"
                <div class='card card-aside'>
                  <div class='card-body d-flex flex-column'>
                      <h4><a href='#'>".$res['title']."</a></h4>
                    <div class='text-muted'>".$res['content']."</div>
                    <div class='d-flex align-items-center pt-5 mt-auto'>
                      <div class='avatar avatar-placeholder avatar-purple mr-3'></div>
                      <div>
                        <a href='./profile.html' class='text-default'>".$name.' '.$sname."</a>";
                        echo"<br>";
                        foreach ($res['input-tags'] as $tags) {

                          echo"&nbsp;<span class='tag'>".$tags."  </span>";
                          } 
                          echo "
                      </div>
                      <div class='ml-auto text-red'>
                        <a id='comment_button' class='icon d-none d-md-inline-block ml-3'><i class='fe fe-message-circle mr-1'></i></a>
                      </div>
                    </div>
                    </br>
                    <div id='commentBox'>
                      <ul class='media-list'>
                        <li class='media mt-4'>
                          <div class='media-object avatar mr-4' style='background-image: url(demo/faces/female/17.jpg)'></div>
                          <div class='media-body'>
                            <strong>Debra Beck: </strong>
                              <div class='form-group'>
                                <input class='form-control form-control-lg' type='text' placeholder='Enter your comment' name='comment' id='comment'>
                              </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>";
              }
              ?>
              </div>


            <!-- 2nd column -->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recommended Bloggers</h3>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-striped table-vcenter">
                    <tbody>
                      <?php 
                        foreach ($userResult as $user ) {
                          echo"
                            <tr>
                              <td class='w-1'><span class='avatar' style='background-image: url(./demo/faces/male/9.jpg)'></span></td>
                              <td>".$user['First Name']." ".$user['Last Name']."</td>
                              <td><a href='following_action.php?follow=" .$user['Email Address']. "' class='btn btn-square btn-outline-secondary' data-toggle='tooltip' data-placement='left' title='Follow'><i class='fas fa-plus'></i></a></td>
                              <td class='w-1'></td>
                            </tr>
                          ";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
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

    <script>
      require(['jquery', 'selectize'], function ($, selectize) {
        $(document).ready(function () {
          $('#input-tags').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
              return {
                value: input,
                text: input
              }
            }
          });
        });

        $(document).ready(function () {
          $('.input-tags').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
              return {
                value: input,
                text: input
              }
            }
          });
        });

        $(document).ready(function () {
          $('.input-tag').selectize({
            delimiter: ',',
            persist: false,
            create: function (input) {
              return {
                value: input,
                text: input
              }
            }
          });
        });

        $('#comment_button').click(function () {
          $('#commentBox').toggle()
        });
      });
    </script>

</body>

</html>