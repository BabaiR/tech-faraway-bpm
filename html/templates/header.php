<?php   
    require_once "connections/connection.php";
    date_default_timezone_set("Asia/Kolkata");
    
    if(!(isset($_SESSION['login_user']))){
 echo '<script type="text/javascript">window.location.href="login.php";</script>';

    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="UTF-8">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>FTT :: Business Process Management :: </title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="assets/plugins/wizard/steps.css" rel="stylesheet">
    <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet">
    
    <!-- summernotes CSS -->
    <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/plugins/wizard/steps.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"

      rel="stylesheet" type="text/css">
    <!-- Daterange picker plugins css -->
    <link href="assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css"

      rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
          
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body class="fix-header card-no-border logo-center"> <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"

          stroke-miterlimit="10"></circle> </svg> </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar">
        <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-header"> <a class="navbar-brand" href="#">
              <!-- Logo icon -->
              <!--End Logo icon -->
              <!-- Logo text --> <span> Faraway Tree </span> </a> </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
              <!-- This is  -->
              <li class="nav-item"> <br>
              </li>
              <!-- ============================================================== -->
              <!-- Messages -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown mega-dropdown">
                <div class="dropdown-menu scale-up-left">
                  <ul class="mega-dropdown-menu row">
                    <li class="col-lg-3 col-xlg-2 m-b-30">
                      <h4 class="m-b-20">CAROUSEL</h4>
                      <!-- CAROUSEL -->
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item active">
                            <div class="container"> <img class="d-block img-fluid"

                                src="assets/images/big/img1.jpg" alt="First slide"></div>
                          </div>
                          <div class="carousel-item">
                            <div class="container"><img class="d-block img-fluid"

                                src="assets/images/big/img2.jpg" alt="Second slide"></div>
                          </div>
                          <div class="carousel-item">
                            <div class="container"><img class="d-block img-fluid"

                                src="assets/images/big/img3.jpg" alt="Third slide"></div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls"

                          role="button" data-slide="prev"> <span class="carousel-control-prev-icon"

                            aria-hidden="true"></span> <span class="sr-only">Previous</span>
                        </a> <a class="carousel-control-next" href="#carouselExampleControls"

                          role="button" data-slide="next"> <span class="carousel-control-next-icon"

                            aria-hidden="true"></span> <span class="sr-only">Next</span>
                        </a> </div>
                      <!-- End CAROUSEL --> </li>
                  </ul>
                </div>
              </li>
              <!-- ============================================================== -->
              <!-- End Messages -->
              <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark"

                  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="notify"> <span class="heartbit"></span> <span class="point"></span>
                  </div>
                </a>
                
              </li>
             
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"

                  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img

                    src="assets/images/users/1.jpg" alt="user" class="profile-pic"></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                  <ul class="dropdown-user">
                    <li>
                      
                    </li>
                    <li role="separator" class="divider"><br>
                    </li>
                    <li><a href="changepassword.php"><i class="ti-settings"></i> Change Password</a></li>
                    <li role="separator" class="divider"><br>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->