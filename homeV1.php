<?php
    require_once 'library.php';
    if(chkLogin()){
       
        // echo "Logged in!";
        $name = $_SESSION["uname"];
        // echo "Welcome $name!!!";
        
    }
    else{
        header("Location: login.php");
    }
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
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="vendor/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <style>
            #text-post, #img-post, #link-post {
                display: none;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="home.php">WebSiteName</a>
             </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="profilepage.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>

      <li><form  method="post">
  <button type="submit" name="logout" value="your_value" class="btn-link"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Logout</button>
</form></li>
    </ul>
  </div>
</nav>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Logo</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Home">
                                <i class="ion-home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Explore">
                                <i class="ion-earth"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ion-person"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Posts</a>
                            <a class="dropdown-item" href="#">Followers</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout_action.php">Logout</a>
                        </div>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  data-toggle="tooltip" data-placement="bottom" title="New Post">
                                <i class="ion-edit"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="row">
                <div class="col">
                    <div class="options">
                        <button class="btn btn-light btn-lg" onclick="togglePostForm('text-post')">
                            <i class="ion-document-text"></i><br/>
                            Text
                        </button>
                        <button class="btn btn-light btn-lg" onclick="togglePostForm('img-post')">
                            <i class="ion-camera"></i><br/>
                            Photo
                        </button>
                        <button class="btn btn-light btn-lg" onclick="togglePostForm('link-post')">
                            <i class="ion-link"></i><br/>
                            Link
                        </button>
                    </div>
                </div>
            </div>

            <div id="text-post">
                <div class="row">
                    <div class="col-8">
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
                    <div class="col-8">
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
                    <div class="col-8">
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

        <!-- <form method="POST" action="newpost.php" enctype="multipart/form-data">
        <input type="hidden" value="iamge" name="type" id="type">
        <input type="file" name="cover" >
        <button type="submit">Submit</button>
        </form> -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/tagsinput/tagsinput.js"></script>
        <script src="js/customjs.js"></script>
    </body>

</html>