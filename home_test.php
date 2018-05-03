<?php    
    require_once 'library.php';

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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
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
         <style>
            #text-post, #img-post, #link-post {
                display: none;
            }
        </style>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <img src="./demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
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
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar avatar-placeholder"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"> <?php echo"$name"; ?>
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
                    <a href="./index.html" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
              
                </ul>
              </div>
            </div>
          </div>
        </div>
 

         <div class="my-3 my-md-5">
          <div class="container">
    <!--         <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div> -->
            <div class="row row-cards">

              <!--  first column -->
              <div class="col-lg-8">
                <div class="card">

                      <div class="row">
                <div class="col-md-6 offset-md-4">
                  <br>


                    <div class="options">
                         <span class="avatar avatar-placeholder"></span>
                        <button class="btn btn-square btn-outline-secondary btn-lg" onclick="togglePostForm('text-post')">
                            <i class="fas fa-bold icon-size"></i><br/>
                            Text
                        </button>
                        <button class="btn btn-square btn-outline-info btn-lg" onclick="togglePostForm('img-post')">
                            <i class="fas fa-camera icon-size"></i><br/>
                            Photo
                        </button>
                        <button class="btn btn-square btn-outline-warning btn-lg" onclick="togglePostForm('link-post')">
                            <i class="fas fa-link icon-size"></i><br/>
                            Link
                        </button>
                    </div>
                    <br>
                </div>
            </div>

                    <div id="text-post">
                <div class="row">
                    <div class="col-lg-6 offset-lg-4">
                        <h1>Create A New Post</h1>
                        <form action="newpost.php" class="post-form">
                            <input type="hidden" value="text" name="type" id="type">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Title" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" name="content" id="content" placeholder="Your text here" required></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="#tags" name="tags" id="tags" data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Post</button>&nbsp;&nbsp;
                                <button class="btn" type="button" onclick="closePost()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="img-post">
                <div class="row">
                    <div class="col-lg-6 offset-lg-4">
                        <h1>Create A New Post</h1>                    
                           <form action="newpost.php" enctype="multipart/form-data" class="post-form">
                            <input type="hidden" value="image" name="type" id="type">
                            
                            <div class="form-group">
                                <label class="upload">
                                    <input type="file" required accept="image/gif, image/jpeg, image/png" name="cover" id="cover">
                                    <i class="ion-image"></i>
                                    Upload
                                </label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="content" id="content" placeholder="Caption (optional)"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="#tags" name="tags" id="tags" data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Post</button>&nbsp;&nbsp;
                                <button class="btn" type="button" onclick="closePost()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="link-post">
                <div class="row">
                    <div class="col-lg-6 offset-lg-4">
                        <h1>Create A New Post</h1>
                        <form action="newpost.php" class="post-form">
                            <input type="hidden" value="postlink" name="type" id="type">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Link" name="link" id="link" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="content" id="content" placeholder="Caption (optional)"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="#tags" name="tags" id="tags" data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Post</button>&nbsp;&nbsp;
                                <button class="btn" type="button" onclick="closePost()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    
                </div>
              </div>


              <!-- 2nd column -->
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recommended Blogs</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                      <thead>
                        <tr>
                          <th colspan="2">User</th>
                          <th>Commit</th>
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="w-1"><span class="avatar" style="background-image: url(./demo/faces/male/9.jpg)"></span></td>
                          <td>Ronald Bradley</td>
                          <td>Initial commit</td>
                          <td class="text-nowrap">May 6, 2018</td>
                          <td class="w-1"><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar">BM</span></td>
                          <td>Russell Gibson</td>
                          <td>Main structure</td>
                          <td class="text-nowrap">April 22, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/female/1.jpg)"></span></td>
                          <td>Beverly Armstrong</td>
                          <td>Left sidebar adjustments</td>
                          <td class="text-nowrap">April 15, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/male/4.jpg)"></span></td>
                          <td>Bobby Knight</td>
                          <td>Topbar dropdown style</td>
                          <td class="text-nowrap">April 8, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/female/11.jpg)"></span></td>
                          <td>Sharon Wells</td>
                          <td>Fixes #625</td>
                          <td class="text-nowrap">April 9, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
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
                    <li><a href="#">First link</a></li>
                    <li><a href="#">Second link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Third link</a></li>
                    <li><a href="#">Fourth link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Fifth link</a></li>
                    <li><a href="#">Sixth link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Other link</a></li>
                    <li><a href="#">Last link</a></li>
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
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
                    <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>