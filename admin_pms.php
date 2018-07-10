<?php
session_start();
if($_SESSION['admin_login_flag']==0)
    header("location:index.php");
else
$un=$_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Explore Projects</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

     <!-- Stylesheet -->
      <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print"/>
<!-- jQuery Plugin -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans);

* {
  margin: 0;
  padding: 0;
  font-size: inherit;
  color: inherit;
  box-sizing: inherit;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-font-smoothing: antialiased;
}

*:focus { outline: none; }

html { box-sizing: border-box; }

body {
  background-color: #ecf0f1;
  min-width: 300px;
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
}

h1, h2, h3, h4, h5 {
  display: block;
  font-weight: 400;
}

li, span, p, a, h1, h2, h3, h4, h5 { line-height: 1; }

p { display: block; }

a { text-decoration: none; }

a:hover { text-decoration: underline; }

img {
  display: block;
  max-width: 100%;
  height: auto;
  border: 0;
}

button {
  background-color: transparent;
  border: 0;
  cursor: pointer;
}

/* Reset */


html, body { height: 100%; }

.navigation-bar, .navigation-bar .navbox-tiles, .navbox-trigger, .navbox-tiles .tile, .navbox-tiles .tile .icon .fa, .navbox-tiles .tile .title {
  -webkit-transition: all .3s;
  transition: all .3s;
}

.navbox-tiles:after {
  content: '';
  display: table;
  clear: both;
}

/* Core Styles */


.navigation-bar {
  height: 50px;
  position: relative;
  z-index: 1000;
}

.navigation-bar .bar {
  background-color: ;
  
  height: 100%;
  position: absolute;
  z-index: 2;
}

.navigation-bar .navbox {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  -webkit-transform: translateY(-200px);
  -ms-transform: translateY(-200px);
  transform: translateY(-200px);
  -webkit-transition: all .2s;
  transition: all .2s;
}

.navigation-bar .navbox-tiles {
  -webkit-transform: translateY(-200px);
  -ms-transform: translateY(-200px);
  transform: translateY(-200px);
}

.navigation-bar.navbox-open .navbox-trigger { background-color:#484747; }

.navigation-bar.navbox-open .navbox {
  visibility: visible;
  opacity: 1;
  -webkit-transform: translateY(0);
  -ms-transform: translateY(0);
  transform: translateY(0);
  -webkit-transition: opacity .3s, -webkit-transform .3s;
  transition: opacity .3s, transform .3s;
}

.navigation-bar.navbox-open .navbox-tiles {
  -webkit-transform: translateY(0);
  -ms-transform: translateY(0);
  transform: translateY(0);
}

.navbox-trigger {
  background-color: transparent;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.navbox-trigger .fa {
  font-size: 20px;
  color: #fff;
}

.navbox-trigger:hover { background-color:#0099ff; }

.navbox {
  background-color: #484747;
  width: 100%;
  max-width: 380px;
  -webkit-backface-visibility: initial;
  backface-visibility: initial;
}

.navbox-tiles {
  width: 100%;
  padding: 25px;
}

.navbox-tiles .tile {
  display: block;
  background-color: #3498db;
  width: 30.3030303030303%;
  height: 0;
  padding-bottom: 29%;
  float: left;
  border: 2px solid transparent;
  color: #fff;
  position: relative;
}

.navbox-tiles .tile .icon {
  width: 100%;
  height: 100%;
  text-align: center;
  position: absolute;
  top: 0;
  left: 0;
}

.navbox-tiles .tile .icon .fa {
  font-size: 35px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-backface-visibility: initial;
  backface-visibility: initial;
}

.navbox-tiles .tile .title {
  padding: 5px;
  font-size: 12px;
  position: absolute;
  bottom: 0;
  left: 0;
}

.navbox-tiles .tile:hover {
  border-color: #fff;
  text-decoration: none;
}
.navbox-tiles .tile:not(:nth-child(3n+3)) {
 margin-right: 4.54545454545455%;
}

.navbox-tiles .tile:nth-child(n+4) { margin-top: 15px; }
 @media screen and (max-width: 370px) {

.navbox-tiles .tile .icon .fa { font-size: 25px; }

.navbox-tiles .tile .title {
  padding: 3px;
  font-size: 11px;
}
}
 ::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

    ::-webkit-scrollbar
{
    width: 10px;
    background-color: #F5F5F5;
}

    ::-webkit-scrollbar-thumb
{
    background-color: #0ae;
    
    background-image: -webkit-gradient(linear, 0 0, 0 100%,
                       color-stop(.5, rgba(255, 255, 255, .2)),
                       color-stop(.5, transparent), to(transparent));
}

</style>
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script> 
<!--Navbar -->
<div id="navigation-bar" class="navigation-bar">
  <div class="bar">
    <button id="navbox-trigger" class="navbox-trigger" style="margin-top: 13px;"><i class="fa fa-lg fa-th" style="font-size: 25px;"></i></button>
  </div>
  <div class="navbox">
    <div class="navbox-tiles">
    <!--<a href="#" class="tile">
      <div class="icon"><i class="fa fa-home"></i></div>
      <span class="title">Home</span></a>-->
      <a href="add_batch.php " target="iframe_a" class="tile ">
      <div class="icon"><i class="fa fa-calendar-plus-o"></i></div>
      <span class="title " style="font-size: 15px;">Add Batch</span></a>
      <a href="staff_signup.php" target="iframe_a" class="tile">
      <div class="icon"><i class="fa fa-user-plus"></i></div>
      <span class="title" style="font-size: 14px;">Add User</span></a>
       <a href="view-users.php" target="iframe_a" class="tile">
     <div class="icon"><i class="fa fa-file-image-o"></i></div>
      <span class="title" style="font-size: 15px;">View Users</span></a>
      <!--<a href="#" class="tile">
      <div class="icon"><i class="fa fa-cloud"></i></div>
      <span class="title">Weather</span></a><a href="#" class="tile">
      <div class="icon"><i class="fa fa-file-movie-o"></i></div>
      <span class="title">Movies</span></a></div>-->
  </div>
</div>

            <nav class="mb-1 navbar navbar-expand-lg navbar-dark cyan">

                <a class="navbar-brand" href="#">

                <img class="img-fluid float-left" src="img/sece-logo.png"  style="height: 50px;margin-left: 50px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="margin-right: 20px;margin-top: 6px; ">
                          <h5>Hii <?php echo $un; ?></h5>        

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off" style=""></i> LOG OUT</a>
                        </li>
                       
                    </ul>
                </div>
            </nav>
            <!--/.Navbar -->



<iframe height="562px" width="100%" src="admin_home.php" name="iframe_a" style="margin-top: -10px;"></iframe>






<!--=========================SCRIPTS==========================-->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script>
(function () {
    $(document).ready(function () {
        $('#navbox-trigger').click(function () {
            return $('#navigation-bar').toggleClass('navbox-open');
        });
        return $(document).on('click', function (e) {
            var $target;
            $target = $(e.target);
            if (!$target.closest('.navbox').length && !$target.closest('#navbox-trigger').length) {
                return $('#navigation-bar').removeClass('navbox-open');
            }
        });
    });
}.call(this));
</script>

<!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.js"></script>


</body>

</html>
