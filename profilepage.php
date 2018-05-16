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

    // search for produce that is sweet. Taste is a child of Details. 
    // $sweetQuery = array('Details.Taste' => 'Sweet');
    // echo "Sweet\n";
    // $cursor = $collection->find($sweetQuery);

    // $profileID = array('Email Address' => $email);
    // $profileResult = $db->post_details->find($profileID);

    $result = $db->post_details->find()->sort(array($userId));

?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/profilepage.css">
  <!------ Include the above in your HEAD tag ---------->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Page 1</a>
      </li>
      <li>
        <a href="#">Page 2</a>
      </li>
      <li>
        <a href="#">Page 3</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li>
        <form method="post">
          <button type="submit" name="logout" value="your_value" class="btn-link">
            <span class="glyphicon glyphicon-log-in"></span>&nbsp;Logout</button>
        </form>
      </li>
    </ul>
  </div>
</nav> -->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center ">
      <div class="content">
        <div class="card">
          <div class="firstinfo">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mrvanz/128.jpg" />

            <div class="profileinfo">
              <h1>
                <?php echo"$name"; ?>
                <?php echo"$sname"; ?>
              </h1>
              <h3>
                <?php echo"$email"; ?>
              </h3>
              <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
              <ul class="nav nav-pills pull-left countlist" role="tablist">
                <li role="presentation">
                  <h3><?php echo($posts->count());;?>
                    <br>
                    <small>Posts</small>
                  </h3>
                </li>
                <li role="presentation">
                  <h3><?php echo($user_followers->count()-1);;?>
                    <br>
                    <small>Followers</small>
                  </h3>
                </li>
                <li role="presentation">
                  <h3><?php echo($user_following->count()-1);;?>
                    <br>
                    <small>Following</small>
                  </h3>
                </li>
              </ul>
              <button class="btn btn-primary followbtn">Follow</button>
            </div>
          </div>
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-4 col-sm-12 pull-right">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="page-header small">Personal Details</h1>
              <p class="page-subtitle small">Limited information is visible</p>
            </div>

          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="page-header small">Followers</h1>
              <p class="page-subtitle small">You have recemtly connected with 34 friends</p>
            </div>
            <div class="col-md-12">
              <div class="memberblock">
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                  <div class="memmbername">Ajay Sriram</div>
                </a>
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <div class="memmbername">Rajesh Sriram</div>
                </a>
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <div class="memmbername">Manish Sriram</div>
                </a>
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <div class="memmbername">Chandra Amin</div>
                </a>
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <div class="memmbername">John Sriram</div>
                </a>
                <a href="" class="member">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <div class="memmbername">Lincoln Sriram</div>
                </a>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-8 col-sm-12 pull-left posttimeline">
          <div class="panel panel-default">
          </div>
          <div class="panel panel-default">
            <div class="btn-group pull-right postbtn">
              <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="dots"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li>
                  <a href="javascript:void(0)">Hide this</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Report</a>
                </li>
              </ul>
            </div>

            <?php 
              foreach ($result as $r ) {
                echo" 
                  <div class='col-md-12'>
                    <div class='media'>
                      <div class='media-left'>
                        <a href='javascript:void(0)'>
                        <img src='https://bootdey.com/img/Content/avatar/avatar3.png';  class='media-object'> </a>
                      </div>
                      <div class='media-body'>
                        <h2 class='media-heading' style='color:black;'> ".$r['title']."
                          <br>
                        </h2>
                        <p>".$r['content']."</p>
                        <br>
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
                        <small class='nav nav-pills pull-left'>
                          ".$r['date_posted']." 
                        </small>
                      </div>
                    </div>
                  </div>
                  <hr>
                ";
              }
            ?>

        <div class="col-md-12 commentsblock border-top">
          </div>
          <div class="panel panel-default">
            <div class="btn-group pull-right postbtn">
              <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="dots"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li>
                  <a href="javascript:void(0)">Hide this</a>
                </li>
                <li>
                  <a href="javascript:void(0)">Report</a>
                </li>
              </ul>
            </div>

            <div class="col-md-12">
              <div class="media">
                <div class="media-left">
                  <a href="javascript:void(0)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"> Lucky Sans
                    <br>
                    <small>
                      <i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small>
                  </h4>
                  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
                    purus odio. </p>
                  <ul class="nav nav-pills pull-left ">
                    <li>
                      <a href="" title="">
                        <i class="glyphicon glyphicon-thumbs-up"></i> 2015
                      </a>
                    </li>
                    <li>
                      <a href="" title="">
                        <i class=" glyphicon glyphicon-comment"></i> 25</a>
                    </li>
                    <li>
                      <a href="" title="">
                        <i class="glyphicon glyphicon-share-alt"></i> 15</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12 border-top">
              <div class="status-upload">
                <form>
                  <label>Comment</label>
                  <textarea class="form-control" placeholder="Comment here"></textarea>
                  <br>
                  <ul class="nav nav-pills pull-left ">
                    <li>
                      <a title="">
                        <i class="glyphicon glyphicon-bullhorn"></i>
                      </a>
                    </li>
                    <li>
                      <a title="">
                        <i class=" glyphicon glyphicon-facetime-video"></i>
                      </a>
                    </li>
                    <li>
                      <a title="">
                        <i class="glyphicon glyphicon-picture"></i>
                      </a>
                    </li>
                  </ul>
                  <button type="submit" class="btn btn-success pull-right"> Comment</button>
                </form>
              </div>
              <!-- Status Upload  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</html>